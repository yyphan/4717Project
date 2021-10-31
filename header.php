<?php
session_start();
?>
<header>
    <div id="menubar">
        <a href="index.php">
            <img src="assets/dicon1.jpg" height="100" width="auto" style="float: left;">
        </a>

        <?php if (isset($_SESSION["user_name"])) {
        ?>
            <button class="button button1" onclick="window.location='logout.php'">Logout</button>
        <?php
        } else {
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
            <li><a href=<?php echo (isset($_SESSION["user_name"])) ? "booking.php" : "login.php"; ?>><strong>Booking</strong></a></li>
        </ul>
    </div>
</header>