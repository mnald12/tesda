<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'training';

include 'connection.php';

$training = [];
$trainingsquerry = "SELECT * FROM training_centers Order By center";
$trainingresult = $conn->query($trainingsquerry);
while($row = $trainingresult->fetch_assoc()){
    $training[] = $row; 
}

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
          <li class="breadcrumb-item active">Training Center</li>
          <li class="breadcrumb-item"><a href="newtrainingcenter.php">Add Training Center</a></li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
      <?php foreach( $training as $row): ?>
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
                    <div class="col-lg-3 col-md-4 label ">Training Center</div>
                    <div class="col-lg-9 col-md-8"><?= $row['center'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Address</div>
                    <div class="col-lg-9 col-md-8"><?= $row['address'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $row['email'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Contact Number</div>
                    <div class="col-lg-9 col-md-8"><?= $row['contact_number'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Qualifications</div>
                    <div class="col-lg-9 col-md-8"><?= nl2br($row['qualifications']) ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="serv-edit<?= $row['id'] ?>">
                  <form action="methods/edittrainingcenter.php" method="post">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Training Center</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                        <input name="center" type="text" class="form-control" id="fullName" value="<?= $row['center'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="fullName" value="<?= $row['address'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="fullName" value="<?= $row['email'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="number" type="text" class="form-control" id="fullName" value="<?= $row['contact_number'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Qualifications</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="qualifications" class="form-control" id="about" style="height: 200px"><?= $row['qualifications'] ?></textarea>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade pt-3" id="serv-delete<?= $row['id'] ?>">
                  <form method="post" action="methods/deletetrainingcenter.php">
                    <div class="alert alert-warning">
                        <strong>Are you sure you want to delete this Training Center?</strong> 
                    </div>
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                      <button type="submit" class="btn btn-danger">Delete Training Center</button>
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