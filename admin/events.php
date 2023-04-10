<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'events';

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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / Events - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Events</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">Events</li>
          <li class="breadcrumb-item"><a href="newevent.php">Add New Event</a></li>
          <li class="breadcrumb-item"><a href="Archive.php">Archived</a></li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
      <?php foreach( $events as $row): ?>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ev-overview<?= $row['id'] ?>">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ev-edit<?= $row['id'] ?>">Edit</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ev-archive<?= $row['id'] ?>">Archive</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="ev-overview<?= $row['id'] ?>">
                <br>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label "><img class="img-fluid" src="../images/<?= $row['image'] ?>" alt=""></div>
                    <div class="col-lg-9 col-md-8">
                        <h3 class="mb-3"><?= $row['title'] ?></h3>
                        <p><?= nl2br($row['contents']) ?></p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="ev-edit<?= $row['id'] ?>">
                  <form action="methods/editevent.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img<?= $row['id'] ?>" src="../images/<?= $row['image'] ?>" alt="Profile">
                        <div class="pt-2">
                          <input type="file" name="e-image" onchange="c(event, 'img<?= $row['id'] ?>')" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control" id="fullName" value="<?= $row['title'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Contents</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="contents" class="form-control" id="about" style="height: 100px"><?= $row['contents'] ?></textarea>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade pt-3" id="ev-archive<?= $row['id'] ?>">
                  <form action="methods/movetoarchive.php" method="post">
                    <div class="alert alert-warning">
                        <strong>Do you want to move this event to archive and remove from displaying at the website?</strong> 
                    </div>
                      <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                      <button type="submit" class="btn btn-info">Move to Archive</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </section>
  </main>
  <?php include 'footer.php' ?>
  <script>
    const c = (event, id) => {
      const img = document.getElementById(id)
      img.src = URL.createObjectURL(event.target.files[0])+'#toolbar=0'
    }
  </script>
</body>
</html>