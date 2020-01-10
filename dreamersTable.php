<?php
/** Reads all dreamers form database into table
 *  Nov 8, 2019
 */
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//REQUIRED CONNECTION TO DATABASE
require("/home/teamgrey/connect_idaydream.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dreamers Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
<div class="container">
    <?php
    //include admin header file
    include "adminHeader.php";
    ?>
    <h3 class="display-5 text-primary text-center">Dreamers Information Table</h3>
    <?php
    //Define the query
    $sql = 'SELECT `dreamer_id`, `active`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `grad_year`,
                               `birthday`, `college_interest`, `career_aspiration`, `fav_food`, 
                               (SELECT ethnicity.ethnicity_name FROM ethnicity 
                               WHERE ethnicity.ethnicity_id = dreamer.ethnicity_id) as `ethnicity_name`, `ethnicity_other`, `parent_name`, `parent_phone`, `parent_email`
                    FROM dreamer
                    INNER JOIN ethnicity ON dreamer.ethnicity_id = ethnicity.ethnicity_id';
    //    echo "<h3>$sql</h3>";
    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //    var_dump($result);
    ?>
    <!--table to display after admin login-->
    <table id="dreamer-table" class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>First</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Active</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Grad Year</th>
            <th>Birthday</th>
            <th>College of Interest</th>
            <th>Career Aspiration</th>
            <th>Favorite Food</th>
            <th>Ethnicity</th>
            <th>Ethnicity(Specified)</th>
            <th>Guardian Name</th>
            <th>Guardian Phone</th>
            <th>Guardian Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['dreamer_id'];
            $active = $row['active'];
            $fName = $row['first_name'];
            $mName = $row['middle_name'];
            $lName = $row['last_name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gradY = $row['grad_year'];
            $birthday = $row['birthday'];
            $college = $row['college_interest'];
            $career = $row['career_aspiration'];
            $food = $row['fav_food'];
            $ethnicityName = $row['ethnicity_name'];
            $ethnicityOther = $row['ethnicity_other'];
            $guardianName = $row['parent_name'];
            $guardianPhone = $row['parent_phone'];
            $guardianEmail = $row['parent_email'];
            //Array for status pair of key and value
            $status = array(
                "0" => "Inactive",
                "1" => "Active",
                "2" => "Pending");
            $statusString = '';
            // 0->inactive
            // 1->active
            // 2->pending
            foreach ($status as $id2 => $name) {//id2 key and $name is value
                $sel = ($id2 == $active) ? "selected='selected'" : "";//condition
                $statusString .= "<option value='$id2' $sel>$name</option>";
            }
            echo "<tr>
                                  <td>$fName</td>
                                  <td>$mName</td>
                                  <td>$lName</td>
                                  <td>
                                      <select data-id='$id' class='status'>
                                          $statusString
                                      </select>
                                  </td>
                                  <td>$email</td>
                                  <td>$phone</td>
                                  <td>$gradY</td>
                                  <td>$birthday</td>
                                  <td>$college</td>
                                  <td>$career</td>
                                  <td>$food</td>
                                  <td>$ethnicityName</td>
                                  <td>$ethnicityOther</td>
                                  <td>$guardianName</td>
                                  <td>$guardianPhone</td>
                                  <td>$guardianEmail</td>
                            </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="youthForm.php">Add a new dreamer</a>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $('#dreamer-table').DataTable({
        order: [1, 'desc'],//ordered the table as per the latest data
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
    //able to change out side of data table model
    $('.status').on('change', function () {
        var status = $(this).val();
        var id = $(this).attr('data-id');
        // alert("Status: " + status + ", id: " + id);

        //*** "SLIM" version of JQuery does not support ajax!
        $.post("updateDreamerStatus.php", {status: status, id: id});
    });
    //about to change inside the data table model
    $(document).on( 'click', 'div.dtr-modal select', function () {
        $('.status').on('change', function () {
            var status = $(this).val();
            var id = $(this).attr('data-id');
            // alert("Status: " + status + ", id: " + id);
            //*** "SLIM" version of JQuery does not support ajax!
            $.post("updateDreamerStatus.php", {status: status, id: id});
        });
    } );
</script>
</body>
</html>
