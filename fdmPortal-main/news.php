<?php
  include "connection.php";

  $getNews = "SELECT * FROM News ORDER BY news_id DESC;";
  $NewsResult = mysqli_query($dbconnect, $getNews);

  while($row = mysqli_fetch_array($NewsResult)) {
    echo "<div class='news-article'>";
    echo "<h4>" . strtoupper($row['title']) . "</h4>";
    echo "<p class='news-date'>" . $row['dateCreated'] . "</p>";
    echo "<span class='category' style='color: orange;'>" . strtoupper($row['category']) . "</span>";
    echo "<p>" . $row['message'] . "</p>";
    echo "</div>";
  }
?>
