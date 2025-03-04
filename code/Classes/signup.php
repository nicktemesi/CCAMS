<?php
class Signup{
private $error = "";

    function evaluate($data){
        foreach($data as $key => $value){
            if(empty($value)){
                $this->error .= $key ." is empty<br>";
            }
            else{
                if($key == 'email'){
                    if(!preg_match("/^[\w\-]+@[\w\-]+\.[\w\-]+$/", $value))
                    {
                        $this->error .= $key ." is invalid<br>";
                    }
                }
                if($key == 'username'){
                    if(strstr($value, " "))
                    {
                        $this->error .= $key ." can't have spaces<br>";
                    }
                }
            }
            
        }
        if($this->error == ""){
            $this->create_user($data);
        }
        else{
            return $this->error;
        }
    }

    function create_user($data){

        $username = $data['username'];
        $email_address = $data['email'];
        $password = $data['password'];
        // $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $phone_number = $data['phone_number'];
        // create this using php
        $userid = $this->create_userid();

        $query = " insert into users_table (userid, username, email_address, password, phone_number) 
        value ('$userid', '$username', '$email_address', '$password', '$phone_number')";
        $DB = new Database();
        $DB->saveTodb($query);
    }

    private function create_userid(){
        $length = rand(4, 19);
        $number = "";
        for($i= 0; $i < $length; $i++){
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }

}
?>