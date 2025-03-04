<?php
session_start();
include_once("Classes/connect.php");
include_once("Classes/group.php");

if (isset($_GET['groupid']) && is_numeric($_GET['groupid'] ) ){
    $group_id = $_GET['groupid'];
    
    // Database connection
    $DB = new Database();
    
    // Fetch group members
    $query = "SELECT username FROM group_members_table WHERE group_id = $group_id";
    $members = $DB->readFromdb($query);

    if (!$members) {
        echo "No members found!";
        die;
    }
}
else {
    echo "Invalid group ID!";
    die;
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
            <h1 style = "font-size: 4rem; margin-bottom: 2em;">Group Members</h1>
            <div class="members_list">
                <!-- Repeat this block for each member -->
                <?php if (!empty($members)): ?>
                    <?php foreach ($members as $member): ?>
                        <div class="member_item">
                            <span class="member_name"><?php echo htmlspecialchars($member['username']); ?></span>
                            <button class="remove_button">Remove</button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No members found in this group.</p>
                <?php endif; ?>
                <!-- <div class="member_item">
                    <span class="member_name">Jane Smith</span>
                    <button class="remove_button">Remove</button>
                </div> -->
                <!-- Add more member_item blocks as needed -->
            </div>
         </main>
    </div>   
</body>
</html>
