<?php
session_start();

if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
  header('location: ../trainingcenter/index.php');
}

$_SESSION['nav-actives'] = 'archived';
$tcid = $_SESSION['tcid'];

include 'connection.php';

$announcements = [];
$announcementsquerry = "SELECT * FROM announcements Where tcid = '$tcid' AND status = 'Archived' Order By id Desc";
$announcementsresult = $conn->query($announcementsquerry);
while($row = $announcementsresult->fetch_assoc()){
  $announcements[] = $row; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / Announcements - Training Center</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Archives</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item">Announcements</li>
          <li class="breadcrumb-item active">Archive</li>
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
      <?php foreach( $announcements as $row): ?>
        <div class="col-xl-12 list">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ev-overview<?= $row['id'] ?>">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ev-edit<?= $row['id'] ?>">Edit</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ev-Archive<?= $row['id'] ?>">Restore</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="ev-overview<?= $row['id'] ?>">
                <br>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label "><img class="img-fluid" src="../images/<?= $row['image'] ?>" alt=""></div>
                    <div class="col-lg-9 col-md-8">
                        <h3 class="mb-3"><?= $row['qualification'] ?></h3>
                        <p><?= nl2br($row['description']) ?></p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="ev-edit<?= $row['id'] ?>">
                  <form action="methods/editannouncement.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img id="img<?= $row['id'] ?>" src="../images/<?= $row['image'] ?>" alt="Image">
                        <div class="pt-2">
                          <input type="file" name="image" onchange="c(event, 'img<?= $row['id'] ?>')" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="description" class="col-md-4 col-lg-3 col-form-label">Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control" id="description" style="height: 160px"><?= $row['description'] ?></textarea>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade pt-3" id="ev-Archive<?= $row['id'] ?>">
                  <form action="methods/makeactive.php" method="post">
                    <div class="alert alert-warning">
                        <strong>Do you want this Announcement to be removed from the archive and re-displayed on the website?</strong> 
                    </div>
                      <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                      <button type="submit" class="btn btn-success">Restore</button>
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
    const c = (event, id) => {
      const img = document.getElementById(id)
      img.src = URL.createObjectURL(event.target.files[0])+'#toolbar=0'
    }
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