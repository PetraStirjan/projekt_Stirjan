<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projektmmanews";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO articles (title, about, content, category, archive, photo, upload_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $title, $about, $content, $category, $archive, $picture, $date);

    $title = $_POST["title"];
    $about = $_POST["about"];
    $content = $_POST["content"];
    $category = $_POST["category"];
    $date = date('Y-m-d');
    $archive = isset($_POST['archive']) ? 1 : 0;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $picture = $_FILES['photo']['name'];
        $target_dir = 'uploads/';
        $target_file = $target_dir . basename($picture);

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            if ($stmt->execute()) {
                header("Location: index.php");
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: No file uploaded or file upload error.";
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .error {
            color: red;
        }
    </style>
    <script type="text/javascript">
        function validateForm(event) {
            var slanjeForme = true;

            var poljeTitle = document.getElementById("title");
            var title = poljeTitle.value;
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border = "1px dashed red";
                document.getElementById("porukaTitle").innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova!<br>";
                document.getElementById("porukaTitle").classList.add("error");
            } else {
                poljeTitle.style.border = "1px solid green";
                document.getElementById("porukaTitle").innerHTML = "";
            }

            var poljeAbout = document.getElementById("about");
            var about = poljeAbout.value;
            if (about.length < 10 && about.length > 100) {
                slanjeForme = false;
                poljeAbout.style.border = "1px dashed red";
                document.getElementById("porukaAbout").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
                document.getElementById("porukaAbout").classList.add("error");
            } else {
                poljeAbout.style.border = "1px solid green";
                document.getElementById("porukaAbout").innerHTML = "";
            }

            var poljeContent = document.getElementById("content");
            var content = poljeContent.value;
            if (content.length == 0) {
                slanjeForme = false;
                poljeContent.style.border = "1px dashed red";
                document.getElementById("porukaContent").innerHTML = "Sadržaj mora biti unesen!<br>";
                document.getElementById("porukaContent").classList.add("error");
            } else {
                poljeContent.style.border = "1px solid green";
                document.getElementById("porukaContent").innerHTML = "";
            }

            var poljeSlika = document.getElementById("photo");
            var photo = poljeSlika.value;
            if (photo.length == 0) {
                slanjeForme = false;
                poljeSlika.style.border = "1px dashed red";
                document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!<br>";
                document.getElementById("porukaSlika").classList.add("error");
            } else {
                poljeSlika.style.border = "1px solid green";
                document.getElementById("porukaSlika").innerHTML = "";
            }

            var poljeCategory = document.getElementById("category");
            if (poljeCategory.selectedIndex == 0) {
                slanjeForme = false;
                poljeCategory.style.border = "1px dashed red";
                document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
                document.getElementById("porukaKategorija").classList.add("error");
            } else {
                poljeCategory.style.border = "1px solid green";
                document.getElementById("porukaKategorija").innerHTML = "";
            }

            if (!slanjeForme) {
                event.preventDefault();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('form').addEventListener('submit', validateForm);
        });
    </script>
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

    <div class="content">
        <form id="unosForm" action="" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="title">Naslov vijesti</label>
                <div class="form-field">
                    <input type="text" id="title" name="title" class="form-field-textual">
                    <span id="porukaTitle" class="error"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="about">Kratki sadržaj vijesti</label>
                <div class="form-field">
                    <textarea id="about" name="about" cols="30" rows="10" class="form-field-textual"
                        maxlength="100"></textarea>
                    <span id="porukaAbout" class="error"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="content">Sadržaj vijesti</label>
                <div class="form-field">
                    <textarea id="content" name="content" cols="30" rows="10" class="form-field-textual"></textarea>
                    <span id="porukaContent" class="error"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="photo">Slika: </label>
                <div class="form-field">
                    <input type="file" id="photo" accept="image/*" class="input-text" name="photo">
                    <span id="porukaSlika" class="error"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="category">Kategorija vijesti</label>
                <div class="form-field">
                    <select id="category" name="category" class="form-field-textual">
                        <option value="" disabled selected>Odabir kategorije</option>
                        <option value="news">Fight News</option>
                        <option value="legends">History & Legends</option>
                    </select>
                    <span id="porukaKategorija" class="error"></span>
                </div>
            </div>
            <div class="form-item">
                <label>Spremiti u arhivu:</label>
                <div class="form-field">
                    <input type="checkbox" name="archive">
                </div>
            </div>
            <div class="form-item">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" value="Prihvati">Prihvati</button>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 MMA Spotlight Official Site</p>
    </footer>
</body>
</html>