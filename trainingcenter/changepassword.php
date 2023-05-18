
<?php 
session_start();
if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
  header('location: ../trainingcenter/index.php');
}

$_SESSION['nav-actives'] = 'changepwd';
$tcid = $_SESSION['tcid'];

include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Users / Info - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <?php if(isset($_SESSION['change-messages'])): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= $_SESSION['change-messages']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['change-messages']); ?>
    <?php endif ?>
    <div class="pagetitle">
      <h1>Training Center Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="card">
            <div class="card-body">
                <br>
                <form method="post" action="methods/changepwd.php">
                    <input type="text" name="id" value="<?= $tcid ?>" hidden>
                    <div class="row mb-3">
                      <label for="opwd" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="opwd" type="text" class="form-control" id="opwd" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="npwd" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="npwd" type="text" class="form-control" id="npwd" required>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-warning">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </main>
  <?php include 'footer.php' ?>
</body>
</html>