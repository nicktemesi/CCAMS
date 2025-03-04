
 <?php
session_start();
include_once("Classes/connect.php");
include_once("Classes/login.php");
include_once("Classes/group.php");


// Check if user is logged in 
if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    $login = new Login();
    $result = $login->check_login($userid);
    if($result){
        if(isset($_GET['groupid']) && is_numeric($_GET['groupid'])){
            $groupid = $_GET['groupid'];
            $group = new Group();
            $group_data = $group->get_group_data($groupid);
            if(!$group_data){
                header("Location: user page.php");
                die;
            }
        } else {
            header("Location: user page.php");
            die;
        }
    } else {
        header("Location: log in page.php");
        die;
    }
} else {
    header("Location: log in page.php");
    die;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();

    // Fetch the username from the users_table
    $query = "SELECT username FROM users_table WHERE userid = '$userid'";
    $user_data = $db->readFromdb($query);

    if($user_data && count($user_data) > 0){
        $username = $user_data[0]['username'];

        // Insert group_id, user_id, and username into group_members_table
        $insertQuery = "INSERT INTO group_members_table (group_id, user_id, username) VALUES ('$groupid', '$userid', '$username')";
        $db->saveTodb($insertQuery);

        // Redirect to the same page to avoid form resubmission
        // header("Location: group page.php?groupid=$groupid");
        // die;
    } else {
        echo "Error: User not found!";
    }
}
// Fetch all posts for this group
$DB = new Database();
$query = "SELECT * FROM posts_table WHERE group_id = '$groupid' ORDER BY post_id DESC";
$posts = $DB->readFromdb($query);
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
                            <!-- <?php echo htmlspecialchars($groupname, ENT_QUOTES, 'UTF-8')?> -->
                             <!-- The group profile picture from the database goes here  -->
                        <div class="grp_profile_pic"> <img src="<?php echo $group_data['group_image']; ?>" alt="Group Image"></div>
                        <!-- The group description from the database goes here -->
                        <div class="shown_bio_div"> <?php echo $group_data['profile']; ?></div>
                        <!-- <?php echo htmlspecialchars($profile, ENT_QUOTES, 'UTF-8'); ?> -->
                    </div><br>
                    <span style = "width: 5%; display: block;">
                        <form  method = "post"action="">
                            <button>Join</button>
                        </form>
                    </span><br>
                    <!-- div containing group, the posted images will appeat here-->
                    <div class="actual_groups">
                        <!-- All the photos and content posted by the group should appear here -->
                        <div class="posted_content">
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
                                </div>
                     </div>
                </div>
                <div class="icon_div extra_stuff">
                    <a href=""><img src="../Images used in project both design and actual web/messaging icon.png" alt="" class="actual_icon"></a><br><br><br>
                    <a href="event display page.php?groupid=<?php echo $groupid; ?>" class="actual_icon grp_btn">Events</a><br><br><br><br><br>
                    <a href="members page.php?groupid=<?php echo $groupid; ?>" class="actual_icon grp_btn">Members</a><br><br><br><br><br>
                    <a href="" class="index_button user_button log_out" style = "margin-top: 4em;">Leave Group</a><br><br><br>
                </div>
            </div>
         </main>
    </div>
</body>
</html>


