<?php
class User{
    function get_data($userid){
        $query = "select * from users_table where userid = '$userid' limit 1";
        $DB = new Database();
        $result = $DB->readFromdb($query);
        if($result){
            $row = $result[0];
            return $row; 
        }
        else{
            return false;
        }
    }
}
?>