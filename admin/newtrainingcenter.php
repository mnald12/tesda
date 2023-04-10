<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'training';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / Training Center - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Training Center</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item"><a href="training.php">Training Center</a></li>
          <li class="breadcrumb-item active">Add Training Center</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-2">
                <h3 class="card-title">Add Training Center</h3>
            <form action="methods/addtrainingcenter.php" method="post">
                <div class="row mb-3">
                <label for="center" class="col-md-4 col-lg-3 col-form-label">Training Center</label>
                <div class="col-md-8 col-lg-9">
                    <input name="center" type="text" class="form-control" id="center">
                </div>
                </div>
                <div class="row mb-3">
                <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="address">
                </div>
                </div>
                <div class="row mb-3">
                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                    <input name="email" type="text" class="form-control" id="email">
                </div>
                </div>
                <div class="row mb-3">
                <label for="number" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                <div class="col-md-8 col-lg-9">
                    <input name="number" type="text" class="form-control" id="number">
                </div>
                </div>
                <div class="row mb-3">
                <label for="qualifications" class="col-md-4 col-lg-3 col-form-label">Qualifications</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="qualifications" class="form-control" id="qualifications" style="height: 100px"></textarea>
                </div>
                </div>
                <div style="text-align: right;">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include 'footer.php' ?>
</body>
</html>