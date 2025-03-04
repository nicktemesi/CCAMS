<?php
session_start();
include_once("Classes/connect.php");
include_once("Classes/login.php");
include_once("Classes/group.php");


// Retrieve group_id from the URL
$group_id = isset($_GET['groupid']) ? $_GET['groupid'] : '';



// Check if user is logged in 
if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
    $login = new Login();
    $result = $login->check_login($user_id);
    if(!$result){
        header("Location: log in page.php");
        die;
    }
} else {
    header("Location: log in page.php");
    die;
}

if(isset($_GET['groupid']) && is_numeric($_GET['groupid'])) {
    $groupid = $_GET['groupid'];
    $group = new Group();
    $group_data = $group->get_group_data($groupid);

    if(!$group_data) {
        echo "Group not found!";
        die;
    }
} else {
    echo "Invalid group ID!";
    die;
}

// Placeholder for checking if the user is an admin
$is_admin = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Events - <?php echo $group_data['group_name']; ?></title>
    <link rel="icon" href="../Images used in project both design and actual web/Project logo Third Color.svg">
    <link rel="stylesheet" href="CSS/calendar styles.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Group Events Calendar</h1>
            <h2><?php echo $group_data['group_name']; ?></h2>
        </header>
        
        <main>
            <div id="calendar">
                <!-- Calendar structure goes here -->
                <div class="calendar-header">
                    <button class="prev-month">Previous</button>
                    <span class="month-label">August 2024</span>
                    <button class="next-month">Next</button>
                </div>
                <div class="calendar-grid">
                    <div class="day">Sun</div>
                    <div class="day">Mon</div>
                    <div class="day">Tue</div>
                    <div class="day">Wed</div>
                    <div class="day">Thu</div>
                    <div class="day">Fri</div>
                    <div class="day">Sat</div>
                    <!-- Calendar days will be filled dynamically later -->
                </div>
            </div>
            
            <!-- Form for adding events -->
            <?php if ($is_admin): ?>
                <div class="event-form">
                    <h3>Add New Event</h3>
                    <form id="addEventForm" action="save event.php" method ='POST'>
                        <label for="eventTitle">Event Title:</label>
                        <input type="text" id="eventTitle" name="eventTitle" required>
                        
                        <label for="eventDate">Date:</label>
                        <input type="date" id="eventDate" name="eventDate" required>
                        
                        <label for="eventDescription">Description:</label>
                        <textarea id="eventDescription" name="eventDescription"></textarea>

                        <!-- Hidden input to store group_id -->
                        <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                        
                        <button type="submit">Add Event</button>
                    </form>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
