<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("Classes/connect.php");
include("Classes/create group.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $creategroup = new CreateGroup();
    $creategroup->create_group($_POST, $_FILES);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>group creation page</title>
    <link rel="icon" href="../Images used in project both design and actual web/Project logo Third Color.svg">
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<div class = group_form>
    <div id="group-form-container" class="modal">
            <div class="modal-content">
                
                <form id="group-form" method = "POST" enctype="multipart/form-data">
                    <label for="group-name">Group Name:</label>
                    <input type="text" id="group-name" name="group_name" required>

                    <label for="group-description">Description (100 characters max):</label>
                    <textarea id="group-description" name="profile" maxlength="100" required></textarea>

                    <label for="group-category">Category:</label>
                        <select id="group-category" name="category">
                            <option value="Sports">Sports</option>
                            <option value="Music">Music</option>
                            <option value="Coding">Coding</option>
                            <option value="Dance">Dance</option>
                            <option value="Religion">Religion</option>
                        </select>

                    <label for="group-image">Group Image:</label>
                    <input type="file" id="group-image" name="group_image" accept="image/*" required>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
</div>
</body>
</html>