<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projektmmanews";
$dbc = new mysqli($servername, $username, $password, $dbname);
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}
define('UPLPATH', 'img/');

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prijava'])) {
    $prijavaImeKorisnika = $_POST['username'];
    $prijavaLozinkaKorisnika = $_POST['password'];

    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
        mysqli_stmt_fetch($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0 && password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika)) {
            $uspjesnaPrijava = true;
            $admin = ($levelKorisnika == 1) ? true : false;
            $_SESSION['username'] = $imeKorisnika;
            $_SESSION['level'] = $levelKorisnika;
            header("Location: index.php");
            exit();
        } else {
            $login_error = "Neispravno korisničko ime ili lozinka";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
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
    if (isset($login_error)) {
        echo '<p style="color:red;">' . $login_error . '</p>';
    }
    ?>
    <form action="login.php" method="POST">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="prijava">Login</button>
    </form>
    <p>Nemate račun? <a href="registracija.php">Registrirajte se</a></p>
    <footer>
        <p>&copy; 2024 MMA Spotlight Official Site</p>
    </footer>
</body>
</html>