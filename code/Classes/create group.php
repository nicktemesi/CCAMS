<?php 
class CreateGroup{
function create_group($data, $files){

    $groupname = htmlspecialchars($data['group_name']);
    $profile = htmlspecialchars($data['profile']);
    $category = $data['category'];
   
    // create this using php
    $groupid = $this->create_groupid();

    // Handle file upload for group image
    $group_image = "";
    if (!empty($_FILES['group_image']['name'])) {
        $group_image = $this->upload_image($_FILES['group_image']);
    }

    
        echo "<pre>";
        print_r($files);
        echo "</pre>";
        // Handle file upload
    // $target_dir = "uploads/groups/";
    // if (!file_exists($target_dir)) {
    //     mkdir($target_dir, 0777, true);
    // }
    // $target_file = $target_dir . basename($files["group_image"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // // Check if image file is a actual image or fake image
    // $check = getimagesize($files["group_image"]["tmp_name"]);
    // if ($check !== false) {
    //     $uploadOk = 1;
    // } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }

    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // // Check file size
    // if ($files["group_image"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // // Allow certain file formats
    // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    // }

    // // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    //     $group_image = ""; // Handle the case when the file is not uploaded
    // // if everything is ok, try to upload file
    // } else {
    //     if (move_uploaded_file($files["group_image"]["tmp_name"], $target_file)) {
    //         echo "The file " . htmlspecialchars(basename($files["group_image"]["name"])) . " has been uploaded.";
    //         $group_image = $target_file; // Set the path to the uploaded file
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //         $group_image = ""; // Handle the case when the file upload fails
    //     }
    // }

    $query = " insert into group_table (group_name, profile, groupid, category, group_image) 
    value ('$groupname', '$profile', '$groupid', '$category', '$group_image')";
    //echo $query;
    $DB = new Database();
    // $insert_id = 
    $DB->saveTodb($query);
    // return $insert_id ? $groupid : false;
    header("Location: group admin page.php?groupid=$groupid");
    die;
    
}

 function create_groupid(){
    $length = rand(1, 10);
    $number = "";
    for($i= 0; $i < $length; $i++){
        $new_rand = rand(0,9);
        $number = $number . $new_rand;
    }
    return $number;
}
function upload_image($file) {
    $target_dir = "uploads/groups/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}
}
?>