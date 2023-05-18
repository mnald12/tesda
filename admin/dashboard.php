<?php
   session_start();
   if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
      header('location: ../admin/index.php');
   }
   $_SESSION['nav-active'] = 'dashboard';
   include 'connection.php';
   $servicesquerry = "SELECT * FROM services";
   $servicesresult = $conn->query($servicesquerry);
   $services = $servicesresult->num_rows;
   $eventsquerry = "SELECT * FROM events";
   $eventsresult = $conn->query($eventsquerry);
   $events = $eventsresult->num_rows;
   $faqquery = "SELECT * FROM faq";
   $faqresult = $conn->query($faqquery);
   $faq = $faqresult->num_rows;
   $tariningquery = "SELECT * FROM training_centers";
   $trainingresult = $conn->query($tariningquery);
   $training = $trainingresult->num_rows;
   $assessmentquery = "SELECT * FROM assessment_centers";
   $assessmentresult = $conn->query($assessmentquery);
   $assessment = $assessmentresult->num_rows;
   $reqquery = "SELECT * FROM certificates";
   $reqresult = $conn->query($reqquery);
   $requirements = $reqresult->num_rows;
   $msgquery = "SELECT * FROM messages";
   $msgresult = $conn->query($msgquery);
   $messages = $msgresult->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>Dashboard - Tesda Admin</title>
      <?php include 'links.php' ?>
   </head>
   <body>
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
                     <div class="col-sm-4">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">Renewal</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-files"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $services ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Renewal Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="col-sm-4">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Events</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $events ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Events Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">F.A.Q</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-question-circle"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $faq ?></h6>
                                    <span class="text-muted small pt-2 ps-1">F.A.Q Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Recieved Requirements</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-files"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $requirements ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Recieved Requirements Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="col-sm-6">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">Messages</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-envelope"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $messages ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Messages Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">Training Center</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $training ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Training Centers Total</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="col-sm-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">Assesment Center</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                 </div>
                                 <div class="ps-3">
                                    <h6><?= $assessment ?></h6>
                                    <span class="text-muted small pt-2 ps-1">Assesment Centers Total</span>
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
