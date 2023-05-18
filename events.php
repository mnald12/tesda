
<?php

session_start();

$_SESSION['nav-active'] = 'home';

include 'connection.php';

$events = [];
$eventsquerry = "SELECT * FROM events Where status = 'Active' Order By id Desc";
$eventsresult = $conn->query($eventsquerry);
while($row = $eventsresult->fetch_assoc()){
    $events[] = $row; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & events</title>
    <?php include 'components/header.php' ?>
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <main id="main">
        <section id="events" class="events">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Events</h2>
                  <p>News & Events</p>
               </div>
               <?php foreach($events as $row): ?>
                  <div class="event m-2 rounded-3 p-2" id="events<?= $row['id'] ?>">
                     <div class="row p-0">
                        <div class="col-lg-4 mb-3">
                        <img src="images/<?= $row['image'] ?>" class="img-fluid" />
                        </div>
                        <div class="col-lg-8 mb-3">
                           <h3 class="title"><b><?= $row['title'] ?></b></h3>
                           <br>
                           <p class="content"><?= nl2br($row['contents']) ?></p>
                        </div>
                     </div>
                  </div>
               <?php endforeach ?>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php' ?>
</body>
</html>