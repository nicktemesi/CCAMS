<?php
    session_start();
    // print_r($_SESSION);

    include("Classes/connect.php");
    include("Classes/login.php");
    include("Classes/user.php");
    include("Classes/view groups content.php");
    

    // Check if user is logged in 
    if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
                // Get the user ID of the profile being viewed
        if (isset($_GET['userid'])) {
            $profile_userid = $_GET['userid']; // Profile user ID
        } else {
            // Default to the logged-in user if no user_id is provided in the URL
            $profile_userid = $userid;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_image'])) {
            $target_dir = "uploads/profile_images/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true); // Recursively create the directory with proper permissions
            }
            $filename = preg_replace('/[^a-zA-Z0-9\._-]/', '_', $_FILES["profile_image"]["name"]);
            $target_file = $target_dir . $filename;
            $upload_ok = 1;
            $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Check if image file is a valid image type
            $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
            if ($check !== false) {
                $upload_ok = 1;
            } else {
                echo "File is not an image.";
                $upload_ok = 0;
            }
        
            // Check file size
            if ($_FILES["profile_image"]["size"] > 500000) { // Limit: 500 KB
                echo "Sorry, your file is too large.";
                $upload_ok = 0;
            }
        
            // Allow certain file formats
            if (!in_array($image_file_type, ["jpg", "png", "jpeg", "gif"])) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $upload_ok = 0;
            }
        
            // Check if $upload_ok is set to 0 by an error
            if ($upload_ok == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                // Attempt to upload file
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    // Save file path to the database
                    $DB = new Database();
                    $query = "UPDATE users_table SET profile_image = '$target_file' WHERE userid = $userid";
                    $DB->saveToDb($query);
        
                    echo "The file " . htmlspecialchars(basename($_FILES["profile_image"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        $login = new Login();
        $result = $login->check_login($userid);

        if($result){
        // retrieve user data that need to be visible to the monitor
        $user = new User();
        $user_data = $user->get_data($userid);
        if(!$user_data){
            header("Location:log in page.php");
            die;
        }
        else{
            $view_content = new View_content();
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");
            $posts = $view_content->get_home_content($userid);
            if (isset($posts['total_pages']) && isset($posts['current_page'])) {
                $total_pages = $posts['total_pages'];
                $current_page = $posts['current_page'];
            } else {
                $total_pages = 1; // Default to 1 if no posts
                $current_page = 1;
            }
            
        }
        }
        else{
            header("Location:log in page.php");
            die;
        }
    }
    else{
        header("Location:log in page.php");
        die;
    }
// print_r($user_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ccams.com</title>
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
            
             <div class="fold userpage_fold">
                <!-- Profile side -->
                <div class="profile_side">
                    <!-- container for profile picture -->
                    <div class="pic_div">
                        <!-- actual profile picture -->
                        <!-- <img src="../Images used in project both design and actual web/profile pic dummy.png" alt="" class="profile_pic"><br><br> -->
                          <!-- Display profile picture -->
                        <div class="profile_img_display">
                            <?php if (!empty($user_data['profile_image'])): ?>
                                <img src="<?php echo $user_data['profile_image']; ?>" alt="Profile Image" class="profile_pic">
                            <?php else: ?>
                                <img src="../Images used in project both design and actual web/profile pic dummy.png" alt="Default Profile Image" class="profile_pic">
                            <?php endif; ?>
                        </div>
                        <!-- Allow users to upload a new profile picture -->
                        <?php if ($_SESSION['userid'] == $profile_userid): ?>
                            <form method="POST" enctype="multipart/form-data">
                                <input type="file" name="profile_image" accept="image/*" class="profile_img_input">
                                <button type="submit" class="img_upload_btn">Upload</button>
                            </form>
                        <?php endif; ?>
                        <div style = "font-size: 3em; text-align: center; width: 90%;"> <p style = "margin: 0 0 0 25px;"> <?php echo $user_data['username']?> </p> </div><br><br>
                    </div>
                    <!-- container for bio -->
                    <div class="bio_div">
                        <?php if ($_SESSION['userid'] == $profile_userid): ?>
                            <form method="post" action="save_bio.php" style="width: 90%;">
                                <textarea name="bio" class="bio" placeholder="Write your bio here...(500 characters)"><?php echo htmlspecialchars($user_data['bio'] ?? ''); ?></textarea><br><br>
                                <button type="submit" class="index_button user_button edit_profile">Save Bio</button>
                            </form>
                        <?php else: ?>
                            <p><?php echo nl2br(htmlspecialchars($user_data['bio'])); ?></p>
                        <?php endif; ?>

                    </div><br><br><br><br><br><br>
                    <a href="group creation page.php" class="index_button user_button">Create Group</a><br><br><br><br><br>
                </div>
                <!-- groups and search bar area -->
                <div class="group_side">
                    <div class="group_div">
                        <!-- search bar -->
                        <form method="GET" action="user page.php" id = "search-form">
                        <input type="text" name="search_box" class="search_box" placeholder="Search for groups">
                        <button type="submit" style = "max-width: 15%;">Search</button><br><br><br>
                        </form>

                        <!-- Display search results -->
                        <div class="search-results">
                        <?php
                                if (isset($_GET['search_box'])) {
                                        $search = $_GET['search_box'];
                                        $DB = new Database();
                                        $query = "SELECT * FROM group_table WHERE group_name = '$search' LIMIT 1";
                                        $results = $DB->readFromDb($query);
                                        $error_message = "";
                                        if ($results) {
                                            // foreach ($results as $group) {
                                            //     echo '<div class="group-result">';
                                            //     echo '<a href="group page.php?groupid=' . $group['groupid'] . '">';
                                            //     echo '<div class="grp_name_div">' . $group['group_name'] . '</div>';
                                            //     echo '<div class="grp_profile_pic"><img src="' . $group['group_image'] . '" alt="Group Image"></div>';
                                            //     echo '<div class="shown_bio_div">' . $group['profile'] . '</div>';
                                            //     echo '</a>';
                                            //     echo '</div>';
                                            // }
                                            $group = $results[0];
                                            header("Location: group page.php?groupid=" . $group['groupid']);
                                            die;
                                        } else {
                                            $error_message = 'No groups found!';
                                        }
                                }
                                    ?>
                        </div>
                        <ul>
                            <li><a href="" class="selection_buttons">Filter</a></li>
                            <li><a href="" class="selection_buttons">Sports</a></li>
                            <li><a href="" class="selection_buttons">Dance</a></li>
                            <li><a href="" class="selection_buttons">Programming</a></li>
                            <li><a href="" class="selection_buttons">Religion</a></li>
                            <li><a href=""class="selection_buttons">Music</a></li>
                        </ul><br><br>
                        <!-- div containing group -->
                        <div class="actual_groups">
                            <nav >
                                <ul class="actual_group_icon">
                                    <li>Home</li>
                                    <li>Notifications</li>
                                    <li>Explore</li>
                                </ul>
                            </nav>

                            <div class="actual_group_content">
                                <!-- HTML to Display Posts -->
                                <div class="posts-container">
                                    <?php if (!empty($posts['posts'])): ?>
                                        <?php foreach ($posts['posts'] as $post): ?>
                                            <div class="post">
                                                <h3 style = "margin;"><?php echo htmlspecialchars($post['group_name'] ?? 'N/A'); ?></h3>
                                                <p style = "font-size:10px;"><?php echo htmlspecialchars($post['post_content'] ?? 'N/A'); ?></p>
                                                <?php if (!empty($post['post_image'])): ?>
                                                    <img src="<?php echo $post['post_image']; ?>" alt="Post Image">
                                                <?php endif; ?>
                                                <small>Posted on: <?php echo $post['post_date'] ?? 'N/A'; ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                     <?php else: ?>
                                        <p>No posts found.</p>
                                    <?php endif; ?>
                                </div>
                                
                                <?php 
                                // Preserve existing query parameters (excluding 'page')
                                $query_params = $_GET;
                                unset($query_params['page']); 
                                $query_string = http_build_query($query_params); 
                                $base_url = $_SERVER['PHP_SELF'] . '?' . $query_string;
                                ?>
                                <!-- Pagination Links -->
                                <div class="pagination">
                                    <?php if ($current_page > 1): ?>
                                        <a href="<?php echo $base_url; ?>&page=<?php echo $current_page - 1; ?>">Previous</a>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <?php if ($i == $current_page): ?>
                                            <strong><?php echo $i; ?></strong>
                                        <?php else: ?>
                                            <a href="<?php echo $base_url; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($current_page < $total_pages): ?>
                                        <a href="<?php echo $base_url; ?>&page=<?php echo $current_page + 1; ?>">Next</a>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="icon_div">
                        <a href=""><img src="../Images used in project both design and actual web/messaging icon.png" alt="" class="actual_icon"></a>
                        <a href="log out page.php" class="index_button user_button log_out">Log Out</a>
                        <a href ="" class = " icon_div_buttons index_button">Groups</a>
                        <a href ="" class = " icon_div_buttons index_button">Events</a>
                        <a href ="" class = " icon_div_buttons index_button">Group Admin</a>
                    </div>
                </div>
            </div>
         </main>
    </div>
    
</body>
<script>
if (window.location.search.includes('bio_updated=true')) {
    alert('Your bio has been updated successfully!');
}

document.addEventListener('DOMContentLoaded', function () {
    const paginationLinks = document.querySelectorAll('.pagination a');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const page = this.getAttribute('href').split('=')[1];

            fetch(`user page.php?page=${page}`)
                .then(response => response.text())
                .then(data => {
                    // Create a temporary element to extract the posts section
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data;

                    // Replace only the posts section
                    const newPostsContainer = tempDiv.querySelector('.posts-container');
                    const oldPostsContainer = document.querySelector('.posts-container');

                    if (newPostsContainer && oldPostsContainer) {
                        oldPostsContainer.innerHTML = newPostsContainer.innerHTML;
                    }

                    // Update pagination links
                    const newPagination = tempDiv.querySelector('.pagination');
                    const oldPagination = document.querySelector('.pagination');
                    if (newPagination && oldPagination) {
                        oldPagination.innerHTML = newPagination.innerHTML;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});


</script>
</html>
