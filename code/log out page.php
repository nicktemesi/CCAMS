<?php
session_start();
unset($_SESSION['userid']);
header("Location:log in page.php");
die;
?>