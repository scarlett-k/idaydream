<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//DB Credentials
require('/home/teamgrey/connect_idaydream.php');
//Getting all the information that user filled in form by filtering to avoid sql injection
$first = filter_var($_POST["firstName"]);
$last = filter_var($_POST["lastName"]);
$middle = filter_var($_POST["middleName"]);
$interest = filter_var($_POST['interest']); //IFSET
$careerasp = filter_var($_POST["career-asp"]);//IFSET
$food = filter_var($_POST["food"]);//fav food/snack IFSET
$email = filter_var($_POST["email"]);
$phone = filter_var($_POST["phone"]);
$month = filter_var($_POST["month"]);//birth month
$day = filter_var($_POST["day"]); //birth day
$year = filter_var($_POST["year"]);//birth year
$grad = filter_var($_POST["grad"]); //graduating class
$gender = filter_var($_POST["gender"]);
$ethnicity = filter_var($_POST["ethnicity"]);
$ethnicityOther = filter_var($_POST["otherEth"]);
$guardianName = filter_var($_POST["guardianName"]);
$guardianPhone = filter_var($_POST["guardianPhone"]);
$guardianEmail = filter_var($_POST["guardianEmail"]);
?>
<head>
    <!--start of summary-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Thank You!</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<!--<div class="container justify-content-lg-between">-->
