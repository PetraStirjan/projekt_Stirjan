<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
            if ($_SESSION['level']) {
                echo '
                <div class="dropdown">
                    <button class="dropbtn"><a>Administration</a></button>
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

    <content>
        <h2 id="fight-news">Fight News</h2>
        <section>
            <?php
            include 'skripta.php';
            get_articles_by_category('news');
            ?>
        </section>
        <h2 id="history-legends">History & Legends</h2>
        <section>
            <?php
            get_articles_by_category('legends');
            ?>
        </section>
    </content>

    <footer>
        <p>&copy; 2024 MMA Spotlight Official Site</p>
    </footer>
</body>
</html>