<?php

session_start();

$_SESSION['nav-active'] = 'dropdown2';

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centers</title>
    <?php include 'components/header.php' ?>
</head>
<body>
    <?php include 'components/navbar.php' ?>
      <main id="main">
         <section id="training" class="training">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <p>Training Centers</p>
               </div>

               <div class="container mb-3">
                  <div class="row justify-content-center">
                     <div class="col-lg-8">
                        <input
                           id="train"
                           type="text"
                           class="form-control"
                           onkeyup="search()"
                           placeholder="Search here..."
                        />
                     </div>
                  </div>
               </div>
               <div class="row justify-content-md-center align-items-center" id="tc">
                <?php foreach( $training as $row): ?>
                  <div class="col-lg-8 p-2 list">
                     <a class="p-3" href="trainingcenter.php?id=<?= $row['id'] ?>"><?= $row['center'] ?></a>
                  </div>
                <?php endforeach ?>
               </div>
            </div>
         </section>
         <section id="assessment" class="assessment">
            <div class="container" data-aos="fade-up">
               <div class="section-title">
                  <p>Assessment Centers</p>
               </div>
               <div class="container mb-3">
                  <div class="row justify-content-center">
                     <div class="col-lg-8">
                        <input
                           id="assess"
                           onkeyup="search2()"
                           type="text"
                           class="form-control"
                           placeholder="Search here..."
                        />
                     </div>
                  </div>
               </div>
               <div class="row justify-content-md-center align-items-center" id="ac">
                <?php foreach( $assessment as $row): ?>
                  <div class="col-lg-8 p-2 list2">
                     <a class="p-3" href="assessmentcenter.php?id=<?= $row['id'] ?>"><?= $row['center'] ?></a>
                  </div>
                <?php endforeach ?>
               </div>
            </div>
         </section>
      </main>
      <?php include 'components/footer.php' ?>
      <script>
         const search = () => {
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
