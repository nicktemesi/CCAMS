<?php 
session_start();

include("Classes/connect.php"); 
include("Classes/login.php");

$username = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = new Login();
    $result = $login->evaluate($_POST);

    if ($result === true) {
        header("Location: user page.php"); 
        die;
    } else {
        echo "<div style='text-align: center; font-size: 12px;'>";
        echo "The following error(s) occurred:<br><br>";
        echo $result;
        echo "</div>";
    }
        $username = $_POST['username'];
        $password = $_POST['password'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ccams.com</title>
    <!-- link for fontawesome icons gotten from cdnjs website-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Displays the icon beside the title -->
    <link rel="icon" href="../Images used in project both design and actual web/Project logo Third Color.svg">
    <!-- css link -->
    <link rel="stylesheet" href="CSS/styles.css">
    <!-- Google fonts link for the poppins font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monomakh&family=Poppins:ital,
    wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;
    1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
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
        <div class="diff_main">
            <form action="" method="POST">
                <p>Log in </p>
                <div>
                    <input type="text" name="username" placeholder="&#xf007; username" value="<?php echo $username ?>">
                </div><br><br>
                <div style="position: relative;">
                    <input type="password" name="password" placeholder="&#xf023; password" value="<?php echo $password ?>" id="password">
                    <i class="fa-solid fa-eye"  id="show-password"></i>
                </div><br><br>
                <button type="submit" class="log_and_create_button">Log in</button>
            </form>
       </div>
    </div>
    <!-- JavaScript -->
     <script>
        const showPassword = document.querySelector("#show-password");
        const passwordField = document.querySelector("#password");
        showPassword.addEventListener("click", function(){
             // Toggle the "fa-eye-slash" class to change the icon
            this.classList.toggle("fa-eye-slash");
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        });
     </script>
</body>
</html>