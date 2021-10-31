<html lang="en">

<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/booking.css">
</head>

<body>
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div class="booking">
            <form method="post" action="show_post.php">

                <h4><strong>Welcome, </strong></h4>

                <h4><strong>I would like to book an appointment with Dr

                        <label for="Dr"></label>

                        <select name="Dr" id="dr">
                            <option value="bot">Bender Bot</option>
                            <option value="gold">Goldman Bot</option>
                        </select>
                    </strong></h4>
                <br>
                <div class="select">

                    <label for="Date">Date:</label>
                    <input type="date" name="date" id="date">
                    <input type="time" id="appt" name="appt" step="3600" min="09:00" max="18:00" required>
                    <small>Office hours are 9am to 6pm</small>
                    <input id="bookings" type="submit" value="Book now!">

            </form>
        </div>
    </div>
    <footer>
        Copyright &copy; 2021 M&Y Dental
        <br>
        <a href="mailto:MYDental@dental.com">MYDental@dental.com</a>
    </footer>
    </div>
</body>

</html>