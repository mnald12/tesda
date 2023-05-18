<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'renewal';

include 'connection.php';

$services = [];
$servicesquerry = "SELECT * FROM services Order By id Desc";
$servicesresult = $conn->query($servicesquerry);
while($row = $servicesresult->fetch_assoc()){
    $services[] = $row; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / Renewal - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Renewal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">Renewal</li>
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
      <?php foreach( $services as $row): ?>
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
                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#serv-delete<?= $row['id'] ?>">Delete</button>
                </li> -->
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="serv-overview<?= $row['id'] ?>">
                <br>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Title</div>
                    <div class="col-lg-9 col-md-8"><?= $row['title'] ?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Requirements</div>
                    <div class="col-lg-9 col-md-8"><?= nl2br($row['requirements']) ?></div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="serv-edit<?= $row['id'] ?>">
                  <form action="methods/editservices.php" method="post">
                    <input name="id" type="text" value="<?= $row['id'] ?>" hidden>
                    <div class="row mb-3">
                      <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="title" type="text" class="form-control" id="title" value="<?= $row['title'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="req" class="col-md-4 col-lg-3 col-form-label">Requirements</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="req" class="form-control" id="about" style="height: 160px"><?= $row['requirements'] ?></textarea>
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