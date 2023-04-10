
<?php 
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'info';

include 'connection.php';

$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

$query2 = "SELECT * FROM tesda_about";
$result2 = $conn->query($query2);
$tabout = $result2->fetch_assoc();

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
    <div class="pagetitle">
      <h1>Tesda Info</h1>
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
        <div class="card">
          <img src="../images/<?= $tinfo['image'] ?>" class="img-fuild">
        </div>
        <div class="card bg-transparent shadow-none">
          <img src="../images/<?= $tabout['image'] ?>" class="img-fuild">
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
                  <h5 class="card-title">Home</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Title</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['title'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Description</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['description'] ?></div>
                  </div>
                  <h5 class="card-title">About</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Title</div>
                    <div class="col-lg-9 col-md-8"><?= $tabout['title'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Text</div>
                    <div class="col-lg-9 col-md-8"><?= $tabout['about_text'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mission</div>
                    <div class="col-lg-9 col-md-8"><?= $tabout['mission'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Vision</div>
                    <div class="col-lg-9 col-md-8"><?= $tabout['vission'] ?></div>
                  </div>
                  <h5 class="card-title">Contacts</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['address'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['number'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $tinfo['email'] ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <form method="post" action="methods/editinfo.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="h-image" class="col-md-4 col-lg-3 col-form-label">Home Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img" src="../images/<?= $tinfo['image'] ?>" alt="Profile">
                        <div class="pt-2">
                          <input id="h-image" type="file" onchange="c(event)" name="h-image" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="a-image" class="col-md-4 col-lg-3 col-form-label">About Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img2" src="../images/<?= $tabout['image'] ?>" alt="Profile">
                        <div class="pt-2">
                          <input id="a-image" type="file" onchange="c2(event)" name="a-image" class="form-control">
                        </div>
                      </div>
                    </div>
                    <h5 class="card-title">Home</h5>
                    <div class="row mb-3">
                      <label for="i-title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="i-title" type="text" class="form-control" id="i-title" value="<?= $tinfo['title'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="desc" class="col-md-4 col-lg-3 col-form-label">Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="desc" class="form-control" id="desc" style="height: 100px"><?= $tinfo['description'] ?></textarea>
                      </div>
                    </div>
                    <h5 class="card-title">About</h5>
                    <div class="row mb-3">
                      <label for="a-title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="a-title" type="text" class="form-control" id="a-title" value="<?= $tabout['title'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="text" class="col-md-4 col-lg-3 col-form-label">Text</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="text" class="form-control" id="text" style="height: 100px"><?= $tabout['about_text'] ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="mission" class="col-md-4 col-lg-3 col-form-label">Mission</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="mission" class="form-control" id="mission" style="height: 100px"><?= $tabout['mission'] ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="vission" class="col-md-4 col-lg-3 col-form-label">Vission</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="vission" class="form-control" id="vission" style="height: 100px"><?= $tabout['vission'] ?></textarea>
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
                      <label for="number" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="number" type="text" class="form-control" id="number" value="<?= $tinfo['number'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?= $tinfo['email'] ?>">
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