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
    <link rel="stylesheet" href="styles/style.css">
    <title>Volunteer Form</title>
</head>
<body>
<div class="container">
    <?php
    //include header.php for nav bars
    include "header.php";
    ?>
    <div class="card-header">
        <h1>Volunteer Form</h1>
        <p>Thank you for your interest in volunteering with iD.A.Y.dream. We're investing in an
            entire region of youth. Youth seeking success through higher education, mentoring....
        </p>
    </div>
    <form id="volunteer-form" action="confirmation.php" method="post">
        <!--        background check fieldset-->
        <fieldset class="form-group">
            <legend>Background Check</legend>
            <div class="form-check">
                <p>Due to our values as on organization and out of the safety of the youth we serve, it is a
                    requirement that a background check must be submitted.
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="backgroundCheckRadio" id="agreeRadio"
                           value="agree">
                    <label class="form-check-label" for="agreeRadio">
                        I agree to a background check
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="backgroundCheckRadio" id="disagreeRadio"
                           value="disagree">
                    <label class="form-check-label" for="disagreeRadio">
                        I don't agree to a background check
                    </label>
                </div>
            </div>
        </fieldset>
        <!--background fieldset closed-->
        <div id="agreeBgCheck">
            <!--general information fieldset-->
            <fieldset class="form-group">
                <legend>General Information</legend>
                <div class="row">
                    <!--row for first,middle,last name-->
                    <div class="form-group col-sm-4">
                        <label for="firstName"> First Name<em>*</em></label>
                        <input type="text" class="form-control general" name="firstName" id="firstName">
                        <span class="err" id="err-fname">
                        Please enter a first name</span>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="middleName"> Middle Name </label>
                        <input type="text" class="form-control float-right" name="middleName" id="middleName">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lastName"> Last Name<em>*</em></label>
                        <input type="text" class="form-control float-right general" name="lastName" id="lastName">
                        <span class="err" id="err-lname">
                        <br> Please enter a last name</span>
                    </div>
                </div>
                <!--row closed for first,middle,last name-->
                <div class="row">
                    <!--row for address apt zip-->
                    <div class="form-group col-sm-6">
                        <label for="address"> Address<em>*</em></label>
                        <input type="text" class="form-control float-right address" name="address" id="address">
                        <span class="err" id="err-address">
                        <br>Please enter an address
                        </span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="apt-num"> Apt # </label>
                        <input type="text" class="form-control float-right" name="apt-num" id="apt-num">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="zip"> Zip<em>*</em></label>
                        <input type="text" class="form-control float-right zip" name="zip" id="zip">
                        <span class="err" id="err-zip">
                        <br>Please enter a zipcode
                        </span>
                    </div>
                </div>
                <!--row closed for address apt zip-->
                <div class="row">
                    <!--row for state,city,age,email,phone-->
                    <div class="dropdown col-1">
                        <label for="state"> State </label> <br>
                        <select class="form-control mt-lg-1" name="state" id="state">
                            <option value="WA">WA</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="city"> City<em>*</em></label>
                        <input type="text" class="form-control float-right general" name="city" id="city">
                        <span class="err" id="err-city">
                        <br>Please enter a city
                        </span>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="age"> Age<em>*</em></label>
                        <input type="text" class="form-control float-right age" name="age" id="age">
                        <span class="err" id="err-age">
                        <br>Please enter your age
                        </span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="email">Email<em>*</em></label>
                        <input type="email" class="form-control float-right" name="email" id="email">
                        <span class="err" id="err-email">
                        <br>Please enter an email
                        </span>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="phone"> Phone <em>*</em></label>
                        <input type="tel" class="form-control float-right " placeholder="ex:1064350234" name="phone"
                               id="phone">
                        <span class="err" id="err-phone"><br>Please enter a valid phone number
                        </span>
                    </div>
                </div>
                <!--row closed for state,city,age,email,phone-->
            </fieldset>
            <!--general information fieldset closed-->
            <fieldset class="form-group">
                <!--addition info fieldset-->
                <legend>Additional Information</legend>
                <div class="row">
                    <!--row for t-shirt, Interests,Availability,How did you hear about us-->
                    <div class="col-lg-3 pt-0 pt-lg-0 pl-lg-5">
                        <!--T-shirt div-->
                        <label class="h4">T-Shirt (Unisex)<em>*</em></label>
                        <div id="shirt-sizes">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="xs" value="X-Small">
                                <label class="form-check-label" for="xs">
                                    X-Small
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="small"
                                       value="Small">
                                <label class="form-check-label" for="small">
                                    Small
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="medium"
                                       value="Medium">
                                <label class="form-check-label" for="medium">
                                    Medium
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="large"
                                       value="Large">
                                <label class="form-check-label" for="large">
                                    Large
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method" id="xlarge"
                                       value="X-large">
                                <label class="form-check-label" for="xlarge">
                                    X-Large
                                </label>
                            </div>
                            <span class="err" id="err-shirtsize">Please select a size</span>
                        </div>
                    </div>
                    <!--T-shirt div closed-->
                    <div class="col-lg-3 pt-4 pt-lg-0">
                        <!--interests div-->
                        <label class="h4">Interests<em>*</em></label>
                        <div id="programs">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Events" id="events"
                                       name="interests[]">
                                <label class="form-check-label" for="events">
                                    Events
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fundraising" id="fundraising"
                                       name="interests[]">
                                <label class="form-check-label" for="fundraising">
                                    Fundraising
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Newsletter" id="newsletter"
                                       name="interests[]">
                                <label class="form-check-label" for="newsletter">
                                    Newsletter
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Volunteer Coordination"
                                       id="coordination"
                                       name="interests[]">
                                <label class="form-check-label" for="coordination">
                                    Volunteer coordination
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mentoring" id="mentoring"
                                       name="interests[]">
                                <label class="form-check-label" for="mentoring">
                                    Mentoring
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Other Interest" id="otherInterest"
                                       name="interests[]">
                                <label class="form-check-label" for="otherInterest">
                                    Other
                                </label>
                            </div>
                            <div id="text-interest" class="form-check" style="display: none;">
                              <textarea placeholder="Any other interest please specify" class="form-control"
                                        name="interesttext"
                                        rows="3" cols="5">
                              </textarea>
                            </div>
                        </div>
                        <span class="err" id="err-interest">Please select at least one interest</span>
                    </div>
                    <!--interests div closed-->
                    <div class="col-lg-3 pt-4 pt-lg-0 pl-lg-5 ml-3 ml-lg-0">
                        <!--Availability div-->
                        <div class="row">
                            <label class="h4">Availability<em>*</em></label>
                        </div>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" name="availability[]" type="checkbox" value="Weekend"
                                       id="weekend-workshop-4h">
                                <label class="form-check-label" for="weekend-workshop-4h">
                                    Weekend
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" name="availability[]" type="checkbox" value="Weekday"
                                       id="weekday-workshop-4h">
                                <label class="form-check-label" for="weekday-workshop-4h">
                                    Weekday
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" name="availability[]" type="checkbox"
                                       value="One-week summer camp" id="summer-camp">
                                <label class="form-check-label" for="summer-camp">
                                    One-week summer camp
                                </label>
                            </div>
                        </div>
                        <div class="row pt-lg-2">
                            <div class="form-group">
                                <label for="availabilityTextBox">Availability Times:</label>
                                <textarea class="form-control" name="time" id="availabilityTextBox" rows="3"></textarea>
                                <span class="err" id="err-availability">This is a required field</span>
                            </div>
                        </div>
                    </div>
                    <!--Availability div closed-->
                    <!--this is dropdown menu for how you hear about us-->
                    <div class="col-lg-3 pt-4 pt-lg-0">
                        <!--How did you hear about us-->
                        <label class="h4">How did you hear about us</label>
                        <div>
                            <select class="form-control mt-lg-1" name="howyouhear" id="howyouhear">
                                <option value="N/A">Select</option>
                                <option value="Internet" class="options">Internet</option>
                                <option value="Local Ad" class="options">local ad</option>
                                <option value="Newspaper" class="options">Newspaper</option>
                                <option value="Other" id="choices">Other</option>
                            </select>
                            <div id="other-area">
                                <div class="pt-3">
                                 <textarea placeholder="How else did you hear about us? Please specify."
                                           class="form-control" id="other"
                                           name="howYouheard"
                                           rows="3" cols="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--how you hear-->
                </div>
                <!--row for additional info closed-->
            </fieldset>
            <!--additional fieldset closed-->
            <fieldset>
                <!--fieldset for skills,motivation,previous experience-->
                <div class="row">
                    <div class="col-lg-4">
                        <label class="h4 pl-4">Special Skills or Qualifications<em>*</em></label>
                        <div class="row text pl-5 pr-5">
                            <p>Summarize special skills and qualifications you have acquired from employment, previous
                                volunteer work, or through other activities.
                            </p>
                        </div>
                        <div class="row box pl-5 skillsText">
                            <textarea id="skills-qualities" name="skills" rows="3"></textarea>
                            <span class="err" id="err-skills">This section must be filled out
                           </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="h4 pl-4">Your Volunteering Motivation<em>*</em></label>
                        <div class="row text pl-5 pr-5">
                            <p> Summarize why you are interested in volunteering to be a part of iDayDream.</p>
                        </div>
                        <div class="row box pl-5">
                            <textarea id="motivation" name="motivation" rows="3"></textarea>
                            <span class="err" id="err-motivation">This section must be filled out
                           </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="h4 pl-4">Previous Volunteer Experience</label>
                        <div class="row text pl-5 pr-5">
                            <p>Summarize your previous volunteer experience.</p>
                            <br>
                        </div>
                        <div class="row box pl-5">
                            <textarea id="volunteer-exp" name="previousExp" rows="3"></textarea>
                            <span class="err">asdsadasdsadassaadasdadasdas
                           </span>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!--fieldset closed for skills,motivation,previous experience-->
            <fieldset class="form-group">
                <!--character references-->
                <legend>Character References</legend>
                <table class="table table-responsive-stack">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Relationship</th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    <tr class="row">
                        <td><input type="text" class="form-control general" placeholder="Name*" name="firstrefName"
                                   id="ref-name1">
                            <span class="err" id="err-refName1">Required field</span>
                        </td>
                        <td><input type="tel" class="form-control" placeholder="Phone*" name="firstrefPhn"
                                   id="ref-phone1">
                            <span class="err" id="err-refPhone1">Please enter a valid phone number</span>
                        </td>
                        <td><input type="email" class="form-control" placeholder="Email*" name="firstrefemail"
                                   id="ref-email1">
                            <span class="err" id="err-refEmail1">Please enter a valid phone number</span>
                        </td>
                        <td><input type="text" class="form-control general" placeholder="Relationship*"
                                   name="firstrefrelation" id="ref-relationship1">
                            <span class="err" id="err-refRel1">Required field</span>
                        </td>
                    </tr>
                    <tr class="row">
                        <td><input type="text" class="form-control general" placeholder="Name*" name="secondrefName"
                                   id="ref-name2">
                            <span class="err" id="err-refName2">Required field</span>
                        </td>
                        <td><input type="tel" class="form-control" placeholder="Phone*" name="secondrefPhn"
                                   id="ref-phone2">
                            <span class="err" id="err-refPhone2">Please enter a valid phone number</span>
                        <td><input type="email" class="form-control" placeholder="Email*" name="secondrefemail"
                                   id="ref-email2">
                            <span class="err" id="err-refEmail2">Please enter a valid email</span>
                        </td>
                        <td><input type="text" class="form-control general" placeholder="Relationship*"
                                   name="secondrefrelation" id="ref-relationship2">
                            <span class="err" id="err-refRel2">Required field</span>
                        </td>
                    </tr>
                    <tr class="row">
                        <td><input type="text" class="form-control general" placeholder="Name*" name="thirdrefName"
                                   id="ref-name3">
                            <span class="err" id="err-refName3">Required field</span>
                        </td>
                        <td><input type="tel" class="form-control" placeholder="Phone*" name="thirdrefphn"
                                   id="ref-phone3">
                            <span class="err" id="err-refPhone3">Please enter a valid phone number</span>
                        </td>
                        <td><input type="email" class="form-control" placeholder="Email*" name="thirdrefemail"
                                   id="ref-email3">
                            <span class="err" id="err-refEmail3">Please enter a valid phone number</span>
                        </td>
                        <td><input type="text" class="form-control general" placeholder="Relationship*"
                                   name="thirdrefRelationship" id="ref-relationship3">
                            <span class="err" id="err-refRel3">Required field</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button id="addrefrence" type="button" class="btn btn-outline-success">Add(+)</button>
            </fieldset>
            <!--closed character reference fieldset-->
            <fieldset class="form-group">
                <!--Policy-->
                <legend>Our Policy</legend>
                <p>It is the policy of this organization to provide equal opportunities without regard to race, color,
                    religion, national origin, gender, sexual preference, age, or disability.
                </p>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="policyCheckbox">
                    <label class="custom-control-label" for="policyCheckbox"> By clicking on the checkbox, I agree to
                        the policy statement above.</label>
                    <div>
                        <span class="err" id="err-policy">
                        Please agree our policy in order to submit the form</span>
                    </div>
                </div>
            </fieldset>
            <!--Policy closed-->
            <fieldset class="form-group">
                <!--Agreement-->
                <legend>Agreement and Signature</legend>
                <p>By submitting this application, I affirm that the facts set forth in it are true and complete. I
                    understand that if I am accepted as a volunteer, any false statements, omissions, or other
                    misrepresentations made by me on this application may result in my immediate dismissal.
                </p>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="mailList" checked>
                    <label class="custom-control-label" for="mailList">Please add me to the mailing list</label>
                </div>
                <div class="row px-3 pt-3">
                    <button id="submit" type="submit" class="btn btn-primary active">Submit</button>
                </div>
            </fieldset>
            <!--Agreement closed-->
        </div>
        <!--agreeBgCheck-->
    </form>
</div>
<!--main container closed-->
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
<script src="scripts/idaydream.js"></script>
</body>
</html>
