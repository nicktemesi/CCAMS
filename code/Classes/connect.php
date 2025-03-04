<?php
class Database{
    // localhost:3312
private $host = "localhost";
private $username = "root";
private $password = "";
private $db = "ccams";
// ccams_db
    function connectTodb(){
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
    }
    // Escape stringz-> I used it in the displaying of bio for security reasons
    function escapeString($value) {
        $conn = $this->connectTodb();
        return mysqli_real_escape_string($conn, $value);
    }
    // reads information from the databasa
    function readFromdb($query){
        $conn = $this->connectTodb();
        $result = mysqli_query($conn,$query);
        // incase of an error it will be displayed
        if (!$result) {
            die("Query Error: " . mysqli_error($conn));
        }
        // displaying the read information on the mornitor
        $data = false;
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
    // saves information to the database from the user
    function saveTodb($query){
        $conn = $this->connectTodb();
        $result = mysqli_query($conn,$query);
        if (!$result) {
            echo "Error executing query: " . mysqli_error($conn); // Outputs the MySQL error
            return false; // Explicitly indicate failure
        }
        return true; // Explicitly indicate success
    }
}
// $DB = new Database();
// $username =" JerySpringer";
// $query = "insert into users_table (username) value('$username')";
// $DB->saveTodb($query);
// $query1 = "select * from users_table";
// $data = $DB->readFromdb($query1);

// echo "<pre>";
// print_r($data);
// echo "</pre>";
 ?>