<?php

session_start();

$_SESSION['nav-active'] = 'about';

include 'connection.php';

$query = "SELECT * FROM tesda_info";
$result = $conn->query($query);
$tinfo = $result->fetch_assoc();

$query2 = "SELECT * FROM tesda_about";
$result2 = $conn->query($query2);
$tabout = $result2->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <?php include 'components/header.php' ?>
</head>
<body>
    <?php include 'components/navbar.php' ?>
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
        <section data-aos="fade-up">
            <div class="container">
                <div class="col-lg-12">
                    <img class="img-fluid" src="images/abouts.png" alt="about" >
                </div>
                <br>
                <div class="col-lg-12">
                    <p>The Technical Education and Skills Development Authority (TESDA) was established through the enactment of Republic Act No. 7796 otherwise known as the "Technical Education and Skills Development Act of 1994", which was signed into law by President Fidel V. Ramos on August 25, 1994. This Act aims to encourage the full participation of and mobilize the industry, labor, local government units and technical-vocational institutions in the skills development of the country's human resources.</p>
                    <p>The merging of the National Manpower and Youth Council (NMYC) of the Department of Labor and Employment (DOLE). The Bureau of Technical and Vocational Education (BTVE) of the Department of Education, Culture and Sports (DECS), and The Apprenticeship Program of the Bureau of Local Employment (BLE) of the DOLE gave birth to TESDA.</p>
                    <p>The fusion of the above offices was one of the key recommendations of the 1991 Report of the Congressional Commission on Education, which undertook a national review of the state of Philippine education and manpower development. It was meant to reduce overlapping in skills development activities initiated by various public and private sector agencies, and to provide national directions for the country's technical-vocational education and training (TVET) system. Hence, a major thrust of TESDA is the formulation of a comprehensive development plan for middle-level manpower based on the National Technical Education and Skills Development Plan. This plan shall provide for a reformed industry-based training program that includes apprenticeship, dual training system and other similar schemes.</p>
                    <h3>TESDA is mandated to:</h3>
                    <li>Integrate, coordinate and monitor skills development programs;</li>
                    <li>Restructure efforts to promote and develop middle-level manpower;</li>
                    <li>Approve skills standards and tests;</li>
                    <li>Develop an accreditation system for institutions involved in middle-level manpower development;</li>
                    <li>Fund programs and projects for technical education and skills development; and</li>
                    <li>Assist trainers training programs.</li>
                    <br>
                    <h3>At the same time, TESDA is expected to:</h3>
                    <li>Devolve training functions to local governments;</li>
                    <li>Reform the apprenticeship program;</li>
                    <li>Involve industry/employers in skills training;</li>
                    <li>Formulate a skills development plan;</li>
                    <li>Develop and administer training incentives;</li>
                    <li>Organize skills competitions; and</li>
                    <li>Manage skills development funds.</li>
                    <br>
                    <p>Overall, TESDA formulates manpower and skills plans, sets appropriate skills standards and tests, coordinates and monitors manpower policies and programs, and provides policy directions and guidelines for resource allocation for the TVET institutions in both the private and public sectors.</p>
                    <p>Today, TESDA has evolved into an organization that is responsive, effective and efficient in delivering myriad services to its clients. To accomplish its multi-pronged mission, the TESDA Board has been formulating strategies and programs geared towards yielding the highest impact on manpower development in various areas, industry sectors and institutions.</p>
                </div>
            </div>
        </section>
        <section data-aos="fade-up" class="mt-0 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <img class="img-fluid" src="images/org.png" alt="about" >
                    </div>
                    <div class="col-lg-4">
                        <img class="img-fluid" src="images/orgs.jpg" alt="about" >
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php' ?>
</body>
</html>