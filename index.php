<?php

session_start();

$_SESSION['nav-active'] = 'home';

include 'connection.php';

$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

$query2 = "SELECT * FROM tesda_about";
$result2 = $conn->query($query2);
$tabout = $result2->fetch_assoc();

$events = [];
$eventsquerry = "SELECT * FROM events Where status = 'Active' Order By id Desc";
$eventsresult = $conn->query($eventsquerry);
while($row = $eventsresult->fetch_assoc()){
    $events[] = $row; 
}

$announcements = [];
$announcementsquerry = "SELECT * FROM announcements Where status = 'Active'  Order By id Desc";
$announcementsresult = $conn->query($announcementsquerry);
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
    <title>Home</title>
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
      .event .title{
         font-size: 15px;
         padding-bottom: 5px;
         border-bottom: 1px solid rgba(0, 0, 0, 0.2);
      }
      .event .content{
         font-size: 13px;
         display: -webkit-box;
         -webkit-line-clamp: 5;
         -webkit-box-orient: vertical;
         overflow: hidden;
         padding: 0;
      }
      .event a{
         font-size: 13px;
         margin-bottom: 12px;
         margin-top: 0;
         padding-top: 0;
      }
    </style>
</head>
   <body>
   <input id="img-src" type="text" value="<?= $tinfo['image'] ?>" hidden> 
   <?php include 'components/navbar.php' ?>
      <section id="hero" class="d-flex align-items-center" style="height: auto !important">
         <div class="container">
            <div class="row gy-4 blur">
               <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                  <h1><?= $tinfo['title'] ?></h1>
                  <h2><?= $tinfo['description'] ?></h2>
              </div>
               <div class="col-lg-6 order-1 order-lg-2 hero-img">
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
                     <?php foreach($announcements as $row): ?>
                        <div class="post">
                           <div class="post-header">
                              <div class="avatar">
                                 <img src="images/<?= $row['avatar'] ?>" alt="">
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
                     <h2>Latest News & Events</h2>
                  </div>
                     <?php foreach($events as $row): ?>
                        <div class="event m-2 rounded-3 p-2">
                           <div class="row p-0">
                              <div class="col-lg-4 mb-2">
                              <img src="images/<?= $row['image'] ?>" class="img-fluid" />
                              </div>
                              <div class="col-lg-8 mb-2">
                                 <p class="title"><b><?= $row['title'] ?></b></p>
                                 <p class="content mb-1"><?= nl2br($row['contents']) ?></p>
                                 <a href="events.php#events<?= $row['id'] ?>">Read more</a>
                              </div>
                           </div>
                        </div>
                     <?php endforeach ?>
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
