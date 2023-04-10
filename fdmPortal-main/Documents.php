<?php
session_start();
include "connection.php";
$selectDocuments = "SELECT * FROM Documents;";
$selectDocumentsResult = mysqli_query($dbconnect, $selectDocuments);
echo "<div class='documents-container'>";
while($row = mysqli_fetch_array($selectDocumentsResult)) {
    echo "<div class='document'>";
    echo "<h4>" . $row['name'] . "</h4>";
    echo "<p><span class='label'>Description:</span> <span class='value'>" . $row['description'] . "</span></p>";
    echo "<p><span class='label'>Date Uploaded:</span> <span class='value'>" . $row['uploadDate'] . "</span></p>";
    echo "<a href='" . $row['filePath'] . "' download class='button'>Download / View</a>"; // Add the 'button' class to the link
    echo "</div>";
}
echo "</div>";
?>

  