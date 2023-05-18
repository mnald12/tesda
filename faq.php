
<?php

session_start();

$_SESSION['nav-active'] = 'faq';

include 'connection.php';

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <?php include 'components/header.php' ?>
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <main id="main">
        <section id="faq" class="faq">
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
    </main>
    <?php include 'components/footer.php' ?>
</body>
</html>