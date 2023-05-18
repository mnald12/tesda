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
  <style>
    .qual{
      line-height: 15px;
    }
  </style>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <?php if(isset($_SESSION['change-message'])): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= $_SESSION['change-message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['change-message']); ?>
    <?php endif ?>
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
      <div class="card filter-search">
        <div class="card-body">
          <input id="train" onkeyup="search()" type="text" class="form-control mt-4" placeholder="Search here">
        </div>
      </div>
      <div class="row">
      <?php foreach( $training as $row): ?>
        <div class="col-xl-12 list">
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#serv-changepass<?= $row['id'] ?>">Change Password</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#serv-delete<?= $row['id'] ?>">Delete</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="serv-overview<?= $row['id'] ?>">
                <br>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8"><?= $row['username'] ?></div>
                  </div>
                  <hr>
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
                    <div class="col-lg-3 col-md-4 label ">Facebook</div>
                    <div class="col-lg-9 col-md-8"><?= $row['facebook'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Qualifications</div>
                    <div class="col-lg-9 col-md-8 qual"><?= nl2br($row['qualifications']) ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="serv-edit<?= $row['id'] ?>">
                  <form action="methods/edittrainingcenter.php" method="post">
                    <div class="row mb-3">
                      <label for="uname" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                        <input name="uname" type="text" class="form-control" id="uname" value="<?= $row['username'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Training Center</label>
                      <div class="col-md-8 col-lg-9">
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
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="fullName" value="<?= $row['facebook'] ?>">
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
                <div class="tab-pane fade pt-3" id="serv-changepass<?= $row['id'] ?>">
                  <form method="post" action="methods/changepwd.php">
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
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
  <script>
    const search = () => {
      const lists = document.querySelectorAll('.list')
      const textToSearch = document.getElementById('train').value.toUpperCase()
      for (let i of lists) {
        const text = i.children[0].textContent || i.children[0].innerText
        if (text.toUpperCase().indexOf(textToSearch) > -1) i.style.display = ''
        else i.style.display = 'none'
      }
    }
  </script>
</body>
</html>