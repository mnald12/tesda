<?php

session_start();

include 'connection.php';

$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

$query2 = "SELECT * FROM tesda_about";
$result2 = $conn->query($query2);
$tabout = $result2->fetch_assoc();

$services = [];
$servicesquerry = "SELECT * FROM services";
$servicesresult = $conn->query($servicesquerry);
while($row = $servicesresult->fetch_assoc()){
    $services[] = $row; 
}

$events = [];
$eventsquerry = "SELECT * FROM events Where status = 'Active' ";
$eventsresult = $conn->query($eventsquerry);
while($row = $eventsresult->fetch_assoc()){
    $events[] = $row; 
}

$faq = [];
$faqquery = "SELECT * FROM faq";
$faqresult = $conn->query($faqquery);
while($row = $faqresult->fetch_assoc()){
    $faq[] = $row; 
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
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet"/>
      <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"/>
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"/>
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"/>
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"/>
      <link href="assets/css/style.css" rel="stylesheet" />
   </head>
   <body>
      <header id="header" class="fixed-top d-flex align-items-center">
         <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
               <h1 class="text-light">
                  <a href="index.php"><span>TESDA SORSOGON</span></a>
               </h1>
            </div>
            <nav id="navbar" class="navbar">
               <ul>
                  <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                  <li><a class="nav-link scrollto" href="#about">About Us</a></li>
                  <li><a class="nav-link scrollto" href="#services">Services</a></li>
                  <li><a class="nav-link scrollto" href="#events">Events</a></li>
                  <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                  <li><a class="nav-link scrollto" href="#downloadable">Downloadables</a></li>
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                  <li><a class="getstarted scrollto" href="centers.php">Centers</a></li>
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
         </div>
      </header>
      <section id="hero" class="d-flex align-items-center" style="height: auto !important">
         <div class="container">
            <div class="row gy-4">
               <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                  <h1><?= $tinfo['title'] ?></h1>
                  <h2><?= $tinfo['description'] ?></h2>
                  <div>
                     <a class="btn btn-get-started scrollto" href="#about">Learn more</a>
                  </div>
              </div>
               <div class="col-lg-6 order-1 order-lg-2 hero-img">
                  <img width="100%" src="images/<?= $tinfo['image'] ?>" class="img-fluid" />
               </div>
            </div>
         </div>
      </section>
      <main id="main">
         <section id="about" class="about">
            <div class="container">
               <div class="row justify-content-between">
                  <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                     <img src="images/<?= $tabout['image'] ?>" class="img-fluid" data-aos="zoom-in" />
                  </div>
                  <div class="col-lg-6 pt-5 pt-lg-0">
                     <h3 data-aos="fade-up"><?= $tabout['title'] ?></h3>
                     <p data-aos="fade-up" data-aos-delay="100"><?= $tabout['about_text'] ?></p>
                     <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                           <i class="bx bi-eye"></i>
                           <h4>Vision</h4>
                           <p><?= $tabout['vission'] ?></p>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                           <i class="bx bi-flag"></i>
                           <h4>Mission</h4>
                           <p><?= $tabout['mission'] ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Services</h2>
                  <p>TESDA SORSOGON Online Services</p>
               </div>
               <?php if(isset($_SESSION['req_message'])): ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <?= $_SESSION['req_message']; ?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['req_message']); ?>
               <?php endif ?>
               <div class="row">
                  <?php foreach($services as $row): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                     <div class="icon-box">
                        <div class="icon">
                           <i class="bx bi-file-earmark-richtext"></i>
                        </div>
                        <h3 class="title"><?= $row['title'] ?></h3>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#serv<?= $row['id'] ?>" class="btn btn-primary">
                           Check requirements
                        </button>
                     </div>
                  </div>
                  <?php endforeach ?>
               </div>
            </div>
         </section>
         <section id="events" class="events">
            <div class="container">
               <div class="section-title" data-aos="fade-up">
                  <h2>Events</h2>
                  <p>Recently Events</p>
               </div>
               <div class="row">
                  <?php foreach($events as $row): ?>
                     <div class="col-xl-3 col-lg-4 col-md-6 event" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member">
                              <img src="images/<?= $row['image'] ?>" class="img-fluid" />
                              <div class="member-info">
                                 <div class="member-info-content">
                                    <h4 style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#ev<?= $row['id'] ?>"><?= $row['title'] ?></h4>
                                 </div>
                              </div>
                        </div>
                     </div>
                  <?php endforeach ?>
               </div>
            </div>
         </section>
         <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>F.A.Q</h2>
                  <p>Frequently Asked Questions</p>
               </div>
               <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
                  <?php foreach($faq as $rowq): ?>
                  <li>
                     <div data-bs-toggle="collapse" href="#faq<?= $rowq['id'] ?>" class="collapsed question">
                        <?= $rowq['question'] ?>
                        <i class="bi bi-chevron-down icon-show"></i>
                        <i class="bi bi-chevron-up icon-close"></i>
                     </div>
                     <div id="faq<?= $rowq['id'] ?>" class="collapse" data-bs-parent=".faq-list">
                        <p><?= nl2br($rowq['answer']) ?></p>
                     </div>
                  </li>
				      <?php endforeach ?>
               </ul>
            </div>
         </section>
         <section id="downloadable" class="downloadable">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Downloadables</h2>
                  <p>Downloadable Forms and files</p>
               </div>
               <div class="row justify-content-center align-items-center gap-3">
                  <div class="col-sm-4 download shadow rounded p-3 bg-body">
                     <div class="icon-box">
                        <h3 class="title mb-3">Application form</h3>
                        <a
                           class="btn btn-primary"
                           href="forms/form1.pdf"
                           download
                           target="_blank"
                           >Download <i class="bi bi-arrow-down-square"></i
                        ></a>
                     </div>
                  </div>
                  <div class="col-sm-4 download shadow rounded p-3 bg-body">
                     <div class="icon-box">
                        <h3 class="title mb-3">NTTC Application form</h3>
                        <a
                           class="btn btn-primary"
                           href="forms/form2.pdf"
                           download
                           target="_blank"
                           >Download <i class="bi bi-arrow-down-square"></i
                        ></a>
                     </div>
                  </div>
                  <div class="col-sm-4 download shadow rounded p-3 bg-body">
                     <div class="icon-box">
                        <h3 class="title mb-3">Registration form</h3>
                        <a
                           class="btn btn-primary"
                           href="forms/form3.pdf"
                           download
                           target="_blank"
                           >Download <i class="bi bi-arrow-down-square"></i
                        ></a>
                     </div>
                  </div>
                  <div class="col-sm-4 download shadow rounded p-3 bg-body">
                     <div class="icon-box">
                        <h3 class="title mb-3">OFW Registration form</h3>
                        <a
                           class="btn btn-primary"
                           href="forms/form4.pdf"
                           download
                           target="_blank"
                           >Download <i class="bi bi-arrow-down-square"></i
                        ></a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="clients" class="clients section-bg">
            <div class="container" data-aos="fade-up">
               <div class="row">
                  <div class="col-lg-4">
                     <img class="img-fluid" src="./assets/img/abot.png" />
                  </div>
                  <div class="col-lg-8">
                     <p class="tesda-text">
                        “TESDA Abot Lahat” proclaims the spirit and intent of
                        the policy direction of the agency for CY 2019. It means
                        that TESDA is determined to expand and strengthen its
                        mandate, programs, and services. It will reach out and
                        serve new and more clients and partners with a clear
                        purpose... to transform and improve the lives of the
                        poor and underserved citizens of this country for the
                        better.
                     </p>
                  </div>
               </div>
            </div>
         </section>
         <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <h2>Contact Us</h2>
                  <p>Have something to say? Share it with us!</p>
               </div>
               <div class="row">
                  <div
                     class="col-lg-5 d-flex align-items-stretch"
                     data-aos="fade-up"
                     data-aos-delay="100"
                  >
                     <div class="info">
                        <div class="address">
                           <i class="bi bi-geo-alt"></i>
                           <h4>Location:</h4>
                           <p>
                           <?= $tinfo['address'] ?>
                           </p>
                        </div>
                        <div class="email">
                           <i class="bi bi-envelope"></i>
                           <h4>Email:</h4>
                           <p><?= $tinfo['email'] ?></p>
                        </div>
                        <div class="phone">
                           <i class="bi bi-phone"></i>
                           <h4>Call:</h4>
                           <p><?= $tinfo['number'] ?></p>
                        </div>
                        <iframe
                           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.8473820277472!2d124.02115357661367!3d12.981611564015576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a0eefee85859d3%3A0x243137ada7e03c20!2sTesda%20Sorsogon%20Provl%20Office!5e0!3m2!1sen!2sph!4v1675888327899!5m2!1sen!2sph"
                           frameborder="0"
                           style="border: 0; width: 100%; height: 290px"
                           allowfullscreen
                        ></iframe>
                     </div>
                  </div>
                  <div
                     class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch"
                     data-aos="fade-up"
                     data-aos-delay="200"
                  >
                     <form
                        action="sendmessage.php"
                        method="post"
                        class="php-email-form"
                     >
                        <div class="my-3">
                        <?php if(isset($_SESSION['sentMessage'])): ?>
                           <div id="alert" class="alert alert-dismissible fade show alert-success" role="alert">
                              <?= $_SESSION['sentMessage']; ?>
                              <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                        <?php unset($_SESSION['sentMessage']); ?>
                        <?php endif ?>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="name">Your Name</label>
                              <input
                                 type="text"
                                 name="name"
                                 class="form-control"
                                 id="name"
                                 placeholder="Your Name"
                                 required
                              />
                           </div>
                           <div class="form-group col-md-6 mt-3 mt-md-0">
                              <label for="email">Your Email</label>
                              <input
                                 type="email"
                                 class="form-control"
                                 name="email"
                                 id="email"
                                 placeholder="Your Email"
                                 required
                              />
                           </div>
                        </div>
                        <div class="form-group mt-3">
                           <label for="name">Message</label>
                           <textarea
                              class="form-control"
                              name="msg"
                              rows="10"
                              required
                           ></textarea>
                        </div>
                        <div style="text-align: right;">
                           <button type="submit">Send Message</button>
                        </div>
                     </form>
                  </div>
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
                     <h3>TESDA SPO</h3>
                     <p><?= $tinfo['address'] ?><br /><br />
                        <strong>Phone:</strong> <?= $tinfo['number'] ?><br />
                        <strong>Email:</strong> <?= $tinfo['email'] ?><br />
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
                           <a href="#services">Services</a>
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
                     <h4>Tesda Social Networks</h4>
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
            <div class="credits">Designed by Kisha & Shaine</div>
         </div>
      </footer>
      <a
         href="#"
         class="back-to-top d-flex align-items-center justify-content-center"
         ><i class="bi bi-arrow-up-short"></i
      ></a>
      <?php foreach($services as $row): ?>
      <div class="modal fade" id="serv<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel"><?= $row['title'] ?></h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="col-lg-12 row">
                     <div class="col-lg-6">
                        <div class="alert alert-secondary" role="alert">
                              <h3 style="text-align: center">REQUIREMENTS</h3>
                              <p class="list-req" style="line-height: 20px !important; padding: 10px;"><?= nl2br($row['requirements']) ?></p>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="alert alert-warning" role="alert">
                           The purpose of this service is to review and verify all your requirements before presenting it to the actual office to avoid failed transactions.
                           <br>
                           <br>
                           <strong>Note:  </strong>  Make sure to comply those requirements before uploading.
                        </div>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                              <label for="formFile" class="form-label">Full Name</label>
                              <input type="text" name="title" value="<?= $row['title'] ?>" hidden/>
                              <input class="form-control" type="text" id="formFile" name="name" required/>
                        </div>
                        <div class="mb-3">
                              <label for="formFile" class="form-label">Email</label>
                              <input class="form-control" type="text" id="formFile" name="email" required/>
                        </div>
                        <div class="mb-3">
                           <label for="formFileMultiple" class="form-label">Upload all your files here : (Images only)</label>
                              <input name="files[]" class="form-control" type="file" id="formFileMultiple" multiple />
                        </div>
                        <button class="btn btn-success">
                           Submit
                        </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endforeach ?>
      <?php foreach($events as $row): ?>
      <div class="modal fade" id="ev<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                  <div class="modal-header">
                     <h2 class="modal-title" id="exampleModalLabel">
                        Events
                     </h2>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-lg-6">
                           <img src="images/<?= $row['image'] ?>" class="img-fluid" />
                        </div>
                        <div class="col-lg-6">
                           <h2 class="modal-title"><?= $row['title'] ?></h2>
                           <br/>
                           <p><?= nl2br($row['contents']) ?></p>
                        </div>
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
   </body>
</html>
