<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>FDM Employee Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css">
<script src="https://kit.fontawesome.com/c04efcf51c.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    var modal = document.getElementById("allNewsModal");
    var btn = document.getElementById("all-news-button");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
        loadAllNews();
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function loadAllNews() {
        $.ajax({
            url: 'news.php',
            success: function(data) {
                $('#allNewsContainer').html(data);
            }
        });
    }

    // Add the new JavaScript code for the documents modal here
    const documentsBtn = document.getElementById('document-button');
    const documentsModal = document.getElementById('documentsModal');
    const closeDocuments = document.getElementsByClassName('close-documents')[0];

    documentsBtn.onclick = () => {
        documentsModal.style.display = 'block';
        loadDocuments();
    };

    closeDocuments.onclick = () => {
        documentsModal.style.display = 'none';
    };

    window.onclick = (event) => {
        if (event.target === documentsModal) {
            documentsModal.style.display = 'none';
        }
    };

    // Add the function to load documents
    function loadDocuments() {
        $.ajax({
            url: 'documents.php',
            success: function(data) {
                $('#documents-container').html(data);
            }
        });
    }
});

</script>


</head>
<body>
<!-- redirect user to login page if not logged in -->
<?php if (!isset($_SESSION['EmployeeID'])) {
    header("location:login.php");
} else { ?>
    <!-- else, display the home page to the employee -->
    <ul class="navbar">
        <li>
            <a href="index.php" class="company-link">
                <img src="home/logo1.png" alt="FDM Logo" width="100" height="auto">
                
            </a>
        </li>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="users.php">Chats</a></li>
        <li><a href="account.php">Self Service</a></li>
        <!-- display admin link -->
        <?php
        if ($_SESSION['Type'] == "admin") {
            ?>
            <li><a href="admin.php">Admin</a></li>
        <?php } ?>
        <li><a href="logout.php" id="logout">Logout?</a></li>
    </ul>

    <!-- Welcome message -->
    <div class="welcome-box">
        <h2>Welcome Back, <?php echo $_SESSION['Name']; ?>!</h2>
    </div>

    <!-- Display RECENT news posts -->
    <?php
    include "connection.php";
    $getNews = "SELECT * FROM News ORDER BY news_id DESC LIMIT 4;";
    $NewsResult = mysqli_query($dbconnect, $getNews);
    ?>

    <div class="news-container">
        <h3>Recent News:</h3>
        <div class="news-articles">
            <?php
            while ($row = mysqli_fetch_array($NewsResult)) {
                echo "<div class='news-article'>";
                echo "<h4>" . strtoupper($row['title']) . "</h4>";
                echo "<span class='category' style='margin:0 auto;color:#ee6c4d;'>" . strtoupper($row['category']) . " </span>";
                echo "<p class='message'>" . $row['message'] . "</p>";
                echo "<p class='news-date'>" . $row['dateCreated'] . "</p>";
                echo "</div>";
            }
            ?>
        </div>
        
        <button id="all-news-button" class="button">All News</button>
    </div>

    <!-- Buttons -->
    <div class="buttons-container">
        <div class="button-box">
            <p class="button-description">Access and manage your documents.</p>
            <button id="document-button" class="button">View Documents</button>
        </div>
        <div class="button-box">
            <p class="button-description">View and edit your profile information.</p>
            <a href="profile.php" class="button">View Profile</a>
        </div>
        <div class="button-box">
            <p class="button-description">Complete Self Service Tasks</p>
            <a href="account.php" class="button">Self Service Task</a>
        </div>
    </div>
    

<?php } ?>

<div id="allNewsModal" class="modal">
    <div class="modal-content modal-content-common">
        <span class="close">&times;</span>
        <h2>All News</h2>
        <div id="allNewsContainer">
           
        </div>
    </div>
</div>

<div id="documentsModal" class="modal">
    <div class="modal-content modal-content-common">
        <span class="close-documents">&times;</span>
        <h2>Company Documents</h2>
        <div id="documents-container" class="documents-container">
            <!-- All documents will be loaded here -->
        </div>
    </div>
</div>


<?php include "footer.php" ?>
</body>
</html>

