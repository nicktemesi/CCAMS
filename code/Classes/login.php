<?php
// session_start();

class Login{

    private $error = "";

    function evaluate($data){

        $username =  htmlspecialchars($data['username']);
        $userpassword =  $data['password']; 

        $query = "select * from users_table where username = '$username' limit 1";
        // and password = '$userpassword'  
        $DB = new Database();
        $result = $DB->readFromdb($query);

    if($result = $DB->readFromdb($query)){
        $row = $result[0];
        if($userpassword == $row['password']){
        echo "Entered Password: " . $userpassword . "<br>";
        echo "Stored Hashed Password: " . $row['password'] . "<br>";
        // create a session data for the userid in the database - it authenticates a user
         $_SESSION['userid'] = $row['userid'];
         return true; // Return true on success
        }
        else{
            $this->error .="Invalid username or password";
            return $this->error;
        }
    }
    else{
        $this->error .="Invalid username or password";
        return $this->error;
    }    
   
    return $this->error;
    }

    function check_login($userid){

        $query = "select userid from users_table where userid = '$userid' limit 1";
        $DB = new Database();
        $result = $DB->readFromdb($query);

    if($result){
        return true;
    }
    else{
        return false;
    }
    

    }
}
?>