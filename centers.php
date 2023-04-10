<?php
include 'connection.php';

$training = [];
$trainingsquerry = "SELECT * FROM training_centers Order By center";
$trainingresult = $conn->query($trainingsquerry);
while($row = $trainingresult->fetch_assoc()){
    $training[] = $row; 
}

$assessment = [];
$assessmentquerry = "SELECT * FROM assessment_centers Order By center";
$assessmentresult = $conn->query($assessmentquerry);
while($row = $assessmentresult->fetch_assoc()){
    $assessment[] = $row; 
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>TESDA</title>
      <meta content="" name="description" />
      <meta content="" name="keywords" />
      <link href="assets/img/tsd.ico" rel="icon" />
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
      <link
         href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
         rel="stylesheet"
      />
      <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
      <link
         href="assets/vendor/bootstrap/css/bootstrap.min.css"
         rel="stylesheet"
      />
      <link
         href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
         rel="stylesheet"
      />
      <link
         href="assets/vendor/boxicons/css/boxicons.min.css"
         rel="stylesheet"
      />
      <link
         href="assets/vendor/glightbox/css/glightbox.min.css"
         rel="stylesheet"
      />
      <link
         href="assets/vendor/swiper/swiper-bundle.min.css"
         rel="stylesheet"
      />
      <link href="assets/css/style.css" rel="stylesheet" />
   </head>
   <body>
      <header id="header" class="fixed-top d-flex align-items-center">
         <div
            class="container d-flex align-items-center justify-content-between"
         >
            <div class="logo">
               <h1 class="text-light">
                  <a href="index.php"><span>TESDA SORSOGON</span></a>
               </h1>
            </div>
            <nav id="navbar" class="navbar">
               <ul>
                  <li>
                     <a class="nav-link scrollto" href="index.php">Home</a>
                  </li>
                  <li>
                     <a class="nav-link scrollto" href="#training"
                        >Training Centers</a
                     >
                  </li>
                  <li>
                     <a class="nav-link scrollto" href="#assessment"
                        >Assessment Centers</a
                     >
                  </li>
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
         </div>
      </header>
      <main id="main">
         <section id="training" class="training">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Training</h2>
                  <p>Training Centers & list of Qualifications</p>
               </div>

               <div class="container mb-3">
                  <div class="row justify-content-center">
                     <div class="col-lg-8">
                        <label for="inputPassword5" class="form-label mb-2"
                           >Search for Training Center</label
                        >
                        <input
                           id="train"
                           type="text"
                           class="form-control"
                           onkeyup="search()"
                        />
                     </div>
                  </div>
               </div>
               <div class="row justify-content-md-center align-items-center" id="tc">
               <?php foreach( $training as $row): ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 shadow p-3 pb-5 bg-body rounded m-2 position-relative list">
                        <p class="title"><?= $row['center'] ?></p>
                        <button class="btn btn-outline-secondary btn-tesda" data-bs-toggle="modal" data-bs-target="#tc<?= $row['id'] ?>">
                            View qualifications
                        </button>
                    </div>
                <?php endforeach ?>
               </div>
            </div>
         </section>
         <section id="assessment" class="assessment">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Assessment</h2>
                  <p>Assessment Centers & list of Qualifications</p>
               </div>
               <div class="container mb-3">
                  <div class="row justify-content-center">
                     <div class="col-lg-8">
                        <label for="inputPassword5" class="form-label mb-2"
                           >Search for Assessment Center</label
                        >
                        <input
                           id="assess"
                           onkeyup="search2()"
                           type="text"
                           class="form-control"
                        />
                     </div>
                  </div>
               </div>
               <div class="row justify-content-md-center align-items-center" id="ac">
               <?php foreach( $assessment as $row): ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 shadow p-3 pb-5 bg-body rounded m-2 position-relative list2">
                        <p class="title"><?= $row['center'] ?></p>
                        <button class="btn btn-outline-secondary btn-tesda" data-bs-toggle="modal" data-bs-target="#ac<?= $row['id'] ?>">
                            View qualifications
                        </button>
                    </div>
                <?php endforeach ?>
               </div>
            </div>
         </section>
      </main>
      <footer id="footer">
         <div class="footer-newsletter section-bg">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-sm-3">
                     <img class="support" src="./assets/img/tuv.png" />
                  </div>
                  <div class="col-sm-3">
                     <img class="support" src="./assets/img/ph.png" />
                  </div>
                  <div class="col-sm-3">
                     <img class="support" src="./assets/img/sor.png" />
                  </div>
                  <div class="col-sm-3">
                     <img class="support" src="./assets/img/blu-seal.png" />
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 footer-contact">
                     <h3>TESDA V</h3>
                     <p>
                        City Hall Complex, Cabid-an
                        <br />
                        Sorsogon City
                        <br />
                        Philippines<br /><br />
                        <strong>Phone:</strong> 0917-860-3376<br />
                        <strong>Email:</strong> tesdasorsogon@gmail.com<br />
                     </p>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Useful Links</h4>
                     <ul>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="#">Home</a>
                        </li>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="#about">About us</a>
                        </li>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="#services">Programs</a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Other Government Links</h4>
                     <ul>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="https://www.tesda.gov.ph/">TESDA Main</a>
                        </li>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="http://ro5.dole.gov.ph/">DOLE</a>
                        </li>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="https://www.deped.gov.ph/regions/region-v/"
                              >DepEd</a
                           >
                        </li>
                        <li>
                           <i class="bx bx-chevron-right"></i>
                           <a href="https://doh.gov.ph/">DOH</a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Our Social Networks</h4>
                     <p>learn more about tesda by visiting our social medias</p>
                     <div class="social-links mt-3">
                        <a
                           href="https://twitter.com/tesdaofficial?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                           class="twitter"
                           ><i class="bx bxl-twitter"></i
                        ></a>
                        <a
                           href="https://www.facebook.com/TESDAOfficial"
                           class="facebook"
                           ><i class="bx bxl-facebook"></i
                        ></a>
                        <a
                           href="https://www.instagram.com/explore/tags/tesda/?hl=en"
                           class="instagram"
                           ><i class="bx bxl-instagram"></i
                        ></a>
                        <a
                           href="https://www.linkedin.com/company/tesda-technical-education-and-skills-development-authority"
                           class="linkedin"
                           ><i class="bx bxl-linkedin"></i
                        ></a>
                        <a
                           href="https://www.youtube.com/tesdaofficial"
                           class="youtube"
                           ><i class="bx bxl-youtube"></i
                        ></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container py-4">
            <div class="copyright">
               &copy; Copyright <strong><span>TESDA SORSOGON</span></strong
               >. All Rights Reserved
            </div>
            <div class="credits">
               Designed by Kisha & Shaine
            </div>
         </div>
      </footer>
      <a
         href="#"
         class="back-to-top d-flex align-items-center justify-content-center"
         ><i class="bi bi-arrow-up-short"></i
      ></a>
      <?php foreach($training as $row): ?>
      <div class="modal fade" id="tc<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  	<h4 class="modal-title" id="exampleModalLabel">Training Center</h4>
                  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="alert alert-primary" role="alert">
                     <h4><?= $row['center'] ?></h4>
                     <h6>
                        Location : <strong><?= $row['address'] ?></strong>
                     </h6>
                     <h6>Email : <strong><?= $row['email'] ?></strong></h6>
                     <h6>Contact : <strong><?= $row['contact_number'] ?></strong></h6>
                  </div>
                  <div class="alert alert-light" role="alert">
                  	<h3>Qualifications</h3>
                    <hr>
                    <p style="line-height: 19px"><?= nl2br($row['qualifications']) ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endforeach ?>
      <?php foreach($assessment as $row): ?>
      <div class="modal fade" id="ac<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  	<h4 class="modal-title" id="exampleModalLabel">Training Center</h4>
                  	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="alert alert-primary" role="alert">
                     <h4><?= $row['center'] ?></h4>
                     <h6>
                        Location : <strong><?= $row['address'] ?></strong>
                     </h6>
                     <h6>Email : <strong><?= $row['email'] ?></strong></h6>
                     <h6>Contact : <strong><?= $row['contact_number'] ?></strong></h6>
                  </div>
                  <div class="alert alert-light" role="alert">
                  	<h3>Qualifications</h3>
                    <hr>
                      <p style="line-height: 19px"><?= nl2br($row['qualifications']) ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endforeach ?>
      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/js/main.js"></script>
      <script>
         function search () {
            const lists = document.querySelectorAll('.list')
            const textToSearch = document
               .getElementById('train')
               .value.toUpperCase()
            for (let i of lists) {
               const text = i.children[0].textContent || i.children[0].innerText
               if (text.toUpperCase().indexOf(textToSearch) > -1)
                  i.style.display = ''
               else i.style.display = 'none'
            }
         }
         const search2 = () => {
            const lists = document.querySelectorAll('.list2')
            const textToSearch = document
               .getElementById('assess')
               .value.toUpperCase()
            for (let i of lists) {
               const text = i.children[0].textContent || i.children[0].innerText
               if (text.toUpperCase().indexOf(textToSearch) > -1)
                  i.style.display = ''
               else i.style.display = 'none'
            }
         }
      </script>
   </body>
</html>
