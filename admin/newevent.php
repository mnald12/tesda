<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'events';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / News & Event - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>News & Events</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item"><a href="events.php">News & Event</a></li>
          <li class="breadcrumb-item active">Add New</li>
          <li class="breadcrumb-item"><a href="archive.php">Archived</a></li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-2">
                <h3 class="card-title">Create News or Events</h3>
            <form action="methods/addevent.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                <label for="file" class="col-md-4 col-lg-3 col-form-label">Image</label>
                <div class="col-md-8 col-lg-9">
                    <input name="file" type="file" class="form-control" id="file" required>
                </div>
                </div>
                <div class="row mb-3">
                <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                <div class="col-md-8 col-lg-9">
                    <input name="title" type="text" class="form-control" id="title" required>
                </div>
                </div>
                <div class="row mb-3">
                <label for="content" class="col-md-4 col-lg-3 col-form-label">Contents</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="contents" class="form-control" id="content" style="height: 100px" required></textarea>
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