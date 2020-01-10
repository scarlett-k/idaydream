<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    include "header.php";
    require("/home/teamgrey/connect_idaydream.php");
    ?>
    <form>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-5 text-primary text-center">Email Confirmation</h1>
            </div>
        </div>
        <?php
        //validation flag
        $isValid = true;

        //easy reference variables
        $recipient = $_POST['recipient'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (isset($recipient) AND ($recipient == "dreamers" OR $recipient == "volunteers")) {
            echo "<p><strong>Recipients:</strong> ".$recipient."</p>";
        } else {
            $isValid = false;
            echo "<p class='text-danger'>Please select a valid recipient</p>";
        }

        if (isset($subject) AND !empty($subject)) {
            echo "<p><strong>Subject:</strong> ".$subject."</p>";
        } else {
            $isValid = false;
            echo "<p class='text-danger'>Please enter a valid subject</p>";
        }

        if (isset($message) AND strlen(trim($message)) > 0) {
            echo "<p><strong>Message:</strong> ".$message."</p>";
        } else {
            $isValid = false;
            echo "<p class='text-danger'>Please enter a valid message</p>";
        }

        //Email code
        if ($isValid) {
            sendEmail($cnxn, $recipient, $subject, $message);
        }

        function sendEmail($cnxn, $recipient, $subject, $message) {
            if ($recipient == "dreamers") {
                $sql = 'SELECT `email` FROM dreamer WHERE `active` = 1';
            }
            else {
                $sql = 'SELECT `email` FROM volunteers WHERE `active` = 1';
            }

            $result = mysqli_query($cnxn, $sql);
            //                while ($row = mysqli_fetch_assoc($result)) {
            //                    $ethnicity = $row['ethnicity_name'];
            //                    echo "<option value='$ethnicity'>$ethnicity</option>";
            //                }

            $emailsSent = true;
            //fetch each row stored in $result
            while ($row = mysqli_fetch_assoc($result)) {
                if ($emailsSent) {
                    $email_body = $message;
                    $email_subject = $subject;
                    $headers = 'From: noreply@idaydream.com';
                    $success = mail($row['email'], $email_subject, $email_body, $headers);

                    $emailsSent = $success;
                } else {
                    // something went wrong
                    echo "<p>We're sorry. There was a problem with sending your message.</p>";
                    return;
                }
            }
            //print final confirmation
            echo "<h3>Your message has been successfully sent.</h3>";
        }
        ?>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<!--Notes:
   Returns the previous inserts's primary key (aka @@identity)
   $ID = mysqli_insert_id($cnxn);
   -->
