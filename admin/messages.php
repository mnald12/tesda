<?php
session_start();

if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
   header('location: ../admin/index.php');
}

$_SESSION['nav-active'] = 'messages';

include 'connection.php';

$messages = [];
$msgquerry = "SELECT * FROM messages Order By id desc";
$msgresult = $conn->query($msgquerry);
while($row = $msgresult->fetch_assoc()){
    $messages[] = $row; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Review / Messages - TESDA Admin</title>
  <?php include 'links.php' ?>
</head>
<body>
  <?php include 'header.php' ?>
  <?php include 'sidebar.php' ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Messages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Review</li>
          <li class="breadcrumb-item active">Messages</li>
          <li class="breadcrumb-item"><a href="sentmessages.php">Sent Messages</a></li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="card filter-search">
        <div class="card-body">
          <input id="train" onkeyup="search()" type="text" class="form-control mt-4" placeholder="Search here">
        </div>
      </div>
      <div class="row">
      <?php foreach( $messages as $row): ?>
        <div class="col-xl-12 list">
            <div class="card info-card customers-card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start"><h6>Action</h6></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reply<?= $row['id'] ?>">Reply</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#del<?= $row['id'] ?>">Delete</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title pb-0"><span><?= $row['email'] ?></span> <span>| <?= $row['date'] ?></span></h5>
                    <h5 class="card-title pt-0"><i class="bi bi-person"></i> <?= $row['name'] ?></h5>
                    <p class="m-2"><?= nl2br($row['message']) ?></p>
                </div>
            </div>
        </div>
      <?php endforeach ?>
      </div>
    </section>
  </main>
<?php foreach( $messages as $row): ?>
  <div class="modal fade" id="del<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Delete Message?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">
              <form action="methods/deletemessage.php" method="post">
                  <p class="modal-text">Would you really like to delete this message?</p>
                  <input type="text" name="id" value="<?= $row['id'] ?>" hidden/>
                  <div style="width: 100%; text-align: right">
                      <button class="btn btn-danger">
                          Delete Message
                      </button>
                  </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
<?php foreach( $messages as $row): ?>
  <div class="modal fade" id="reply<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Reply to <?= $row['name'] ?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col-lg-12">
              <form action="methods/reply.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="name" value="<?= $row['name'] ?>" hidden/>
                  <input type="text" name="email" value="<?= $row['email'] ?>" hidden/>
                  <div class="row mb-3">
                      <label for="rejtxt" class="col-md-4 col-lg-3 col-form-label">Message</label>
                      <div class="col-md-8 col-lg-9">
                          <textarea name="msg" class="form-control" id="rejtxt" style="height: 100px" required></textarea>
                      </div>
                  </div>
                  <div style="width: 100%; text-align: right">
                      <button class="btn btn-primary" onclick="disable('rejbtn', 'rejtxt')" id="rejbtn">
                          Send Message
                      </button>
                  </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
  <?php include 'footer.php' ?>
  <script>
    const disable = (id, txtarea) => {
      const ta = document.getElementById(txtarea)
      if(ta.value !== ''){
          setTimeout(() => {
              document.getElementById(id).setAttribute("disabled", true)
          }, 500)
      }
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