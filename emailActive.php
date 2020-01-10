<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Active Members</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
        include "adminHeader.php";
    ?>
    <form id="form" method="post" action="emailConfimation.php">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-5 text-primary text-center">Email Active Members</h1>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">To</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="recipient">
                <option selected>Select Recipient</option>
                <option value="dreamers">Active Dreamers</option>
                <option value="volunteers">Active Volunteers</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Subject</span>
            </div>
            <input type="text" class="form-control" name="subject" placeholder="Ex. Summer Camp Opportunity" aria-label="Subject" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Message</span>
            </div>
            <textarea rows="5" class="form-control" name="message" aria-label="Message"></textarea>
        </div>
        <input class="btn btn-primary container-fluid" type="submit" value="Submit">
    </form>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/email.js"></script>
</body>
</html>
<!--Notes:
    Returns the previous inserts's primary key (aka @@identity)
    $ID = mysqli_insert_id($cnxn);
-->