<div class="container" id="style">
    <?php
    //include nav bar
    include "header.php";
    ?>
    <h1>Thank you for completing this application form and for your interest in volunteering with us.</h1>
    <h2> Summary of your form</h2>
    <?php
    //initialize flag
    $isValid = true;
    //check to see if first and last name are set if not block it form sending it to database
    if (isset($first) && isset($last)) {
        echo "<p> <strong>Name:</strong> $first $middle $last</p>";
    } else {
        echo "<p class='text-danger'><strong>Name:</strong> Error, first and last names are required.</p>";
        $isValid = false;
    }
    //if email is not valid block it from getting sent to database
    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p> <strong> Email: </strong>$email  </p>";
        } else {
            echo "<p class='text-danger'> <strong> Email: </strong>Error, email is required.</p>";
            $isValid = false;
        }
    }
    //if phone number is not valid block it from getting sent to database
    if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
        echo "<p> <strong> Phone:</strong>  $phone  </p>";
    } else {
        echo "<p class='text-danger'> <strong> Phone:</strong> Error, phone is required</p>";
        $isValid = false;
    }
    //check  for grad year
    if (isset($grad)) {
        if (empty($grad)) {
            echo "<p class='text-danger'> Enter a valid value.</p>";
            $isValid = false;
        } else if ($grad == "select") {
            echo "<p class='text-danger'> Enter a valid value.</p>";
            $isValid = false;
        } else {
            echo "<p> <strong> Graduating Year:</strong>  $grad </p>";
        }
    }
    //check for valid month
    if ((((int)$month) >= 1) && (((int)$month) <= 12)) {
        if ((((int)$day) >= 1) && (((int)$day) <= 31)) {
            if ((((int)$year) >= 1980) && (((int)$day) <= date("Y") - 12)) {
                echo "<p><strong>Date of birth: </strong> $month/$day/$year</p>";
            }
        } else {
            echo "<p class='text-danger'><strong>Date of birth: </strong> Error, enter a valid birthday</p>";
            $isValid = false;
        }
    } else {
        echo "<p class='text-danger'><strong>Date of birth: </strong> Error, enter a valid birthday</p>";
        $isValid = false;
    }
    //check for gender
    if (isset($gender)) {
        if ($gender == "select") {
            echo "<p class='text-danger'> <strong>Gender:</strong> Error, select a gender</p>";
            $isValid = false;
        } else if (empty($gender)) {
            echo "<p class='text-danger'> <strong>Gender:</strong> Error, select a valid gender</p>";
            $isValid = false;
        } else {
            echo "<p> <strong>Gender:</strong> $gender</p>";
        }
    }
    //check for ethnicity
    if (isset($ethnicity)) {
        if ($ethnicity == "select") {
            echo "<p class='text-danger'> <strong>Ethnicity:</strong> Error, select an ethnicity</p>";
            $isValid = false;
        }
        if ($ethnicity == "Other") {
            if (isset($ethnicityOther)) {
                echo "<p><strong>Ethnicity(Specified):</strong> $ethnicityOther</p>";
            } else {
                echo "<p class='text-danger'><strong>Ethnicity(Specified):</strong> Error, enter an ethnicity</p>";
                $isValid = false;
            }
        } else {
            echo "<p> <strong>Ethnicity:</strong> $ethnicity</p>";
        }
    }
    echo "<strong> College(s) of interest: </strong>";
    //check for college interest Optional
    if (!empty($_POST['interest'])) {
        echo "<p>$interest</p>";
    } else {
        echo "N/A";
    }
    echo "<strong> Career Aspirations: </strong>";
    //check for college aspirations
    if (isset($careerasp)) {
        echo "<p>$careerasp</p>";
    } else {
        echo "N/A";
    }
    //check for favorite food Optional
    echo "<strong> Favorite Food/Snacks: </strong>";
    if (!empty($food)) {
        echo "<p>$food</p>";
    } else {
        echo "N/A";
    }
    //Check for guardian info Required
    if (isset($guardianName)) {
        echo "<p> <strong>Parent/Guardian Name:</strong> $guardianName</p>";
    } else {
        echo "<p class='text-danger'><strong>Parent/Guardian Name:</strong> Error, name required.</p>";
        $isValid = false;
    }
    //guardian Phone
    if (preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $guardianPhone)) {
        echo "<p> <strong> Phone:</strong>  $guardianPhone  </p>";
    } else {
        echo "<p class='text-danger'> <strong> Parent/Guardian Phone:</strong> Error, parent/guardian phone is required</p>";
        $isValid = false;
    }
    //guardian email
    if (!empty($guardianEmail)) {
        if (filter_var($guardianEmail, FILTER_VALIDATE_EMAIL)) {
            echo "<p> <strong> Parent/Guardian Email: </strong>$guardianEmail  </p>";
        } else {
            echo "<p class='text-danger'> <strong> Parent/Guardian Email: </strong>Error, parent/guardian email is required.</p>";
            $isValid = false;
        }
    }
    //if the above informations are valid then insert the user typed data into database
    if ($isValid) {
        $sql = "INSERT INTO `dreamer` (`first_name`, `middle_name`, `last_name`, `email`, `phone`, `grad_year`,
                            `birthday`, `college_interest`, `career_aspiration`, `fav_food`, `ethnicity_id`, `ethnicity_other`,
                            `parent_name`, `parent_phone`, `parent_email`, `active`)
                     VALUES
                     ('$first', '$middle', '$last', '$email', $phone, $grad, (SELECT STR_TO_DATE('$day,$month,$year','%d,%m,%Y')),
                      '$interest', '$careerasp', '$food', 
                     (SELECT ethnicity.ethnicity_id FROM ethnicity 
                      WHERE ethnicity.ethnicity_name = '$ethnicity'), '$ethnicityOther', '$guardianName' ,
                      '$guardianPhone', '$guardianEmail', 2)";
        $result = mysqli_query($cnxn, $sql);
    }
    ?>
    <!--    When the dreamer filled the dreamer form an email will be sent to admin-->
    <?php
    $emails = "scarlettkimm@gmail.com";
    $email_body = "New Dreamer Summary--\r\n";
    $email_body .= "Name:  $first $middle $last\r\n";
    $email_body .= "Email:  $email\r\n";
    $email_body .= "Phone:  $phone\r\n";
    $email_body .= "Ethnicity: $ethnicity\r\n";
    if (isset($ethnicityOther)) {
        $email_body .= "Ethnicity Specified: $ethnicityOther";
    }
    $email_body .= "Gender:  $gender\r\n";
    $email_body .= "Graduating Year:  $grad\r\n";
    $email_body .= "Date of birth: $month/$day/$year\r\n";
    $email_body .= "College(s) of Interests:  $interest\r\n";
    $email_body .= "Career Aspirations:  $careerasp\r\n";
    $email_body .= "Favorite Foods/Snacks:  $food\r\n";

    $email_body .= "Parent/Guardian Name: $guardianName\r\n";
    $email_body .= "Parent/Guardian Phone: $guardianPhone\r\n";
    $email_body .= "Parent/Guardian Email: $guardianEmail\r\n";

    //------------------------------------------
    $email_subject = "New Dreamer";
    $to = $emails;
    $headers = "From: $emails\r\n";
    $headers .= "Reply-To: $emails \r\n";
    $success = mail($to, $email_subject, $email_body, $headers);


    //Print final confirmation
    $msg = $success ? "<p id='center'> <strong> Your form has been successfully submitted.</strong></p>"
        : "We're sorry. There was a problem with your form. Please call (333)222-1111.";
    echo "<p>$msg</p>";
    ?>
</div>
</body>
