<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracija</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>
    <h1>MMA Spotlight</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="kategorija.php?category=news">Fight News</a>
    <a href="kategorija.php?category=legends">History & Legends</a>
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        if($_SESSION['level']) {
            echo '
            <div class="dropdown">
                <button class="dropbtn"><a>Administration</a></button>
                <div class="dropdown-content">
                    <a href="unos.php">New article</a>
                    <a href="administracija.php">Edit articles</a>
                </div>
            </div>';
            echo '<a href="logout.php">Logout</a>';
            echo '<span class="username-display"><i class="fas fa-user"></i> ' . htmlspecialchars($_SESSION['username']) . '</span>';
        }
    } else {
        echo '<a href="login.php">Login</a>';
    }
    ?>
</nav>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projektmmanews";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $query = "DELETE FROM articles WHERE id=$id";
        $result = mysqli_query($conn, $query);
    } elseif(isset($_POST['update'])){
        $picture = $_FILES['photo']['name'];
        $title = $_POST['title'];
        $about = $_POST['about'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $archive = isset($_POST['archive']) ? 1 : 0;
        $id = $_POST['id'];

        $target_dir = 'uploads/'.$picture;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);

        $query = "UPDATE articles SET title='$title', about='$about', content='$content', 
                 category='$category', archive='$archive', photo='$picture' WHERE id=$id";
        $result = mysqli_query($conn, $query);
    }
}

$query = "SELECT * FROM articles";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result)) {
?>
    <form enctype="multipart/form-data" action="" method="POST">
        <div class="form-item">
            <label for="title">Naslov vijesti:</label>
            <div class="form-field">
                <input type="text" name="title" class="form-field-textual" value="<?php echo $row['title']; ?>">
            </div>
        </div>

        <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
            <div class="form-field">
                <textarea name="about" class="form-field-textual"><?php echo $row['about']; ?></textarea>
            </div>
        </div>

        <div class="form-item">
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
                <textarea name="content" class="form-field-textual"><?php echo $row['content']; ?></textarea>
            </div>
        </div>

        <div class="form-item">
            <label for="photo">Slika:</label>
            <div class="form-field">
                <input type="file" name="photo" class="form-field-file">
                <img src="<?php echo 'img/'.$row['photo']; ?>" width="100px">
            </div>
        </div>

        <div class="form-item">
            <label for="category">Kategorija vijesti:</label>
            <div class="form-field">
                <select name="category" class="form-field-select">
                    <option value="news" <?php if($row['category'] == 'news') echo 'selected'; ?>>News</option>
                    <option value="legends" <?php if($row['category'] == 'legends') echo 'selected'; ?>>History & Legends</option>
                </select>
            </div>
        </div>

        <div class="form-item">
            <label>Spremiti u arhivu:</label>
            <div class="form-field">
                <input type="checkbox" name="archive" <?php if($row['archive'] == 1) echo 'checked'; ?>>
            </div>
        </div>

        <input type="hidden" name="id" class="form-field-textual" value="<?php echo $row['id']; ?>">

        <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" name="update" value="Prihvati">Izmjeni</button>
            <button type="submit" name="delete" value="Izbriši">Izbriši</button>
        </div>
    </form>
<?php
}
?>

<footer>
    <p>&copy; 2024 MMA Spotlight Official Site</p>
</footer>

</body>
</html>
