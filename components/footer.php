
<?php
$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();
?>

<section id="clients" class="clients" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img style="max-height: 180px" class="img-fluid" src="./assets/img/abot.png" />
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

<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>