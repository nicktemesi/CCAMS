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
        <!-- The header section -->
        <header>
            <!-- The logo -->
            <img src="../Images used in project both design and actual web/Project logo Third Color.svg" class="logo" alt="website logo">
             <!-- The navigation -->
            <nav>
                <ul>
                    <li><a href=" #main_main">Home</a></li>
                    <li><a href="#below_fold">About</a></li>
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
        <main >
            <div class="fold" id = "main_main">
                <div class="left_side">
                    <div class="words">
                        <h1>Discover the best </h1>
                        <h1>version of yourself!! </h1>
                        <h1>Unlock your </h1>
                        <h1> Potential...  </h1>
                        <img src="../Images used in project both design and actual web/arrow-down-solid.svg" alt="" class="down_arrow"><br><br><br><br><br><br>
                    <!-- The button directs you to the account creation page -->
                        <a href="account creation page.php" class="index_button for_hover">Let's Begin</a>
                </div>
                <div class="photos">
                    <img src="../Images used in project both design and actual web/landing page image two.png" alt="" class="landing_image"><br><br><br>
                    <img src="../Images used in project both design and actual web/landing page image three.png" alt="" class="landing_image">
                </div>
                </div>
                <div class="right_side">
                    <img class=bg src="../Images used in project both design and actual web/landing page image one.png" alt="">
                    <h1 style="margin-left: 5px;">Feeling like you have a lot of FREE time?</h1>
                    <p style="margin-left: 5px;">Feeling like you waste your free time on IRRELEVANT stuff? </p><br><br><br>
                    <p style="margin-left: 5px;">We help comrades like you grow their talents and hobbies by connecting them to the right GROUP</p><br><br><br><br><br><br><br><br><br>
                    <!-- The button directs you to the log in page -->
                    <a href="log in page.php" class="index_button has_acct for_hover">Already have an account?Log in</a><br>
                </div>
            </div>
        
            <!-- information below the fold -->
            <div id="below_fold">
                <div class="about_section">
                    <p class="abt_title" style="text-align: center; background-color: #FFBFFE; font-weight: bold;">About </p>
                    <div class="both_logo_explanation" style= "display: flex; gap: 2em;">
                        <div class="big_logo_div" style="width: 300vw; flex-wrap: wrap; height: auto;">
                            <img src="../Images used in project both design and actual web/Project logo Third Color.svg" alt="">
                        </div>
                        <div class="explanation_of_about">
                            <p class="the_text" style= "font-size: 1.5rem;  flex-wrap: wrap;">CCAMS Co-Curricular Activities Management System is all about engaging students/comrades during their free time.
                                Everyone has a talent or an ability and if not nartured it can die. Many campus students give up on this abilities and talents. The problem is that they are not aware that the activities they can engage in
                                are still available in campus. Most campuses engage in the traditional sense of posting on the notice boards which are rarely checked by students.
                                Through CCAMS one can join a group that offers an activity of their choice be it dance, coding, music, religion etc and this groups can post content on the platform for 
                                members to get it in first hand and fast. This way students engagement in beneficial activities will increase.  The app's primary goal is to bring people together through organized groups, offering spaces 
                                for meaningful interactions, event planning, and media sharing. <br><br> Users can either create new groups or join existing ones based on shared interests. Group creators become administrators, giving them the
                                ability to manage content and settings within the group. The app includes a calendar feature, where admins can add events with details like the title, date, and description. Group members can view upcoming
                                events and stay informed.CCAMS is designed with simplicity in mind, allowing users to navigate the app effortlessly. From searching and joining groups to viewing events and media, the platform is intuitive
                                and accessible to users of all skill levels.CCAMS is built to enhance social collaboration within groups, providing a safe and engaging environment for users to connect and grow together. Whether you're 
                                interested in hobbies, professional networking, or social causes, CCAMS helps you find your community and stay connected.
                            </p>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; font-size: 2rem; margin-bottom:2px; background-color: #FFBFFE; font-weight: bold;">Why CCAMS??</div>
                <div class="adv_CCAMS" style="display: flex; gap: 4em; justify-content: space-between; flex-wrap: wrap; background-color: #d1c6c6; margin-bottom: 40px; border-bottom: 2px solid black;">
                    <div class="adv">
                        <p style="font-size: 1.5rem; text-align: center; font-weight: bold; margin-top:0;">Fostering Community Engagement</p>
                        <p style="font-size: 1.5rem; text-align: center;"> CCAMS fosters a sense of community, allowing users to connect with like-minded individuals, engage in discussions, and participate in activities that align with their passions. The platform
                            is particularly effective for building social networks and strengthening relationships, whether for personal, professional, or recreational purposes.</p>
                    </div>
                    <div class="adv unique_adv" id="unique_adv">
                    <p style="font-size: 1.5rem; text-align: center; font-weight: bold; margin-top:0;"> Streamlined Event Management</p>
                    <p style="font-size: 1.5rem; text-align: center; margin-bottom: 0;"> CCAMS provides group admins with tools to easily manage events through its built-in calendar feature. This feature makes it particularly useful for groups that rely on regular meetups, workshops, 
                        or activities. Members no longer have to worry about missing important dates or updates as everything is displayed in a centralized location. <span class="read_more_text">This level of organization is a valuable asset for planning and coordinating group
                        activities, fostering active participation.</span>
                    </p>
                        <span class="read_more_button">Read More...</span>
                    </div>
                    <div class="adv">
                    <p style="font-size: 1.5rem; text-align: center; font-weight: bold; margin-top:0;">Simple and Intuitive User Experience</p>
                    <p style="font-size: 1.5rem; text-align: center;">Despite offering various advanced features, CCAMS maintains an easy-to-navigate interface, making it accessible to users without technical expertise. The app’s layout is designed to prioritize ease of
                        use, so even users unfamiliar with technology can join groups, view events, and interact with media effortlessly.</p>
                    </div>
                </div>
                <div class="founders_note_div">
                    <div class="actual_note" style="font-size: 1.5rem;">
                        I created this system because I'm a victim of the normal comrades life. 
                        Many a times when our classes would "bounce" as comrades we would be free and have nothing important
                        to do. 90% of the time we ended up wasting that time either on drugs, random games that didn't make sense.
                        There were activities that went on in school at that exact times when the class "bounced" but we weren't aware of them.
                        And  its not because the activities are not advertised, they were but it didn't reach a lot of comrades. Most of the time
                        they used notice boards which 90% of students don't read.
                        Another scenario is during my web development journey, i really struggled understanding the long lines of code
                        on my own. I knew there were better developers than me who could help but I didn't know a way of getting to them. This 
                        app will solve just that; activity groups will be able to get their adverts to a much larger audience and students can join those groups.
                        This way they'll make much better user of their time and create better value of themselves. Its only when classes 'bounce' but anytime and day the 
                        group will activities you'll be engaged. <b>Go ahead</b> and <b><a href="account creation page.php" style="color: black;">create an accout with us</a></b> to get more value off of yourself.
                    </div>
                    <div class="photo_of_founder" style= "display:flex; justify-content: center; ">
                        <img src="../Images used in project both design and actual web/photo with mic.jpg" style= "width: 100px; height: 100px;border-radius: 80%;" alt="image of founder">
                    </div>
                </div>
            </div>
         
        </main>
        <footer>
            <small class="copyright">&copy; 2024. Copyright by Co-Curricular Activity Management System</small>
        </footer>
    </div>
    <!-- JavaScript -->
    <script>
        const parentContainer = document.querySelector('.adv_CCAMS');
        parentContainer.addEventListener('click', event=>{
        const current = event.target;
        const isReadMoreBtn = current.className.includes('read_more_button');
        if(!isReadMoreBtn) return;
        const currentText = event.target.parentNode.querySelector('.read_more_text');
        currentText.classList.toggle('read_more_text--show');
        current.textContent = current.textContent.includes('Read More')?
        "Read Less..." : "Read More...";
        })
     </script>
</body>
</html>