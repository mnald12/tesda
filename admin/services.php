<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'services';

include 'connection.php';

$services = [];
$servicesquerry = "SELECT * FROM services Order By id Desc";
$servicesresult = $conn->query($servicesquerry);
while($row = $servicesresult->fetch_assoc()){
    $services[] = $row; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / Services - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">Services</li>
          <li class="breadcrumb-item"><a href="newservice.php">Add New Service</a></li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
      <?php foreach( $services as $row): ?>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#serv-overview<?= $row['id'] ?>">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#serv-edit<?= $row['id'] ?>">Edit</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#serv-delete<?= $row['id'] ?>">Delete</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="serv-overview<?= $row['id'] ?>">
                <br>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Title</div>
                    <div class="col-lg-9 col-md-8"><?= $row['title'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Requirements</div>
                    <div class="col-lg-9 col-md-8"><?= nl2br($row['requirements']) ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="serv-edit<?= $row['id'] ?>">
                  <form action="methods/editservices.php" method="post">
                    <input name="id" type="text" value="<?= $row['id'] ?>" hidden>
                    <div class="row mb-3">
                      <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control" id="title" value="<?= $row['title'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="req" class="col-md-4 col-lg-3 col-form-label">Requirements</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="req" class="form-control" id="about" style="height: 100px"><?= $row['requirements'] ?></textarea>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade pt-3" id="serv-delete<?= $row['id'] ?>">
                  <form action="methods/deleteservice.php" method="post">
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                    <div class="alert alert-warning">
                        <strong>Are you sure you want to delete this service?</strong> 
                    </div>
                      <button type="submit" class="btn btn-danger">Delete Service</button>
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
</body>
</html>