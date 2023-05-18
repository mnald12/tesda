
<?php

session_start();

$_SESSION['nav-active'] = 'contacts';

include 'connection.php';

$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <?php include 'components/header.php' ?>
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <main id="main">
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
    <?php include 'components/footer.php' ?>
</body>
</html>