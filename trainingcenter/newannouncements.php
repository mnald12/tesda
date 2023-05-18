<?php
session_start();

if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
   header('location: ../trainingcenter/index.php');
}
$tcid = $_SESSION['tcid'];
$_SESSION['nav-actives'] = 'addannouncements';

include 'connection.php';

$query = "SELECT * FROM training_centers Where id = '$tcid' ";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

// $quals = explode("\n",$tinfo['qualifications']);
$quals = preg_split("/(\n\s\n){1,}|(\n){1,}|(\r\n){1,}/", $tinfo['qualifications'])

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
      <h1>Announcements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">Add Announcements</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body pt-2">
              <h3 class="card-title">Create Announcements</h3>
              <form action="methods/addannouncements.php" method="post" enctype="multipart/form-data">
                <input type="text" name="tcid" value="<?= $tinfo['id'] ?>" hidden>
                <input type="text" name="tc" value="<?= $tinfo['center'] ?>" hidden>
                <input type="text" name="avatar" value="<?= $tinfo['avatar'] ?>" hidden>
                <div class="row mb-3">
                <label for="file" class="col-md-4 col-lg-3 col-form-label">Image</label>
                <div class="col-md-8 col-lg-9">
                    <input name="file" type="file" class="form-control" id="file">
                </div>
                </div>
                <div class="row mb-3">
                <label for="title" class="col-md-4 col-lg-3 col-form-label">Qualification</label>
                <div class="col-md-8 col-lg-9">
                    <select name="qualification" class="form-select">
                        <?php foreach($quals as $row): ?>
                            <option value="<?= $row ?>"><?= $row ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                </div>
                <div class="row mb-3">
                <label for="title" class="col-md-4 col-lg-3 col-form-label">Scholarship</label>
                <div class="col-md-8 col-lg-9">
                    <select name="scholarship" class="form-select">
                      <option value="None">None</option>
                      <option value="TWSP">TWSP</option>
                      <option value="PESFA">PESFA</option>
                      <option value="TTSP">TTSP</option>
                      <option value="STEP">STEP</option>
                      <option value="RCSP">RCSP</option>
                      <option value="Others">Others</option>
                    </select>
                </div>
                </div>
                <div class="row mb-3">
                <label for="content" class="col-md-4 col-lg-3 col-form-label">Description</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="description" class="form-control" id="content" style="height: 160px"></textarea>
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