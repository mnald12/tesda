
<?php

session_start();

$_SESSION['nav-active'] = 'dropdown1';

include 'connection.php';
$type = mysqli_real_escape_string($conn, $_GET['type']);
$servicesquerry = "SELECT * FROM services WHERE title = '$type Renewal' ";
$servicesresult = $conn->query($servicesquerry);
$req = $servicesresult->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validator</title>
    <?php include 'components/header.php' ?>
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <main id="main">
        <section id="verify" class="verify">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Requirements Validator</h2>
                  <p><?= $type ?> Requirements Validator</p>
               </div>
               <?php if(isset($_SESSION['req_message'])): ?>
                  <div class="m-4 alert alert-success alert-dismissible fade show" role="alert">
                     <?= $_SESSION['req_message']; ?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['req_message']); ?>
               <?php endif ?>
               <div class="col-lg-12 row">
                    <div class="col-lg-7">
                        <div class="alert alert-light" role="alert">
                            <h3 style="margin-left: 12px">REQUIREMENTS : </h3>
                            <p class="list-req" style="line-height: 20px !important; padding: 10px;"><?= nl2br($req['requirements']) ?></p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="alert alert-warning" role="alert">
                            The purpose of this service is to review and verify all your requirements before presenting it to the actual office to avoid failed transactions.
                            <br>
                            <br>
                            <strong>Note:  </strong>  Make sure to comply those requirements before uploading.
                        </div>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Full Name</label>
                                <input type="text" name="title" value="<?= $type ?>" hidden/>
                                <input class="form-control" type="text" id="formFile" name="name" required/>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Email</label>
                                <input class="form-control" type="text" id="formFile" name="email" required/>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload all your files here : (Images only)</label>
                                <input name="files[]" class="form-control" type="file" id="formFileMultiple" multiple required/>
                            </div>
                            <button style="width: 100%" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php' ?>
</body>
</html>