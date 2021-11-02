<?php
session_start();
?>
<header>
    <div id="menubar">
        <a href="index.php">
            <img src="assets/dicon1.jpg" height="100" width="auto" style="float: left;">
        </a>

        <?php if (isset($_SESSION["user_name"])) { // user is logged in, show logout and profile buttons
        ?>
            <button class="button button1" onclick="window.location='logout.php'">Logout</button>
            <button class="button button1" onclick="window.location='profile.php'">Profile</button>
        <?php
        } else { // user is not logged in, show login and register buttons
        ?>
            <button class="button button1" onclick="window.location='login.php'">Login</button>
            <button class="button button2" onclick="window.location='register.php'">Register</button>
        <?php
        }
        ?>

        <ul>
            <li><a href="index.php"><strong>Home</strong></a></li>
            <li><a href="dentists.php"><strong>Dentists</strong></a></li>
            <li><a href="Services.php"><strong>Our Services</strong></a></li>
            <li><a href="about.php"><strong>About Us</strong></a></li>
            <li><a href="contact.php"><strong>Contact Us</strong></a></li>
            <?php
                if (!isset($_SESSION["user_role"])) // user is not logged in, ask him to login if he clicks on booking button
                {
                    echo "<li><a href='login.php'><strong>Booking</strong></a></li>";
                }
                elseif ($_SESSION["user_role"] == "patient") // user is logged in and is a patient, show booking button
                {
                    echo "<li><a href='booking.php'><strong>Booking</strong></a></li>";
                }
                elseif ($_SESSION["user_role"] == "doctor") // user is logged in and is a doctor, show block timeslot button
                {
                    echo "<li><a href='block_time.php'><strong>Block</strong></a></li>";
                }
            ?>
        </ul>
    </div>
</header>