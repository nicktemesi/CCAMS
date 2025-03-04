<?php
include_once("Classes/connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['group_id'];
    $event_title = $_POST['eventTitle'];
    $event_date = $_POST['eventDate'];
    $event_description = $_POST['eventDescription'];

    // Ensure all fields are filled
    if (!empty($group_id) && !empty($event_title) && !empty($event_date) && !empty($event_description)) {
        // Prepare the query
        $query = "INSERT INTO events (group_id, event_title, event_date, event_description) 
                  VALUES ('$group_id', '$event_title', '$event_date', '$event_description')";

        // Use the saveTodb method from your Database class
        $DB = new Database();
        $DB->saveTodb($query);

        // Redirect or give feedback
        echo "Event added successfully!";
    } else {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "Please fill in all fields.";
    }
}
?>
