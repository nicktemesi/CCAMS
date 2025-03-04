<?php
session_start();
include_once("Classes/connect.php");
include_once("Classes/login.php");
include_once("Classes/group.php"); 



// Check if user is logged in 
if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
    $login = new Login();
    $result = $login->check_login($user_id);
    if(!$result){
        header("Location: log in page.php");
        die;
    }
} else {
    header("Location: log in page.php");
    die;
}

// Form submission handling for a post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['groupid']) && isset($_POST['postContent'])) {
        $groupid = $_POST['groupid'];
        $postContent = htmlspecialchars($_POST['postContent']);
        $postImage = '';

        // Debugging output
        // echo "Group ID: " . $groupid . "<br>";
        // echo "Post Content: " . $postContent . "<br>";
        // echo "User ID: " . $user_id . "<br>";      

            // Validate that the user_id exists in the users_table
            $DB = new Database();
            $query = "SELECT * FROM users_table WHERE userid = '$user_id'";
            $user_exists = $DB->readFromdb($query);

            if (!$user_exists) {
                echo "User not found!";
                exit;
            }

            // Handle file upload
            if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] === UPLOAD_ERR_OK) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["postImage"]["name"]);
                if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $target_file)) {
                    $postImage = $target_file;
                }
            }

            // Save post to database
            $DB = new Database();
            $query1 = "INSERT INTO posts_table (group_id, user_id, post_content, post_image) VALUES ('$groupid', '$user_id', '$postContent', '$postImage')";
            $result = $DB->saveTodb($query1);
            if ($result) {
                echo "Post successfully saved!";
            } else {
                echo "Failed to save post!";
            }
        // }             
    }
}
if(isset($_GET['groupid']) && is_numeric($_GET['groupid'])) {
    $groupid = $_GET['groupid'];
    $group = new Group();
    $group_data = $group->get_group_data($groupid);

    // Fetch all posts for this group
    $DB = new Database();
    $query2 = "SELECT * FROM posts_table WHERE group_id = '$groupid' ORDER BY post_id DESC";
    $posts = $DB->readFromdb($query2);

    if(!$group_data) {
        echo "Group not found!";
        die;
    }
} else {
    echo "Invalid group ID!";
    die;
}

// Placeholder for checking if the user is an admin
$is_admin = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $group_data['group_name']; ?></title>
    <link rel="icon" href="../Images used in project both design and actual web/Project logo Third Color.svg">
    <!-- css link -->
    <link rel="stylesheet" href="CSS/styles.css">
    

</head>
<body>
    <!-- Wrapper for the whole mark up -->
    <div class="wrapper">
        <header>
            <!-- The logo -->
                <img src="../Images used in project both design and actual web/Project logo Third Color.svg" class="logo" alt="">
             <!-- The navigation -->
              <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li class ="dropdown">
                        <a href="">Activities</a>
                        <!-- This should display a dropdown for the groups -->
                        <ul class="dropdown-content"><br><br>
                            <li><a href="">Dance</a></li><br>
                            <li><a href="">Sports</a></li><br>
                            <li><a href="">Coding</a></li><br>
                            <li><a href="">Music</a></li><br>
                            <li><a href="">Religion</a></li>
                        </ul>
                    </li>
              </ul>
            </nav>
        </header>
        
        <!-- The main section -->
         <main>
            <div class="group_side">
                <div class="group_div">
                    <!-- div containing the group name, group description and profile picture-->
                    <div class="top_part">
                        <!-- The group name from the database goes here -->
                        <div class="grp_name_div"><?php echo $group_data['group_name']; ?></div>
                             <!-- The group profile picture from the database goes here  -->
                        <div class="grp_profile_pic"> <img src="<?php echo $group_data['group_image']; ?>" alt="Group Image"></div>
                        <!-- The group description from the database goes here -->
                        <div class="shown_bio_div"> <?php echo $group_data['profile']; ?></div>
                    </div><br><br>
                    <!-- div containing group, the posted images will appear here-->
                     <div class="actual_groups">
                         <!-- Check if the user is an admin -->
                         <div class="div_for_postform">
                                <?php if ($is_admin): ?>
                                <form class="post_content" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="groupid" value="<?php echo $groupid; ?>">
                                    <label for="postContent">Post Content:</label>
                                    <textarea name="postContent" id="postContent" required></textarea>
                                    <label for="postImage">Upload Image:</label>
                                    <input type="file" name="postImage" id="postImage" accept="image/*">
                                    <button type="submit">Post</button>
                                </form>
                                <?php endif; ?>
                         </div>
                         <div class=" posted_content">
                                <!-- All the photos and content posted by the group should appear here -->
                                
                                <?php if ($posts): ?>
                                        <?php foreach ($posts as $post): ?>
                                            <div class="entire_post">
                                                <div class="image_post" style="height:80%;">
                                                    <?php if (!empty($post['post_image'])): ?>
                                                        <img src="<?php echo $post['post_image']; ?>" alt="Post Image" style="width:100%; height:100%; object-fit:cover;">
                                                    <?php else: ?>
                                                        <p>No Image</p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="caption" style="height:20%; font-size: 2rem;">
                                                    <?php echo htmlspecialchars($post['post_content']); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No posts available.</p>
                                    <?php endif; ?>   
                                <!-- <div class = "entire_post">
                                    <div class = "image_post"style = "height:80%;">The image goes here</div>
                                    <div class = "caption"style = "height:20%;">The caption </div>
                                </div>     -->
                        </div>
                     </div>
                </div>
                <div class="icon_div extra_stuff">
                    <a href=""><img src="../Images used in project both design and actual web/messaging icon.png" alt="" class="actual_icon"></a><br><br><br>                   
                    <a href="calendar page.php?groupid=<?php echo $groupid; ?>" id="openCalendar" class="actual_icon grp_btn">Events</a><br><br><br><br><br>
                    <!-- <button id="openCalendar" class="actual_icon grp_btn">Events</button> -->
                    <a href="members page admin.php?groupid=<?php echo $groupid; ?>" class="actual_icon grp_btn">Members</a><br><br><br><br><br>
                    <a href="" class="actual_icon grp_btn">Requests</a><br>
                    <a href="" class="index_button user_button log_out" style = "margin-top: 1em;">Delete Group</a><br><br><br>
                </div>
            </div>
         </main>
    </div>   
    
</body>
</html>
