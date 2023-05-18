<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'faq';

include 'connection.php';

$faq = [];
$faqquery = "SELECT * FROM faq Order By id Desc";
$faqresult = $conn->query($faqquery);
while($row = $faqresult->fetch_assoc()){
  $faq[] = $row; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage / FAQ - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>F.A.Q</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Manage</li>
          <li class="breadcrumb-item active">F.A.Q</li>
          <li class="breadcrumb-item"><a href="newfaq.php">Add New F.A.Q</a></li>
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
      <?php foreach( $faq as $row): ?>
        <div class="col-xl-12 list">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#faq-overview<?= $row['id'] ?>">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faq-edit<?= $row['id'] ?>">Edit</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#faq-delete<?= $row['id'] ?>">Delete</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="faq-overview<?= $row['id'] ?>">
                <br>
                <div>
                  <h3><?= $row['question'] ?></h3>
                  <p><?= nl2br($row['answer']) ?></p>
                </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="faq-edit<?= $row['id'] ?>">
                  <form method="post" action="methods/editfaq.php">
                    <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Question</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="qst" type="text" class="form-control" id="fullName" value="<?= $row['question'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Answer</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="ans" class="form-control" id="about" style="height: 100px"><?= $row['answer'] ?></textarea>
                      </div>
                    </div>
                    <div style="text-align: right;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade pt-3" id="faq-delete<?= $row['id'] ?>">
                  <form method="post" action="methods/deletefaq.php">
                    <div class="alert alert-warning">
                        <strong>Are you sure you want to delete this FAQ?</strong> 
                    </div>
                      <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                      <button type="submit" class="btn btn-danger">Delete FAQ</button>
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