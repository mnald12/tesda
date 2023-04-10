<?php
    session_start();
    if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
        header('location: ../admin/index.php');
    }
    $_SESSION['nav-active'] = 'requirements';

    include 'connection.php';

    $id = $conn->real_escape_string($_POST['id']);

    if(!$id){
        header('location: requirements.php');
    }
    
    $reqquerry = "SELECT * FROM certificates Where id = '$id' ";
    $reqresult = $conn->query($reqquerry);
    $requirements = $reqresult->fetch_assoc();
    $reqimg = explode(",", $requirements['files']);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>Requirements - Tesda Admin</title>
      <?php include 'links.php' ?>
   </head>
   <body onload="set('<?= $requirements['status'] ?>')">
      <?php include 'header.php' ?>
      <?php include 'sidebar.php' ?>
      <main id="main" class="main">
         <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $_SESSION['message']; ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
         <?php endif ?>
         <div class="pagetitle">
            <h1>Requirements</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Review</li>
                  <li class="breadcrumb-item"><a href="requirements.php">Requirements</a></li>
                  <li class="breadcrumb-item active">Preview</li>
               </ol>
            </nav>
         </div>

        <section class="section dashboard">
        <div class="row">
            <div class="col-xl-12">
                <div class="card info-card customers-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start"><h6>Action</h6></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#del">Delete</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title pb-0"><span><?= $requirements['email'] ?></span> <span>| <?= $requirements['date'] ?></span></h5>
                        <h5 class="card-title pt-0"><i class="bi bi-person"></i> <?= $requirements['name'] ?></h5>
                        <br>
                        <h3 class="card-subtitle"><?= $requirements['req_for'] ?></h3>
                        <div class="row">
                            <?php $i=0; foreach( $reqimg as $img): ?>
                            <div class="col-lg-6 p-2"><img id="req<?= $i ?>" onClick="zoom(<?= $i ?>)" src="../uploads/<?= $img ?>" class="img-fluid" style="width: 100%; height: 100%; cursor: pointer"></div>
                            <?php $i++; endforeach ?>
                        </div>
                        <div style="text-align: left" class="pt-3">
                            <button data-bs-toggle="modal" data-bs-target="#approve" class="btn btn-success" id="abtn">Approve</button>
                            <button data-bs-toggle="modal" data-bs-target="#reject" class="btn btn-danger" id="rbtn">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
         
      </main>
      <!-- End #main -->
      <?php include 'footer.php' ?>

      <div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Approve Requirements?</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="col-lg-12">
                    <form action="methods/approve.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $requirements['id'] ?>" hidden/>
                        <input type="text" name="name" value="<?= $requirements['name'] ?>" hidden/>
                        <input type="text" name="email" value="<?= $requirements['email'] ?>" hidden/>
                        <div class="row mb-3">
                            <label for="aptxt" class="col-md-4 col-lg-3 col-form-label">Message</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="msg" class="form-control" id="aptxt" style="height: 100px" required></textarea>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: right">
                            <button class="btn btn-success" onclick="disable('apbtn', 'aptxt')" id="apbtn">
                                Approve and Send Message
                            </button>
                        </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Reject Requirements?</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="col-lg-12">
                    <form action="methods/reject.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $requirements['id'] ?>" hidden/>
                        <input type="text" name="name" value="<?= $requirements['name'] ?>" hidden/>
                        <input type="text" name="email" value="<?= $requirements['email'] ?>" hidden/>
                        <div class="row mb-3">
                            <label for="rejtxt" class="col-md-4 col-lg-3 col-form-label">Message</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="msg" class="form-control" id="rejtxt" style="height: 100px" required></textarea>
                            </div>
                        </div>
                        <div style="width: 100%; text-align: right">
                            <button class="btn btn-danger" onclick="disable('rejbtn', 'rejtxt')" id="rejbtn">
                                Reject and Send Message
                            </button>
                        </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

        <div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Delete Requirements</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                    <form action="methods/deleterequirements.php" method="post">
                        <p class="modal-text">Would you really like to delete this Requirements?</p>
                        <input type="text" name="id" value="<?= $requirements['id'] ?>" hidden/>
                        <div style="width: 100%; text-align: right">
                            <button class="btn btn-danger">
                                Delete Requirements
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

      <script>
        let status
        let act
        const zoom = (id) => {
            if(act === undefined){
                const img = document.getElementById('req'+id)
                img.style.position = 'fixed'
                img.style.width = '100%'
                img.style.height = '100%'
                img.style.left = '0'
                img.style.top = '0'
                img.style.zIndex = '99999999'
                act = id
            }
            else if(act === id){
                const img = document.getElementById('req'+id)
                img.style.position = 'unset'
                img.style.zIndex = 'unset'
                act = undefined
            }
        }
        const set = (status) => {
            console.log(status)
            if(status === 'Approved'){
                document.getElementById('abtn').setAttribute("disabled", true)
            }
            if(status === 'Rejected'){
                document.getElementById('rbtn').setAttribute("disabled", true)
            }
        }
        const disable = (id, txtarea) => {
            const ta = document.getElementById(txtarea)
            if(ta.value !== ''){
                setTimeout(() => {
                    document.getElementById(id).setAttribute("disabled", true)
                }, 500)
            }
        }
      </script>
   </body>
</html>
