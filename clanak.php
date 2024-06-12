<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMA Spotlight</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .article-content-clanak {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin-top: 20px;
            box-sizing: border-box;
        }
    </style>
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
        if (isset($_SESSION['username'])) {
            if ($_SESSION['level']) {
                echo '
            <div class="dropdown">
                <button class="dropbtn"><a>Administration</a></button>
                <div class="dropdown-content">
                    <a href="unos.php">New article</a>
                    <a href="administracija.php">Edit articles</a>
                </div>
            </div>';
            } else {
                echo '<a href="logout.php">Logout</a>';
                echo '<span class="username-display"><i class="fas fa-user"></i> ' . htmlspecialchars($_SESSION['username']) . '</span>';
            }
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </nav>


    <div class="article-content-clanak">
        <?php
        if (isset($_GET['id'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projektmmanews";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $article_id = $_GET['id'];

            $sql = "SELECT * FROM articles WHERE id = $article_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    if (!empty($row["photo"])) {
                        echo '<div class="article-image"><img src="' . $row["photo"] . '" alt="Article Image"></div>';
                    }
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<i><p style='color:grey'>Objavljeno: " . $row['upload_date'] . "</p></i>";
                    echo "<p>" . $row["content"] . "</p>";
                }
            } else {
                echo "Članak nije pronađen.";
            }
            $conn->close();
        } else {
            echo "Nije odabran članak za prikaz.";
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 MMA Spotlight Official Site</p>
    </footer>
</body>

</html>