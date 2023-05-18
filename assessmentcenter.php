<?php

session_start();

$_SESSION['nav-active'] = 'dropdown2';

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

$trainingsquerry = "SELECT * FROM assessment_centers Where id = '$id' ";
$trainingresult = $conn->query($trainingsquerry);
$asessment = $trainingresult->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assessment Center</title>
    <?php include 'components/header.php' ?>
    <style>
        .logo{
        display: flex;
        gap: 10px;
        align-items: center;
        }
        .text-light a{
        color: blue !important;
        font-weight: large !important;
        text-shadow: 0 2px 2px black;
        }
        #hero{
        background-image: url(images/center.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        }
        #hero h1, #hero h2{
        color: white;
        text-shadow: 0 2px 2px black;
        }
      .post{
         width: 100%;
         height: auto;
         margin-bottom: 30px;
         padding-left: 20px;
         border-left: 1px solid blue;
         position: relative;
      }
      .post-header{
         width: 100%;
         height: auto;
         display: flex;
         align-items: center;
         gap: 10px;
         margin-bottom: 12px;
      }
      .post-header .avatar{
         width: 50px;
         height: 50px;
         border-radius: 50%;
      }
      .post-header .avatar img{
         width: 100%;
         height: 100%;
      }
      .post-header .name{
         padding: 0;
      }
      .post-header .name p{
         padding: 0;
         margin: 0;
      }
      .post-header .name p.center{
         font-weight: bolder;
         font-size: 22px;
      }
      .post-header .name p.center a{
         color: black !important;
      }
      .post-header .name p.center a:hover{
         opacity: 0.70;
      }
      .post-header .name p.date{
         font-size: 15px;
         transform: translateY(-2px);
      }
      .section-text{
        line-height: 16px;
        margin-left: 10px;
      }
    </style>
</head>
   <body>
   <?php include 'components/navbar.php' ?>
      <section id="hero" class="d-flex align-items-center" style="height: auto !important">
         <div class="container">
            <div class="row gy-4 blur">
               <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center">
                  <h1><?= $asessment['center'] ?></h1>
                  <h2>We are here to empower, make people and communities productive through excellent training programs and services.</h2>
                </div>
            </div>
         </div>
      </section>
      <main id="main">
         <div class="container">
            <div class="col-lg-12">
                <br>
                <br>
               <div class="row">
                  <div class="col-lg-8">
                    <div class="section-title">
                        <p>Qualifications</p>
                    </div>
                    <p class="section-text"><?= nl2br($asessment['qualifications']) ?></p>
                  </div>
                  <div class="col-lg-4">
                  <div class="section-title">
                        <p>Contact Information</p>
                    </div>
                    <p class="section-text"> <b>Address :</b> <i class="bi bi-geo-alt"></i> <?= nl2br($asessment['address']) ?></p>
                    <p class="section-text"> <b>Email :</b> <i class="bi bi-envelope"></i> <?= nl2br($asessment['email']) ?></p>
                    <p class="section-text"> <b>Phone :</b> <i class="bi bi-phone"></i> <?= nl2br($asessment['contact_number']) ?></p>
                    
                  </div>
               </div>
            </div>
         </div>
      </main>
      <?php include 'components/footer.php' ?>
   </body>
</html>
