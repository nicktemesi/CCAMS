<?php
session_start();
include_once("Classes/connect.php");

if (isset($_GET['groupid']) && is_numeric($_GET['groupid'])) {
    $groupid = $_GET['groupid'];
    
    // Fetch posts for the given group
    $DB = new Database();
    $query = "SELECT * FROM posts_table WHERE group_id = '$groupid' ORDER BY post_date DESC";
    $posts = $DB->readFromdb($query);
    
    // Return posts as JSON response
    header('Content-Type: application/json');
    echo json_encode($posts);
    exit;
} else {
    echo json_encode([]);
    exit;
}
?>
