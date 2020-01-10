<?php
//   ini_set("display_errors", 1);
//   error_reporting(E_ALL);
   //These variables are used for Summary Page
   $first = $_POST["firstName"];
   $last = $_POST["lastName"];
   $middle = $_POST["middleName"];
   $address = $_POST["address"];
   $apt = $_POST["apt-num"];
   $city = $_POST['city'];
   $zip = $_POST["zip"];
   $state = $_POST["state"];
   $age = $_POST["age"];
   $email = $_POST["email"];
   $phone = $_POST["phone"];
   $size = $_POST["method"];
   $interests = $_POST['interests'];//interests is name of all options of interests
   $interest_text = $_POST['interesttext'];
   $availabilities = $_POST['availability'];
   $time = $_POST['time'];
   $userSkills = $_POST['skills'];
   $motivation = $_POST['motivation'];
   $heardAbtUs = $_POST["howyouhear"];
   $heard = $_POST["howYouheard"];
   $previousExp = $_POST['previousExp'];
   //Connecting to database Important!!!
   require("/home/teamgrey/connect_idaydream.php");
   ?>
<head>
   <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>Thank You!</title>
   <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   <div class="container" id="style">
      <?php
         //for nav bars
         include "header.php";
         ?>
      <h1>Thank you for completing this application form and for your interest in volunteering with us.</h1>
      <h2> Summary of your form</h2>
      <?php
         //flag
         $isValid = true;
         //If first and last name are empty block it form sending it ot database
         if (!empty($first) && (!empty($last))) {
             echo "<p> <strong>Name:</strong> $first $middle $last</p>";
         } else {
             echo "<p class='text-danger'><strong>Name:</strong> Error, first and last names are required.</p>";
             $isValid = false;
         }
         //If the address,city,zip and state are empty block it form sending to database
         if (!empty($address) && !empty($city) && !empty($zip) && isset($state)) {
             echo "<p> <strong>Address:</strong> $address $apt $city $zip $state</p>";
         } else {
             echo "<p class='text-danger'><strong>Address:</strong> A full valid address is required.</p>";
             $isValid = false;
         }
           //if age is more 3 digit block it form sending it to database
         if (isset($age) && strlen($age) <= 3 && strlen($age) > 0) {
             echo "<p><strong> Age: </strong> $age </p>";
         } else {
             echo "<p class='text-danger'><strong>Age:</strong> Error, age is required.</p>";
             $isValid = false;
         }
           //if email are not valid block it form being sent to database
         if (!empty($email)) {
             if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 echo "<p> <strong> Email: </strong>$email  </p>";
             } else {
                 echo "<p class='text-danger'> <strong> Email: </strong>Error, email is required.</p>";
                 $isValid = false;
             }
         }
         //if phone number is not valid block it form being sent ot database
         if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
             echo "<p> <strong> Phone:</strong>  $phone  </p>";
         } else {
             echo "<p class='text-danger'> <strong> Phone:</strong> Error, phone is required</p>";
             $isValid = false;
         }
          //check the valid size
         if (isset($size)) {
             echo "<p> <strong>T-shirt size:</strong> $size</p>";
         } else {
             echo "<p class='text-danger'> <strong>Shirt size:</strong> Error, select a size</p>";
             $isValid = false;
         }
           //check interest
         if (isset($interests)) {
             echo "<strong> Interest: </strong>";
             foreach ($interests as $interest) {
                 echo $interest . "  ";
             }
         } else {
             echo "<p class='text-danger'> <strong>Interest:</strong> Error, select an interest</p>";
             $isValid = false;
         }

         if (isset($_POST['interesttext'])) {
             echo $interest_text;
         }
         echo"<br>";
         echo"<br>";
            //check availability
         if (isset($availabilities) && (!empty($time))) {
             echo "<strong> Availability: </strong>";
             foreach ($availabilities as $availability) {
                 echo $availability . " ";
             }
             echo "(Available Time: $time)";
             echo "<br>";

         } else {
             echo "<p class='text-danger'> <strong>Availability:</strong> Error, select an availability</p>";
             $isValid = false;
         }

         echo "<br>";
          //check motivation
         if (!empty($motivation)) {
             echo "<strong>Volunteering Motivation:</strong> $motivation ";
             echo "<br>";

         } else {
             echo "<p class='text-danger'> <strong>Motivation:</strong> Error, motivation is required</p>";
             $isValid = false;
         }

         echo "<br>";
          //check skills
         if (!empty($userSkills)) {
             echo "<p><strong>Skills and qualifications:</strong>$userSkills</p>";
         } else {
             echo "<p class='text-danger'> <strong>Skills and qualifications::</strong> Error, skills and qualifications is required</p>";
             $isValid = false;
         }
         //OPTIONAL FIELD.
         if (!empty($_POST["previousExp"])) {
             $previousExp = $_POST["previousExp"];
             echo "<p><strong>Previous Volunteer Experience: </strong>$previousExp</p>";
         } else {
             echo "<p><strong>Previous Volunteer Experience: </strong> N/A</p>";
         }

          // How you heard about us
         if ($heardAbtUs != "N/A" && $heardAbtUs != "Other") {
             echo "<p><strong>How you heard about us:</strong>  $heardAbtUs</p>";
         } else if ($heardAbtUs == "N/A") {
             echo "<p class='text-danger'> <strong>How you heard about us:</strong> Error, how you heard about us is required</p>";
         }
         //how you heard about us is other then get the value typed by the user
         //save it in $heardAbtUs
         if ($heardAbtUs == "Other") {
             if (!empty($heard)) {
                 $heardAbtUs = $heard;
                 echo "<p><strong>How you heard about us:</strong> $heardAbtUs</p>";
             } else {
                 echo "<p class='text-danger'> <strong>How you heard about us:</strong> Error, how you heard about us is required</p>";
             }
         }
         echo "<br>";
         //REF 1 NAME-----------------------------------------------------------------------
         echo "<p> <strong>First Character Reference</strong></p>";
         $refName = $_POST["firstrefName"];
         if (!empty($refName)) {
             echo "<p> <strong>Name:</strong> $refName</p>";
         } else {
             echo "<p class='text-danger'><strong>Name:</strong> Error, reference name is required.</p>";
             $isValid = false;
         }

         $refphone = $_POST["firstrefPhn"];
         if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $refphone)) {
             echo "<p> <strong> Reference Phone:</strong>  $refphone  </p>";
         } else {
             echo "<p class='text-danger'> <strong> Reference Phone:</strong> Error, phone is required</p>";
             $isValid = false;
         }

         $refEmail = $_POST["firstrefemail"];
         if (!empty($refEmail)) {
             if (filter_var($refEmail, FILTER_VALIDATE_EMAIL)) {
                 echo "<p> <strong> Email: </strong>$refEmail  </p>";
             } else {
                 echo "<p class='text-danger'> <strong> Email: </strong>Error, email is required.</p>";
                 $isValid = false;
             }
         }

         $refRelationship = $_POST["firstrefrelation"];
         if (!empty($refRelationship)) {
             echo "<p> <strong>Relationship:</strong> $refRelationship</p>";
         } else {
             echo "<p class='text-danger'><strong>Relationship:</strong> Error, reference relationship is required.</p>";
             $isValid = false;
         }


         echo "<br>";
         //--REF 2----------------------------------------------------
         echo "<p> <strong>Second Character Reference</strong></p>";

         $refNameS = $_POST["secondrefName"];
         if (!empty($refNameS)) {
             echo "<p> <strong>Name:</strong> $refNameS</p>";
         } else {
             echo "<p class='text-danger'><strong>Name:</strong> Error, reference name is required.</p>";
             $isValid = false;
         }

         $refphoneS = $_POST["secondrefPhn"];

         if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $refphoneS)) {
             echo "<p> <strong> Reference Phone:</strong>  $refphoneS  </p>";
         } else {
             echo "<p class='text-danger'> <strong> Reference Phone:</strong> Error, phone is required</p>";
             $isValid = false;
         }

         $refEmailS = $_POST["secondrefemail"];
         if (!empty($refEmailS)) {
             if (filter_var($refEmailS, FILTER_VALIDATE_EMAIL)) {
                 echo "<p> <strong> Email: </strong>$refEmailS  </p>";
             }
         } else if (empty($refEmailS) || !filter_var($refEmailS, FILTER_VALIDATE_EMAIL)) {
             echo "<p class='text-danger'> <strong> Email: </strong>Error, email is required.</p>";
             $isValid = false;
         }

         $refRelationshipS = $_POST["secondrefrelation"];
         if (!empty($refRelationshipS)) {
             echo "<p> <strong>Relationship:</strong> $refRelationshipS</p>";
         } else {
             echo "<p class='text-danger'><strong>Relationship:</strong> Error, reference relationship is required.</p>";
             $isValid = false;
         }


         echo "<br>";
         //REF 3-----------------------------------------------------
         echo "<p> <strong>Third Character Reference</strong></p>";
         $refNameT = $_POST["thirdrefName"];

         if (!empty($refNameT)) {
             echo "<p> <strong>Name:</strong> $refNameT</p>";
         } else {
             echo "<p class='text-danger'><strong>Name:</strong> Error, reference name is required.</p>";
             $isValid = false;
         }

         $refphoneT = $_POST["thirdrefphn"];
         if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $refphoneT)) {
             echo "<p> <strong> Reference Phone:</strong>  $refphoneT  </p>";
         } else {
             echo "<p class='text-danger'> <strong> Reference Phone:</strong> Error, phone is required</p>";
             $isValid = false;
         }

         $refEmailT = $_POST['thirdrefemail'];
         if (!empty($refEmailT)) {
             if (filter_var($refEmailT, FILTER_VALIDATE_EMAIL)) {
                 echo "<p> <strong> Email: </strong>$refEmailT  </p>";
             }
         } else if (empty($refEmailT) || !filter_var($refEmailT, FILTER_VALIDATE_EMAIL)) {
             echo "<p class='text-danger'> <strong> Email: </strong>Error, email is required.</p>";
             $isValid = false;
         }
         $refRelationshipT = $_POST["thirdrefRelationship"];
         if (!empty($refRelationshipT)) {
             echo "<p> <strong>Relationship:</strong> $refRelationshipT</p>";
         } else {
             echo "<p class='text-danger'><strong>Relationship:</strong> Error, reference relationship is required.</p>";
             $isValid = false;
         }
         //making array of all the references
         $refrences = [[$refName, $refphone, $refEmail, $refRelationship],
                       [$refNameS, $refphoneS, $refEmailS, $refRelationshipS],
                       [$refNameT, $refphoneT, $refEmailT, $refRelationshipT]];

         echo "<br>";
         //0-> inactive
         //1-> active
         //2-> pending
         if ($isValid) {
             //if the fields values are valid store it in database updating the variables which were used to capture the user's data
             $sql = "INSERT INTO `volunteers` (`first`, `middle`, `last`, `age`, `email`, `phone`,
                                 `address`, `apt`, `zip`, `city`, `state`, `volunteer_exp`,
                                 `how_you_heard`, `motivation`, `tshirt`,`skills_qual`, `active`)
                     VALUES
                     ('$first', '$middle', '$last', '$age', '$email', '$phone','$address','$apt','$zip','$city','$state',
                     '$previousExp','$heardAbtUs','$motivation','$size','$userSkills', 2)";
             $result = mysqli_query($cnxn, $sql);//pass it to database to insert in the table
             $varStoreId = mysqli_insert_id($cnxn);// GET auto-generated id


             foreach ($interests as $interest) {//loop for the interest options
                 if ($interest == "Other Interest") {
                     $sql = "INSERT INTO volunteer_interests (`volunteer_id`, `interests_id`, `other_interests`)
                           VALUES 
                           ($varStoreId, (SELECT interests_id FROM interests WHERE interest_name = 'Other Interest'), ('$interest_text'))";
                 } else {
                     $sql = "INSERT INTO volunteer_interests (`volunteer_id`, `interests_id`)
                           VALUES 
                           ($varStoreId, (SELECT interests_id FROM interests WHERE interest_name = '$interest'))";
         //                echo '<h3>'.$sql.'</h3>';
                 }
                 mysqli_query($cnxn, $sql);
             }

             //use $varStoreId b/c mysqli_insert_id retrives the LAST insert statement executed.
             foreach ($availabilities as $availability) {//loop for the interest options
                 $sql = "INSERT INTO volunteer_availability (`volunteer_id`, `availability_id`, `availability_text`)
             VALUES
             ($varStoreId, (SELECT `availability_id` FROM `availability` WHERE availability_name = '$availability'), ('$time'))";
                 //                echo '<h3>'.$sql.'</h3>';
                 mysqli_query($cnxn, $sql);
             }

             //INSERT references
             foreach ($refrences as $refrence) {
                 $sql = "INSERT INTO `references` (`volunteer_id`, `name`,`phone`,`email`,`relationship`)
                         VALUES
                         ($varStoreId, '$refrence[0]', $refrence[1], '$refrence[2]', '$refrence[3]')";
                 mysqli_query($cnxn, $sql);
             }
         }
         ?>
      <?php
         $emails = "teamgreydel97@gmail.com";//This is  laxmi's email for just check will replace it later
         $email_body = "Volunteer Summary--\r\n";
         $email_body .= "Name:  $first $last\r\n";
         $email_body .= "Address:  $address $apt $city $zip $state\r\n";
         $email_body .= "Age:   $age\r\n";
         $email_body .= "Email:  $email\r\n";
         $email_body .= "Phone:  $phone\r\n";
         $email_body .= "T-shirt Size:  $size\r\n";
         $email_body .= "Hear about us:  $heardAbtUs $heard\r\n";
         $email_body .= "Skills and qualifications:   $userSkills\r\n";
         $email_body .= "Motivation:   $motivation\r\n";
         $email_body .= "Previous Volunteer Experience:   $previousExp\r\n";
         $email_body .= "Interest(s): ";
         foreach ($interests as $selected) {
             $email_body .= $selected . " ";
         }
         if (isset($interest_text)) {
             $email_body .= "$interest_text\r\n";
         }
         $email_body .= "Availability: ";
         foreach ($_POST['availability'] as $select) {
             $email_body .= $select . " ";
         }
         $email_body .= "Available time: $time\r\n";
         $email_body .= "First Character Reference \r\n";
         $email_body .= "Name: $refName\r\n";
         $email_body .= "Phone: $refphone\r\n";
         $email_body .= "Email: $refEmail\r\n";
         $email_body .= "Relationship: $refRelationship\r\n";

         $email_body .= "Second Character Reference \r\n";
         $email_body .= "Name: $refNameS\r\n";
         $email_body .= "Phone: $refphoneS\r\n";
         $email_body .= "Email: $refEmailS\r\n";
         $email_body .= "Relationship: $refRelationshipS\r\n";

         $email_body .= "Third Character Reference \r\n";
         $email_body .= "Name: $refNameT\r\n";
         $email_body .= "Phone: $refphoneT\r\n";
         $email_body .= "Email: $refEmailT\r\n";
         $email_body .= "Relationship: $refRelationshipT\r\n";

         $email_subject = "New Volunteer ";
         $to = $emails;
         $headers = "From: $emails\r\n";
         $headers .= "Reply-To: $emails \r\n";
         $success = mail($to, $email_subject, $email_body, $headers);
         //Print final confirmation
         $msg = $success ? "<p id='center'><strong> Your form has been successfully submitted.</strong></p>"
             : "We're sorry. There was a problem with your form. Please call (333)222-1111.";
         echo "<p>$msg</p>";
         ?>
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
</body>
</html>
