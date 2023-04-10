<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'faq';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / F.A.Q - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>F.A.Q</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item"><a href="faq.php">F.A.Q</a></li>
          <li class="breadcrumb-item active">Add New F.A.Q</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-2">
                <h3 class="card-title">Add New F.A.Q</h3>
            <form action="methods/addfaq.php" method="post">
                <div class="row mb-3">
                <label for="title" class="col-md-4 col-lg-3 col-form-label">Question</label>
                <div class="col-md-8 col-lg-9">
                    <input name="qst" type="text" class="form-control" id="title">
                </div>
                </div>
                <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">Answer</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="ans" class="form-control" id="about" style="height: 100px"></textarea>
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