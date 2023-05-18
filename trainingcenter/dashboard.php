<?php
   session_start();
   if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
      header('location: ../trainingcenter/index.php');
   }
   $_SESSION['nav-actives'] = 'dashboard';
   $tcid = $_SESSION['tcid'];
   include 'connection.php';
   $announcementsquerry = "SELECT * FROM announcements where tcid = '$tcid' ";
   $announcementsresult = $conn->query($announcementsquerry);
   $announcements = $announcementsresult->num_rows;
   $applicationsquerry = "SELECT * FROM applications where tcid = '$tcid' ";
   $applicationsresult = $conn->query($applicationsquerry);
   $applications = $applicationsresult->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>Dashboard - Tesda Training Center</title>
      <?php include 'links.php' ?>
   </head>
   <body>
      <?php include 'header.php' ?>
      <?php include 'sidebar.php' ?>
      <main id="main" class="main">
         <?php if(isset($_SESSION['tmessage'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $_SESSION['tmessage']; ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['tmessage']); ?>
         <?php endif ?>
         <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </nav>
         </div>
         <section class="section dashboard">
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">Applications</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-files"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $applications ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Applications Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="col-sm-12">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Announcements</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $announcements ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Announcements Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>
      <?php include 'footer.php' ?>
   </body>
</html>
