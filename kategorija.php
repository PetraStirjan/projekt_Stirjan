<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMA Spotlight</title>
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
        if (isset($_SESSION['username'])) {
            if ($_SESSION['level'] == 1) {
                echo '
                <div class="dropdown">
                    <button class="dropbtn">Administration</button>
                    <div class="dropdown-content">
                        <a href="unos.php">New article</a>
                        <a href="administracija.php">Edit articles</a>
                    </div>
                </div>';
            }
            echo '<a href="logout.php">Logout</a>';
            echo '<span class="username-display"><i class="fas fa-user"></i> ' . htmlspecialchars($_SESSION['username']) . '</span>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </nav>

    <?php
    $kategorija = $_GET['category'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projektmmanews";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM articles WHERE category='$kategorija' AND archive = 0";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<article style='width:70%'>";
            if (!empty($row["photo"])) {
                echo '<div class="article-image">';
                echo '<img src="' . $row["photo"] . '" alt="Article Image">';
                echo '</div>';
            }
            echo "<div class='article-content'>";
            echo "<h2>" . $row["title"] . "</h2>";
            $originalDate = $row['upload_date'];
            $newDate = date("d.m.Y", strtotime($originalDate));

            echo "<i><p style='color:grey'>Objavljeno: " . $newDate . "</p></i>";
            echo "<p>" . $row["content"] . "</p>";
            echo "</div>";
            echo "</article>";
        }
    } else {
        echo "Članci nisu pronađeni.";
    }
    $conn->close();
    ?>
    <footer>
        <p>&copy; 2024 MMA Spotlight Official Site</p>
    </footer>
</body>
</html>