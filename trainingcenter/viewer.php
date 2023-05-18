<?php
    session_start();
    if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
        header('location: ../trainingcenter/index.php');
    }
    $_SESSION['nav-actives'] = 'applications';

    include 'connection.php';

    $id = $conn->real_escape_string($_POST['id']);

    if(!$id){
        header('location: applications.php');
    }

    $tcid = $_SESSION['tcid'];

    $trainingsquerry = "SELECT * FROM training_centers Where id = '$tcid' ";
    $trainingresult = $conn->query($trainingsquerry);
    $training = $trainingresult->fetch_assoc();
    
    $appquerry = "SELECT * FROM applications Where id = '$id' ";
    $appresult = $conn->query($appquerry);
    $application = $appresult->fetch_assoc();

    $fn = $application['first_name'];
    $ln = $application['last_name'];

    $n = "$fn $ln";
    $q = $application['qualification'];

    $appmess = "Good day, $n. \n\nYour application for the TESDA training program has been acknowledged, and you are one of the candidates for a scholarship in $q. \n\nPlease visit our training center and bring the following requirements: \n\n(Requirements here)";
    $rejmess = "Good day, $n. \n\nWe are sorry to inform you that the slots for $q are already full. \n\nPlease apply again next time. Thank you!";

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>Application - Tesda Admin</title>
      <?php include 'links.php' ?>
      <style>.form-label{font-size: small; color: royalblue; font-weight: 600;}.br{width: 100%;height: 10px;}</style>
   </head>
   <body onload="set('<?= $application['status'] ?>')">
      <?php include 'header.php' ?>
      <?php include 'sidebar.php' ?>
      <main id="main" class="main">
         <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $_SESSION['message']; ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
         <?php endif ?>
         <div class="pagetitle">
            <h1>Application</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Review</li>
                  <li class="breadcrumb-item"><a href="applications.php">applications</a></li>
                  <li class="breadcrumb-item active">Preview</li>
               </ol>
            </nav>
         </div>

        <section class="section dashboard">
        <div class="row">
            <div class="col-xl-12">
                <div class="card info-card customers-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start"><h6>Action</h6></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#del">Delete</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                    <div class="br"></div>
                    <div class="br"></div>
                    <div class="br"></div>
                    <b>Name of Course/Qualification</b>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="parent_name" value="<?= $application['qualification'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Type of Scholarship Package</b>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="parent_name" value="<?= $application['scholar_type'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Name</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?= $application['last_name'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="<?= $application['first_name'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="<?= $application['middle_name'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Complete Permament Mailing Address</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Number, Street</label>
                            <input type="text" class="form-control" name="street" value="<?= $application['street'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Barangay</label>
                            <input type="text" class="form-control" name="brgy" value="<?= $application['barangay'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">District</label>
                            <input type="text" class="form-control" name="district" value="<?= $application['district'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">City/Municipality</label>
                            <input type="text" class="form-control" name="city" value="<?= $application['city'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Province</label>
                            <input type="text" class="form-control" name="province" value="<?= $application['province'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Region</label>
                            <input type="text" class="form-control" name="region" value="<?= $application['region'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email" value="<?= $application['email'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label"> Contact No.</label>
                            <input type="text" class="form-control" name="number" value="<?= $application['contact_number'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-control" name="nationality" value="<?= $application['nationality'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Personal Information</b>
                    <div class="row mt-2">
                        <div class="col-lg-2 mb-2">
                            <label class="form-label">Sex</label>
                            <input type="text" class="form-control" name="sex" value="<?= $application['sex'] ?>" disabled>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Civil Status</label>
                            <input type="text" class="form-control" name="civil" value="<?= $application['civil_status'] ?>" disabled>
                        </div>
                        <div class="col-lg-7 mb-2">
                            <label class="form-label">Employment Status (before the training)</label>
                            <input type="text" class="form-control" name="employment" value="<?= $application['employment_status'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Birthdate</b>
                    <div class="row mt-2">
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Month of Birth</label>
                            <input type="text" class="form-control" name="month_of_birth" value="<?= $application['month_of_birth'] ?>" disabled>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Day of Birth</label>
                            <input type="text" class="form-control" name="day_of_birth" value="<?= $application['day_of_birth'] ?>" disabled>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Year of Birth</label>
                            <input type="text" class="form-control" name="year_of_birth" value="<?= $application['year_of_birth'] ?>" disabled>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" value="<?= $application['age'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Birthplace</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">City/Municipality</label>
                            <input type="text" class="form-control" name="bplace_city" value="<?= $application['birthplace_city'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Province</label>
                            <input type="text" class="form-control" name="bplace_province" value="<?= $application['birthplace_province'] ?>" disabled>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Region</label>
                            <input type="text" class="form-control" name="bplace_region" value="<?= $application['birthplace_region'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Educational Attainment Before the training (trainee)</b>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="bplace_region" value="<?= $application['educational_attainment'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Parent/Guardian</b>
                    <div class="row mt-2">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="parent_name" value="<?= $application['parent_name'] ?>" disabled>
                        </div>
                        <div class="col-lg-8 mb-2">
                            <label class="form-label">Complete Permament Mailing Address</label>
                            <input type="text" class="form-control" name="parent_address" value="<?= $application['parent_address'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <b>Learner/Trainee/Student (Clients) Classification</b>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="parent_name" value="<?= $application['classification'] ?>" disabled>
                        </div>
                    </div>
                    <div class="br"></div>
                    <div class="br"></div>
                    <div style="text-align: left" class="pt-3">
                        <button data-bs-toggle="modal" data-bs-target="#approve" class="btn btn-success" id="abtn">Approve</button>
                        <button data-bs-toggle="modal" data-bs-target="#reject" class="btn btn-danger" id="rbtn">Reject</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
         
      </main>
      <!-- End #main -->
      <?php include 'footer.php' ?>

      <div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Approve application?</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="col-lg-12">
                    <form action="methods/approve.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $application['id'] ?>" hidden/>
                        <input type="text" name="tc" value="<?= $training['center'] ?>" hidden/>
                        <input type="text" name="name" value="<?= $application['first_name'] ?> <?= $application['last_name'] ?>" hidden/>
                        <input type="text" name="email" value="<?= $application['email'] ?>" hidden/>
                        <div class="row mb-3">
                            <label for="aptxt" class="col-md-4 col-lg-3 col-form-label">Message</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="msg" class="form-control" id="aptxt" style="height: 260px" required><?= $appmess ?></textarea>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: right">
                            <button class="btn btn-success" onclick="disable('apbtn', 'aptxt')" id="apbtn">
                                Approve and Send Message
                            </button>
                        </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Reject application?</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="col-lg-12">
                    <form action="methods/reject.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $application['id'] ?>" hidden/>
                        <input type="text" name="tc" value="<?= $training['center'] ?>" hidden/>
                        <input type="text" name="name" value="<?= $application['first_name'] ?> <?= $application['last_name'] ?>" hidden/>
                        <input type="text" name="email" value="<?= $application['email'] ?>" hidden/>
                        <div class="row mb-3">
                            <label for="rejtxt" class="col-md-4 col-lg-3 col-form-label">Message</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="msg" class="form-control" id="rejtxt" style="height: 250px" required><?= $rejmess ?></textarea>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: right">
                            <button class="btn btn-danger" onclick="disable('rejbtn', 'rejtxt')" id="rejbtn">
                                Reject and Send Message
                            </button>
                        </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

        <div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Delete application</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                    <form action="methods/deleteapplication.php" method="post">
                        <p class="modal-text">Would you really like to delete this application?</p>
                        <input type="text" name="id" value="<?= $application['id'] ?>" hidden/>
                        <div style="width: 100%; text-align: right">
                            <button class="btn btn-danger">
                                Delete application
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <script>
            let status
            const set = (status) => {
                console.log(status)
                if(status === 'Approved'){
                    document.getElementById('abtn').setAttribute("disabled", true)
                }
                if(status === 'Rejected'){
                    document.getElementById('rbtn').setAttribute("disabled", true)
                }
            }
            const disable = (id, txtarea) => {
                const ta = document.getElementById(txtarea)
                if(ta.value !== ''){
                    setTimeout(() => {
                        document.getElementById(id).setAttribute("disabled", true)
                    }, 500)
                }
            }
        </script>
   </body>
</html>
