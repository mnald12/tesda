
<?php

session_start();

include 'connection.php';

$tcid = mysqli_real_escape_string($conn, $_GET['tcid']);
$q = mysqli_real_escape_string($conn, $_GET['q']);
$ss = mysqli_real_escape_string($conn, $_GET['ss']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <?php include 'components/header.php' ?>
    <style>
        .privacy{
            display: flex;
            align-items: start;
            gap: 10px;
            padding: 10px;
        }
        .br {
            width: 100%;
            height: 10px;
        }
        .text-right{
            text-align: right;
            margin-top: 10px;
        } 
    </style>
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <main id="main">
        <section id="verify" class="verify">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Registration</h2>
                </div>
                <?php if(isset($_SESSION['app-message'])): ?>
                    <div class="m-4 alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['app-message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['app-message']); ?>
                <?php endif ?>
                <form class="form-controls shadow p-3 rounded" action="saveapplication.php" method="post">
                    <input type="text" name="tcid" value="<?= $tcid ?>" hidden>
                    <input type="text" name="q" value="<?= $q ?>" hidden>
                    <input type="text" name="ss" value="<?= $ss ?>" hidden>
                    <h3 class="text-center">Registration Form</h3>
                    <hr>
                    <b>Name of Course/Qualification</b>
                    <div class="row mt-2">
                        <div class="col-lg-12 mb-2">
                            <input type="text" class="form-control" value="<?= $q ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Scholarship Package</b>
                    <div class="row mt-2">
                        <div class="col-lg-12 mb-2">
                            <input type="text" class="form-control" value="<?= $ss ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Name</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name, Extension Name (Jr., Sr.)" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="first_name" placeholder="First" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="middle_name" placeholder="Middle" required>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Complete Permament Mailing Address</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="street" placeholder="Number, Street" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="brgy" placeholder="Barangay" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="district" placeholder="District" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="city" placeholder="City/Municipality" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="province" placeholder="Province" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="region" placeholder="Region" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="number" placeholder="Contact No." required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="nationality" placeholder="Nationality" required>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Personal Information</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Sex</label>
                            <select name="sex" class="form-select" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Civil Status</label>
                            <select name="civil" class="form-select" required>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow/er">Widow/er</option>
                                <option value="Separated">Separated</option>
                                <option value="Solo Parent">Solo Parent</option>
                            </select>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Employment Status (before the training)</label>
                            <select name="employment_status" class="form-select" required>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                            </select>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Birthdate</b>
                    <div class="row mt-2">
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Month of Birth</label>
                            <select name="month_of_birth" class="form-select">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Day of Birth</label>
                            <select name="day_of_birth" class="form-select">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Year of Birth</label>
                            <input type="text" class="form-control" name="year_of_birth" required>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" required>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Birthplace</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="bplace_city" placeholder="City/Municipality" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="bplace_province" placeholder="Province" required>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="bplace_region" placeholder="Region" required>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Educational Attainment Before the training (trainee)</b>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <select name="attainment" class="form-select">
                                <option value="No Grade Completed">No Grade Completed</option>
                                <option value="Elementary Undergraduate">Elementary Undergraduate</option>
                                <option value="Elementary Graduate">Elementary Graduate</option>
                                <option value="Pre-school (Nursery/Kinder/Prep)">Pre-school (Nursery/Kinder/Prep)</option>
                                <option value="Post Secondary Undergraduate">Post Secondary Undergraduate</option>
                                <option value="Post Secondary Graduate">Post Secondary Graduate</option>
                                <option value="High School Undergraduate">High School Undergraduate</option>
                                <option value="High School Graduate">High School Graduate</option>
                                <option value="Junior High Graduate">Junior High Graduate</option>
                                <option value="Senior High Graduate">Senior High Graduate</option>
                                <option value="College Undergraduate">College Undergraduate</option>
                                <option value="College Graduate or higher">College Graduate or higher</option>
                            </select>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Parent/Guardian</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" name="parent_name" placeholder="Name" required>
                        </div>
                        <div class="col-lg-8 mb-2">
                            <input type="text" class="form-control" name="parent_address" placeholder="Complete Permament Mailing Address" required>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Learner/Trainee/Student (Clients) Classification</b>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <select name="classification" class="form-select">
                                <option value="4ps Beneficiary">4ps Beneficiary</option>
                                <option value="Displaced Workers">Displaced Workers</option>
                                <option value="Family Member of AFP and PNP Wounded in-Action">Family Member of AFP and PNP Wounded in-Action</option>
                                <option value="Industry Workers">Industry Workers</option>
                                <option value="Out-of-School-Youth">Out-of-School-Youth</option>
                                <option value="Rebel Returnees/Dicommissioned Combatants">Rebel Returnees/Dicommissioned Combatants</option>
                                <option value="Tesda Alumni">Tesda Alumni</option>
                                <option value="Victim of Natural Disaster and Calamities">Victim of Natural Disaster and Calamities</option>
                                <option value="Agrarian Reform Beneficiary">Agrarian Reform Beneficiary</option>
                                <option value="Drug Dependents Surrenderees/Surrenderers">Drug Dependents Surrenderees/Surrenderers</option>
                                <option value="Farmers and Fishermen">Farmers and Fishermen</option>
                                <option value="Inmates and Detainees">Inmates and Detainees</option>
                                <option value="Overseas Filipino Workers (OFW) Dependents">Overseas Filipino Workers (OFW) Dependents</option>
                                <option value="Returning/Repatrieted Overseas Filipino Workers (OFW)">Returning/Repatrieted Overseas Filipino Workers (OFW)</option>
                                <option value="TVET Trainers">TVET Trainers</option>
                                <option value="Wounded-in-Action AFP & PNP Personel">Wounded-in-Action AFP & PNP Personel</option>
                                <option value="Balik Probinsya">Balik Probinsya</option>
                                <option value="Family Members of AFP and PNP Killed-in-Action">Family Members of AFP and PNP Killed-in-Action</option>
                                <option value="Indigenous People & Cultural Communities">Indigenous People & Cultural Communities</option>
                                <option value="MILF Beneficiary">MILF Beneficiary</option>
                                <option value="RCEF-RESP">RCEF-RESP</option>
                                <option value="Student">Student</option>
                                <option value="Uniformed Personal">Uniformed Personal</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="br"></div>
                    <div class="privacy"><div><input id="privacy" type="checkbox"></div><label for="privacy">I hereby allow TESDA to use/post my contact details, name, email, cellphone/landline nos. and other information I provided which may be used for processing of my scholarship application, for employment opportunities and for the survey of TESDA programs.</label></div>
                    <div class="text-right">
                        <button class="btn btn-primary" id="btn" disabled>Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php' ?>
    <script>
        const btn = document.getElementById('btn')
        const privacy = document.getElementById('privacy')

        privacy.addEventListener('click', () => {
            if(privacy.checked) btn.disabled = false
            else btn.disabled = true
        })
    </script>
</body>
</html>