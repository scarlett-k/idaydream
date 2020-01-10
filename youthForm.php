<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="styles/Youthstyle.css">
    <title>Welcome</title>
</head>
<body>
<div class="container">
    <?php
    //Include header.php for nav bars
    include "header.php";
    ?>
    <div class="card-header">
        <h1>Become a Dreamer</h1>
        <p>iD.A.Y. dream seeks to provide internships and opportunities for you to intentionally develop skills
            for the future. We strive to motivate and inspire our dreamers to become leaders in their communities.
            Through educational programming, one on one mentorship, and community engagement events, we make sure
            that all youth have the confidence to dream out loud.
        </p>
    </div>
    <form id="youth-form" action="youthConfirmation.php" method="post">
        <fieldset class="form-group">
            <!--Tell us about yourself-->
            <legend>Tell us about yourself!</legend>
            <div class="row">
                <!--row for first,middle and last name-->
                <div class="form-group col-sm-4">
                    <label for="firstName"> First Name<em>*</em> </label>
                    <input type="text" class="form-control general" name="firstName" id="firstName">
                    <span class="err" id="err-fname">
                     Please enter your first name</span>
                </div>
                <div class="form-group col-sm-2">
                    <label for="middleName"> Middle Name </label>
                    <input type="text" name="middleName" class="form-control float-right" id="middleName">
                </div>
                <div class="form-group col-sm-6">
                    <label for="lastName"> Last Name<em>*</em></label>
                    <input type="text" class="form-control float-right general" name="lastName" id="lastName">
                    <span class="err" id="err-lname">
                     <br> Please enter your last name</span>
                </div>
            </div>
            <!--row closed for first,middle and last name-->
            <div class="row">
                <!--row for email,phone, grad class-->
                <div class="form-group col-sm-4">
                    <!--email div-->
                    <label for="email"> Email<em>*</em></label>
                    <input type="email" class="form-control float-right" name="email" id="email">
                    <span class="err" id="err-email">
                     <br>Please enter an email
                     </span>
                </div>
                <!--email div closed-->
                <div class="form-group col-sm-4">
                    <!--phone div-->
                    <label for="phone"> Phone<em>*</em></label>
                    <input type="tel" class="form-control float-right " name="phone" id="phone">
                    <span class="err" id="err-phone"><br>Please enter a valid phone number</span>
                </div>
                <!--phone div closed-->
                <div class="form-group  col-sm-4 pr-3">
                    <!--grad class div-->
                    <label for="grad"> Graduating class of:<em>*</em></label>
                    <select class="form-control" id="grad" name="grad">
                        <option value='select' class="dropdown-item">Select</option>
                        <option value='2019' class="dropdown-item">2019</option>
                        <option value='2020' class="dropdown-item">2020</option>
                        <option value='2021' class="dropdown-item">2021</option>
                        <option value='2022' class="dropdown-item">2022</option>
                        <option value='2023' class="dropdown-item">2023</option>
                        <option value='2024' class="dropdown-item">2024</option>
                        <option value='2025' class="dropdown-item">2025</option>
                        <option value='2026' class="dropdown-item">2026</option>
                        <option value='2027' class="dropdown-item">2027</option>
                    </select>
                    <span class="err" id="err-grad">Required field
                     </span>
                </div>
                <!--grad class div closed-->
            </div>
            <!--row closed for email,phone, grad class-->
            <div class="row">
                <!--row for birthday and gender-->
                <div class="form-group  col-sm-3">
                    <!--div month-->
                    <label>Date of Birth:<em>*</em></label>
                    <select class="form-control dropdowns" id="month" name="month">
                        <option value='select' class="dropdown-item">Month</option>
                        <option value='1' class="dropdown-item">1</option>
                        <option value='2' class="dropdown-item">2</option>
                        <option value='3' class="dropdown-item">3</option>
                        <option value='4' class="dropdown-item">4</option>
                        <option value='5' class="dropdown-item">5</option>
                        <option value='6' class="dropdown-item">6</option>
                        <option value='7' class="dropdown-item">7</option>
                        <option value='8' class="dropdown-item">8</option>
                        <option value='9' class="dropdown-item">9</option>
                        <option value='10' class="dropdown-item">10</option>
                        <option value='11' class="dropdown-item">11</option>
                        <option value='12' class="dropdown-item">12</option>
                    </select>
                    <span class="err" id="err-month">Required field</span>
                </div>
                <!--div month closed-->
                <div class="form-group  col-sm-2">
                    <!--div day-->
                    <label> <br></label>
                    <select class="form-control dropdowns" id="day" name="day">
                        <option value='select' class="dropdown-item">Day</option>
                        <option value='1' class="dropdown-item">1</option>
                        <option value='2' class="dropdown-item">2</option>
                        <option value='3' class="dropdown-item">3</option>
                        <option value='4' class="dropdown-item">4</option>
                        <option value='5' class="dropdown-item">5</option>
                        <option value='6' class="dropdown-item">6</option>
                        <option value='7' class="dropdown-item">7</option>
                        <option value='8' class="dropdown-item">8</option>
                        <option value='9' class="dropdown-item">9</option>
                        <option value='10' class="dropdown-item">10</option>
                        <option value='11' class="dropdown-item">11</option>
                        <option value='12' class="dropdown-item">12</option>
                        <option value='13' class="dropdown-item">13</option>
                        <option value='14' class="dropdown-item">14</option>
                        <option value='15' class="dropdown-item">15</option>
                        <option value='16' class="dropdown-item">16</option>
                        <option value='17' class="dropdown-item">17</option>
                        <option value='18' class="dropdown-item">18</option>
                        <option value='19' class="dropdown-item">19</option>
                        <option value='20' class="dropdown-item">20</option>
                        <option value='21' class="dropdown-item">21</option>
                        <option value='22' class="dropdown-item">22</option>
                        <option value='23' class="dropdown-item">23</option>
                        <option value='24' class="dropdown-item">24</option>
                        <option value='25' class="dropdown-item">25</option>
                        <option value='26' class="dropdown-item">26</option>
                        <option value='27' class="dropdown-item">27</option>
                        <option value='28' class="dropdown-item">28</option>
                        <option value='29' class="dropdown-item">29</option>
                        <option value='30' class="dropdown-item">30</option>
                        <option value='31' class="dropdown-item">31</option>
                    </select>
                    <span class="err" id="err-day">Required field
                     </span>
                </div>
                <!--div day closed-->
                <div class="form-group  col-sm-3">
                    <!--year-->
                    <label><br></label>
                    <select class="form-control dropdowns" id="year" name="year">
                        <option value='select' class="dropdown-item">Year</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                    </select>
                    <span class="err" id="err-year">Required field
                     </span>
                </div>
                <!--year closed-->
                <div class="form-group  col-sm-4">
                    <!--Gender div-->
                    <label for="gender"> Gender<em>*</em></label>
                    <select class="form-control"
                            id="gender" name="gender">
                        <option value='select' class="dropdown-item">Select</option>
                        <option value='Female' class="dropdown-item">Female</option>
                        <option value='Male' class="dropdown-item">Male</option>
                        <option value='Other' class="dropdown-item">Other</option>
                        <option value='PreferNot' class="dropdown-item">Prefer not to say</option>
                    </select>
                    <span class="err" id="err-gender">
                     Required field</span>
                </div>
                <!--Gender div closed-->
                <div class="row ethnicity">
                    <!--row for ethnicity and college interest-->
                    <div class="form-group col-sm-6 container">
                        <!--Ethnicity-->
                        <label for="ethnicity"> Ethnicity<em>*</em></label>
                        <select class="form-control" id="ethnicity" name="ethnicity">
                            <option value="select" class="dropdown-item">Select Ethnicity</option>
                            <?php
                            require('/home/teamgrey/connect_idaydream.php');
                            //Populating ethnicity Options
                            $sql = 'SELECT * FROM `ethnicity`';
                            $result = mysqli_query($cnxn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ethnicity = $row['ethnicity_name'];
                                echo "<option value='$ethnicity'>$ethnicity</option>";
                            }
                            ?>
                        </select>
                        <div id="otherEthDiv" class="pt-1">
                            <label for="otherEth">Other Ethnicity</label>
                            <input id="otherEth" name="otherEth" class="col-lg" type="text">
                        </div>
                        <span class="err" id="err-ethnicity">
                        Required field</span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>College(s) of Interest </label>
                        <div class="row box pl-3 pr-3 pb-3">
                            <textarea id="interest" name='interest' rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <!--row closed for ethnicity and college interest-->
                <div class="form-group col-sm-6">
                    <label>Career aspirations </label>
                    <div class="row box pl-3 pr-2 pb-5">
                        <textarea id="career-asp" name="career-asp" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label>What is your favorite food/snack? </label>
                    <div class="row box pl-3 pr-3 pb-5">
                        <textarea id="fav-food" name="food" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <!--row closed for birthday and gender-->
            <div class="row">
                <div class="form-group col-sm-4 pt-5">
                    <label for="guardianName"> Parent/Guardian Name<em>*</em></label>
                    <input type="text" class="form-control float-right general" name="guardianName" id="guardianName">
                    <span class="err" id="err-guardianName">
                     <br>Required field
                     </span>
                </div>
                <div class="form-group col-sm-4 pt-5">
                    <label for="guardianPhone">Parent/Guardian Phone<em>*</em></label>
                    <input type="tel" class="form-control float-right" name="guardianPhone" id="guardianPhone">
                    <span class="err" id="err-guardianPhone"><br>Please enter a valid phone number</span>
                </div>
                <div class="form-group  col-sm-4 pr-3 pt-5">
                    <label for="guardianEmail">Parent/Guardian Email<em>*</em></label>
                    <input type="email" class="form-control float-right " name="guardianEmail" id="guardianEmail">
                    <span class="err" id="err-guardianEmail"><br>Please enter a valid email</span>
                </div>
            </div>
            <!--row closed for Career aspirations and What is your favorite food/snack?-->
            <div class="row px-3 pt-3">
                <button id="submit" type="submit" class="btn btn-primary active">Submit</button>
            </div>
        </fieldset>
        <!--Tell us about yourself-->
    </form>
</div>
<!--div Container closed-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="scripts/youthForm.js"></script>
</body>
</html>
