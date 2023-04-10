<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Users / Profile - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>

<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif ?>
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="../images/<?= $uinfo['avatar'] ?>" alt="Profile" class="rounded-circle">
              <h2><?= $uinfo['name'] ?></h2>
              <h3><?= $uinfo['position'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?= $uinfo['name'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Position</div>
                    <div class="col-lg-9 col-md-8"><?= $uinfo['position'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?= $uinfo['address'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?= $uinfo['number'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $uinfo['email'] ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <form method="post" action="methods/editprofile.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img" src="../images/<?= $uinfo['avatar'] ?>" alt="Profile">
                        <div class="pt-2">
                          <input id="profileImage" type="file" onchange="c(event)" name="profileImage" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $uinfo['name'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="position" type="text" class="form-control" id="position" value="<?= $uinfo['position'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?= $uinfo['address'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?= $uinfo['number'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?= $uinfo['email'] ?>" required>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <form method="post" action="methods/changepass.php" >
                    <div class="row mb-3">
                      <label for="uname" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="uname" type="text" class="form-control" id="uname" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="pwd" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pwd" type="password" class="form-control" id="pwd" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="npwd" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="npwd" type="password" class="form-control" id="npwd" required>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include 'footer.php' ?>
  <script>
    const c = (event) => {
      const img = document.getElementById('img');
      img.src = URL.createObjectURL(event.target.files[0])+'#toolbar=0';
    }
  </script>
</body>
</html>