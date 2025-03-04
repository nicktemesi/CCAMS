<?php

class Group {

    // Method to get group data by groupid
    public function get_group_data($groupid) {
        $DB = new Database();
        $query = "SELECT * FROM group_table WHERE groupid = '$groupid' LIMIT 1";
        $result = $DB->readFromDb($query);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }
}