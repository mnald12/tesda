<?php

session_start();

$_SESSION['nav-active'] = 'dropdown2';

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

if(!$id){
   header('location: index.php');
}

$trainingsquerry = "SELECT * FROM training_centers Where id = '$id' ";
$trainingresult = $conn->query($trainingsquerry);
$training = $trainingresult->fetch_assoc();

$announcements = [];
$announcementsquerry = "SELECT * FROM announcements Where tcid = '$id'  Order By id Desc";
$announcementsresult = $conn->query($announcementsquerry);
$total = $announcementsresult->num_rows;
while($row = $announcementsresult->fetch_assoc()){
    $announcements[] = $row; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Center</title>
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
         position: relative;
      }
      .post-header{
         width: 100%;
         height: auto;
         display: flex;
         align-items: center;
         gap: 10px;
         margin-bottom: 12px;
         border-bottom: 1px solid rgba(0, 0, 0, 0.2);
         padding-bottom: 12px;
      }
      .post-header .avatar{
         width: 40px;
         height: 40px;
         min-width: 40px;
         min-height: 40px;
         border-radius: 50%;
      }
      .post-header .avatar img{
         width: 100%;
         height: 100%;
         border-radius: 50%;
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
         font-size: 20px;
         display: -webkit-box;
         -webkit-line-clamp: 1;
         -webkit-box-orient: vertical;
         overflow: hidden;
      }
      .post-header .name p.center a{
         color: black !important;
      }
      .post-header .name p.center a:hover{
         opacity: 0.70;
      }
      .post-header .name p.date{
         font-size: 14px;
         transform: translateY(-2px);
      }
      .post .post-body p{
         font-size: 14px;
      }
      .section-text{
        line-height: 16px;
        margin-left: 10px;
      }
      .fb{
         overflow: hidden;
      }
    </style>
</head>
   <body>
   <input id="img-src" type="text" value="<?= $training['background'] ?>" hidden> 
   <?php include 'components/navbar.php' ?>
      <section id="hero" class="d-flex align-items-center" style="height: auto !important">
         <div class="container">
            <div class="row gy-4 blur">
               <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center">
                  <h1><?= $training['center'] ?></h1>
                  <h2><?= $training['description'] ?></h2>
                </div>
            </div>
         </div>
      </section>
      <main id="main">
         <div class="container">
            <div class="col-lg-12">
                <br>
                <br>
               <div class="row gap-5">
                  <div class="col-lg-7">
                     <?php if($total === 0): ?>
                        <h4>There are no current training programs available in our training institutions. Please wait for the announcement. Thank you!</h4>
                     <?php endif ?>
                     <?php foreach($announcements as $row): ?>
                        <div class="post">
                           <div class="post-header">
                              <div class="avatar">
                                 <img src="images/<?= $training['avatar'] ?>" alt="">
                              </div>
                              <div class="name">
                                 <p class="center"><a href="trainingcenter.php?id=<?= $row['tcid'] ?>"><?= $row['training_center'] ?></a></p>
                                 <p class="date"><?= $row['date'] ?></p>
                              </div>
                           </div>
                           <div class="post-body">
                              <p><?= nl2br($row['description']) ?></p>
                              <a class="apply" href="registration.php?tcid=<?= $row['tcid'] ?>&q=<?= $row['qualification'] ?>&ss=<?= $row['scholarship'] ?>">Click here to apply</a>
                              <?php if($row['image'] !== ''): ?>
                              <br>
                              <br>
                              <img src="images/<?= $row['image'] ?>" class="img-fluid" alt="">
                              <?php endif ?>
                           </div>
                        </div>
                     <?php endforeach ?>
                  </div>
                  <div class="col-lg-4">
                    <div class="section-title">
                        <p>Contact Information</p>
                    </div>
                    <p class="section-text"> <b>Address :</b> <i class="bi bi-geo-alt"></i> <?= nl2br($training['address']) ?></p>
                    <p class="section-text"> <b>Email :</b> <i class="bi bi-envelope"></i> <?= nl2br($training['email']) ?></p>
                    <p class="section-text"> <b>Phone :</b> <i class="bi bi-phone"></i> <?= nl2br($training['contact_number']) ?></p>
                    <p class="section-text fb"> <b>Facebook :</b> <i class="bi bi-facebook"></i> <a href="<?= $training['facebook'] ?>"><?= $training['facebook'] ? 'www.facebook.com' : '' ?></a></p>
                    <br>
                    <div class="section-title">
                        <p>Qualifications</p>
                    </div>
                    <p class="section-text"><?= nl2br($training['qualifications']) ?></p>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <?php include 'components/footer.php' ?>
      <script>
         const src = document.getElementById('img-src')
         const hero = document.getElementById('hero')
         hero.style.backgroundImage = 'url(images/' + src.value + ')'
      </script>
   </body>
</html>
