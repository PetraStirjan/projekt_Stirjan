<?php
function get_articles_by_category($category) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projektmmanews";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM articles WHERE category = ? AND archive = 0");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            if (!empty($row["photo"])) {
                echo '<div class="article-image">';
                echo '<img src="' . $row["photo"] . '" alt="Article Image">';
                echo '</div>';
            }
            echo "<div class='article-content'>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["about"] . "</p>";
            echo '<a href="full_article.php?id=' . $row["id"] . '">Read more</a>';
            echo "</div>";
            echo "</article>";
        }
    } else {
        echo "No articles found.";
    }
    $stmt->close();
    $conn->close();
}
?>
