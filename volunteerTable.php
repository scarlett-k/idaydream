<?php
/**
 * laxmi kandel
 * php for summary of information
 */
//ini_set("display_errors", 1);
//error_reporting(E_ALL);

//Connecting file to database is required!
require("/home/teamgrey/connect_idaydream.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summary of Volunteers</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
<!--body container-->
<div class="container">
    <?php
    include "adminHeader.php";
    ?>
    <h3 class="display-5 text-primary text-center">Summary of Volunteers</h3>
    <?php
    //Define the query Select form database the required columns
    $sql = 'SELECT volunteers.volunteer_id, volunteers.first, volunteers.middle, volunteers.last, volunteers.age, volunteers.email, volunteers.phone,
                               volunteers.address, volunteers.apt, volunteers.zip, volunteers.city,volunteers.state,volunteers.volunteer_exp,
                               volunteers.how_you_heard,volunteers.motivation,volunteers.tshirt,volunteers.skills_qual,volunteers.active
                    FROM volunteers';//notice what these query's output echo $sql;
    //pass the $sql and connection to the database and store the results in $result
    $result = mysqli_query($cnxn, $sql);// Store multiple rows //send the query to database IMPORTANT
    ?>
    <!---Table columns-->
    <table id="volunteer-table" class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Active</th>
            <th>First</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Apt</th>
            <th>Zip</th>
            <th>City</th>
            <th>State</th>
            <th>Volunteer Experience</th>
            <th>How you heard</th>
            <th>Motivation</th>
            <th>T-Shirt</th>
            <th>Skills and qualifications</th>
            <th>Interests</th>
            <th>Availabilities</th>
            <th>Reference 1</th>
            <th>Reference 2</th>
            <th>Reference 3</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //Print the results
        //fetch every single result and store it in $row we can have 100's of row so fetch one row at once
        while ($row = mysqli_fetch_assoc($result)) {
            //first,middle,last,age are the variable used to identify in database
            $id = $row['volunteer_id'];
            $fName = $row['first'];
            $mName = $row['middle'];
            $lName = $row['last'];
            $age = $row['age'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
            $apt = $row['apt'];
            $zip = $row['zip'];
            $city = $row['city'];
            $state = $row['state'];
            $volunteer_exp = $row['volunteer_exp'];
            $how_you_heard = $row['how_you_heard'];
            $motivation = $row['motivation'];
            $tshirt = $row['tshirt'];
            $skills_qual = $row['skills_qual'];
            $active = $row['active'];
            //status array with key and value paired
            $status = array(
                "0" => "Inactive",
                "1" => "Active",
                "2" => "Pending");
            $statusString = '';
            // 0->inactive
            // 1->active
            // 2->pending
            foreach ($status as $id2 => $name) {//key and value pair
                $sel = ($id2 == $active) ? "selected='selected'" : "";//condition
                $statusString .= "<option value='$id2' $sel>$name</option>";
            }
            //rest of required columns
            //for the references
            $sql = "SELECT *
                              FROM `references`
                              WHERE `volunteer_id` = $id";
            $refrences_result = mysqli_query($cnxn, $sql);
            //empty array for references
            $reference_array = array();
            while ($reference = mysqli_fetch_assoc($refrences_result)) {
                array_push($reference_array,
                    "<div class='dropdown'>
                                          <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                          Reference
                                          </button>
                                          <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                              <a class='dropdown-item' href='#'>Name: " . $reference['name'] . "</a>
                                              <a class='dropdown-item' href='#'>Phone: " . $reference['phone'] . "</a>
                                              <a class='dropdown-item' href='#'>Email: " . $reference['email'] . "</a>
                                              <a class='dropdown-item' href='#'>Relationship: " . $reference['relationship'] . "</a>
                                          </div>
                                      </div>");
            };
            //for Availability
            $sql = "SELECT * FROM `volunteer_availability` WHERE `volunteer_id` = $id";
            $availability_result = mysqli_query($cnxn, $sql);//pass the query
            $availability_array = array();//empty array to store the checked amiability
            $availability = "";//initialize $availability

            //fetch each availability result
            while ($availability1 = mysqli_fetch_assoc($availability_result)) {
                $sql = "SELECT availability_name FROM `availability` WHERE `availability_id`="
                    . $availability1['availability_id'];
                $availability_name = mysqli_query($cnxn, $sql);//multiple rows
                foreach ($availability_name as $availabilityname) {//loop through multiple rows
                    $temp_availability = implode(",", $availabilityname);
                    array_push($availability_array, $temp_availability);
                }
                $availability = implode(",\n ", $availability_array);
                array_push($availability_array, ($availability1['availability_text']));
            }


            //for the interests
            $sql = "SELECT * FROM `volunteer_interests`
                              WHERE `volunteer_id` = $id";//select all multiple rows
            $interests_result = mysqli_query($cnxn, $sql);
            $interests_array = array();//empty array
            while ($interest1 = mysqli_fetch_assoc($interests_result)) {
                $sql = "SELECT `interest_name` FROM `interests`
                                  WHERE `interests_id` =" . $interest1['interests_id'];//get the name of interests
                $interest_name = mysqli_query($cnxn, $sql);
                foreach ($interest_name as $name) {
                    $temp_name = implode(",", $name);
                    if ($temp_name === "Other Interest") {//for other interest
                        array_push($interests_array, ($interest1['other_interests']));
                    } else {
                        array_push($interests_array, $temp_name);
                    }
                }
            }
            $interest = implode(",\n", $interests_array);//implode all together
            //echo back elements for table display
            $createTable = "<tr>
                                  <td>$id</td>
                                  <td><select data-id='$id' class='status'>
                                  $statusString
                                  </select></td>
                                  <td>$fName</td>
                                  <td>$mName</td>
                                  <td>$lName</td>
                                  <td>$age</td>
                                  <td>$email</td>
                                  <td>$phone</td>
                                  <td>$address</td>
                                  <td>$apt</td>
                                  <td>$zip</td>
                                  <td>$city</td>
                                  <td>$state</td>
                                  <td>$volunteer_exp</td>
                                  <td>$how_you_heard</td>
                                  <td>$motivation</td>
                                  <td>$tshirt</td>
                                  <td>$skills_qual</td>
                                  <td>$interest</td>
                                  <td>$availability</td>";
            //display each reference
            foreach ($reference_array as $row) {
                $createTable .= ('<td>' . $row . '</td>');
            }
            echo $createTable;
        }
        ?>
        </tbody>
    </table>
    <a href="volunteerForm.php">Add a new Volunteer</a>
</div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $('#volunteer-table').DataTable({
        order: [0, 'desc'],//ordered the table as per the latest data
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
    //able to change out side of data model table
    $('.status').on('change', function () {
        var status = $(this).val();
        var id = $(this).attr('data-id');
        // alert("Status: " + status + ", id: " + id);

        //*** "SLIM" version of JQuery does not support ajax!
        $.post("updateVolunteerStatus.php", {status: status, id: id});
    });
    //able to change inside the data model table
    $(document).on( 'click', 'div.dtr-modal select', function () {
        $('.status').on('change', function () {
            var status = $(this).val();
            var id = $(this).attr('data-id');
            // alert("Status: " + status + ", id: " + id);

            //*** "SLIM" version of JQuery does not support ajax!
            $.post("updateVolunteerStatus.php", {status: status, id: id});
        });
    });
</script>
</body>
</html>
