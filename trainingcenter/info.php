
<?php 
session_start();
if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
  header('location: ../trainingcenter/index.php');
}

$_SESSION['nav-actives'] = 'info';
$tcid = $_SESSION['tcid'];

include 'connection.php';

$query = "SELECT * FROM training_centers Where id = '$tcid' ";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

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
    <div class="pagetitle">
      <h1>Training Center Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">Info</li>
        </ol>
      </nav>
    </div>
    <section class="section profile">
      <div class="row">
      <div class="col-xl-4">
        <h5 class="card-title">Logo</h5>
        <div class="card bg-transparent shadow-none">
          <img src="../images/<?= $tinfo['avatar'] ?>" class="img-fuild">
        </div>
        <h5 class="card-title">Background</h5>
        <div class="card">
          <img src="../images/<?= $tinfo['background'] ?>" class="img-fuild">
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Account</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['username'] ?></div>
                  </div>
                  <h5 class="card-title">Home</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Training Center</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['center'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Description</div>
                    <div class="col-lg-9 col-md-8"><?= nl2br($tinfo['description']) ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Qualifications</div>
                    <div class="col-lg-9 col-md-8"><?= nl2br($tinfo['qualifications']) ?></div>
                  </div>
                  <h5 class="card-title">Contacts</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['address'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['email'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['contact_number'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Facebook Link</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['facebook'] ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <form method="post" action="methods/editinfo.php" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?= $tinfo['id'] ?>" hidden>
                    <div class="row mb-3">
                      <label for="h-image" class="col-md-4 col-lg-3 col-form-label">Logo</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img" src="../images/<?= $tinfo['avatar'] ?>" alt="Profile">
                        <div class="pt-2">
                          <input id="h-image" type="file" onchange="c(event)" name="logo" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="a-image" class="col-md-4 col-lg-3 col-form-label">Background</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img2" src="../images/<?= $tinfo['background'] ?>" alt="Profile">
                        <div class="pt-2">
                          <input id="a-image" type="file" onchange="c2(event)" name="bgd" class="form-control">
                        </div>
                      </div>
                    </div>
                    <h5 class="card-title">Account</h5>
                    <div class="row mb-3">
                      <label for="uname" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="uname" type="text" class="form-control" id="uname" value="<?= $tinfo['username'] ?>">
                      </div>
                    </div>
                    <h5 class="card-title">Home</h5>
                    <div class="row mb-3">
                      <label for="tc" class="col-md-4 col-lg-3 col-form-label">Training Center</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tc" type="text" class="form-control" id="tc" value="<?= $tinfo['center'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="desc" class="col-md-4 col-lg-3 col-form-label">Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="desc" class="form-control" id="desc" style="height: 100px"><?= $tinfo['description'] ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="qual" class="col-md-4 col-lg-3 col-form-label">Qualifications</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="qualifications" class="form-control" id="qual" style="height: 200px"><?= $tinfo['qualifications'] ?></textarea>
                      </div>
                    </div>
                    <h5 class="card-title">Contacts</h5>
                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="address" value="<?= $tinfo['address'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?= $tinfo['email'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="number" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="number" type="text" class="form-control" id="number" value="<?= $tinfo['contact_number'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fb" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="fb" value="<?= $tinfo['facebook'] ?>">
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
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
    const c2 = (event) => {
      const img = document.getElementById('img2');
      img.src = URL.createObjectURL(event.target.files[0])+'#toolbar=0';
    }
  </script>
</body>
</html>