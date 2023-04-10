<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'services';

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
          <li class="breadcrumb-item"><a href="services.php">Services</a></li>
          <li class="breadcrumb-item active">Add New Services</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-2">
                <h3 class="card-title">Add New Service</h3>
            <form action="methods/addservice.php" method="post">
                <div class="row mb-3">
                <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                <div class="col-md-8 col-lg-9">
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                </div>
                <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">Requirements</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="req" class="form-control" id="about" style="height: 100px"></textarea>
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