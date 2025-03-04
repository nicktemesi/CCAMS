
<?php
include_once("Classes/connect.php");
// Retrieve group_id from the URL
$group_id = isset($_GET['groupid']) ? $_GET['groupid'] : '';

// After the group_id and a connection to the database already established
$DB = new Database();
$query = "SELECT * FROM events WHERE group_id = '$group_id'";
$events = $DB->readFromdb($query);

if ($events) {
    foreach ($events as $event) {
        echo "<h3>" . htmlspecialchars($event['event_title']) . "</h3>";
        echo "<p>Date: " . htmlspecialchars($event['event_date']) . "</p>";
        echo "<p>Description: " . nl2br(htmlspecialchars($event['event_description'])) . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No events found for this group.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>group members</title>
    <link rel="icon" href="../Images used in project both design and actual web/Project logo Third Color.svg">
    <!-- css link -->
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <!-- Wrapper for the whole mark up -->
    <div class="wrapper">
        <header>
            <!-- The logo -->
                <img src="../Images used in project both design and actual web/Project logo Third Color.svg" class="logo" alt="">
             <!-- The navigation -->
              <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li class ="dropdown">
                        <a href="">Activities</a>
                        <!-- This should display a dropdown for the groups -->
                        <ul class="dropdown-content"><br><br>
                            <li><a href="">Dance</a></li><br>
                            <li><a href="">Sports</a></li><br>
                            <li><a href="">Coding</a></li><br>
                            <li><a href="">Music</a></li><br>
                            <li><a href="">Religion</a></li>
                        </ul>
                    </li>
              </ul>
            </nav>
        </header>
        <!-- The main section -->
         <main class = main_formembers>
            <h1 style = "font-size: 4rem; margin-bottom: 2em;">Upcoming Events</h1>
            <div class="members_list">
                <!-- Repeat this block for each member -->
                <?php
                if ($events) {
                    foreach ($events as $event) {
                        echo '<div class="member_item">';
                        echo '<span class="member_name">' . htmlspecialchars($event['event_title']) . '</span>';
                        echo '<span class="member_name">' . nl2br(htmlspecialchars($event['event_description'])) . '</span>';
                        echo '<span class="member_name">' . htmlspecialchars($event['event_date']) . '</span>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No events found for this group.</p>';
                }
                ?>
                
                <!-- Add more member_item blocks as needed -->
            </div>
         </main>
    </div>   
</body>
</html>
