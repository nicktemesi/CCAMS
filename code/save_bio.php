
<?php
session_start();
include("Classes/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $bio = trim($_POST['bio']);

        if (strlen($bio) > 500) {
            die("Bio should not exceed 500 characters.");
        }

        $DB = new Database();
        // $conn = $DB->connectTodb();

        // Enable error reporting
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $bio = $DB->escapeString($bio);
        $query = "UPDATE users_table SET bio = '$bio' WHERE userid = '$userid'";

        try {
            $result = $DB->saveTodb($query);
            if ($result) {
                header("Location: user page.php");
                die;
            } else {
                die("Failed to update bio: Query execution failed.");
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        header("Location: log in page.php");
        die;
    }
}


