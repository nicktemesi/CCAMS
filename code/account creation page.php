<?php 
include("Classes/connect.php");
include("Classes/signup.php");

$username = "";
$email_address = "";
$phone_number = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $signup = new Signup();
    $result = $signup->evaluate($_POST);

        if($result != ""){
            echo "<div style = 'text-align: center; font-size: 12px;'>";
            echo "The following error(s) occured:<br><br>";
            echo $result;
            echo "</div>";
        }
        else{
            header("Location:log in page.php");
            die;
        }
        $username = htmlspecialchars($_POST['username']);
        $email_address = htmlspecialchars($_POST['email']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ccams.com</title>
    <link rel="icon" href="../Images used in project both design and actual web/Project logo Third Color.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="CSS/styles.css">
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
            <p>Account Creation </p>
            <div>
                <input type="text" name="username" placeholder="&#xf007; username"  value="<?php echo $username ?>">
            </div><br><br>
            <div>
                <input type="tel" name="phone_number" placeholder=" &#xf095; phone number" value="<?php echo $phone_number ?>">
            </div><br><br>
            <div>
                <input type="email" name="email" placeholder="&#x40; email address" value="<?php echo $email_address ?>">
            </div><br><br>
            <div style="position: relative;">
                <input type="password" name="password" placeholder="&#xf023; password" id="password">
                <i class="fa-solid fa-eye" id="show-password"></i>
            </div><br><br>
            <div style="position: relative;">
                <input type="password" name="confirmpassword" placeholder="&#xf023; confirm password" id="password">
                <i class="fa-solid fa-eye" id="show-password"></i>
            </div><br><br>
            <button type="submit" class="log_and_create_button">Sign up</button>
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