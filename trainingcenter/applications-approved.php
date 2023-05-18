<?php
    session_start();
    if(!isset($_SESSION['tcid'])&&!isset($_SESSION['tcusername'])){
      header('location: ../trainingcenter/index.php');
    }
    $_SESSION['nav-actives'] = 'applications';
    $tcid = $_SESSION['tcid'];
    include 'connection.php';
    $applications = [];
    $appquerry = "SELECT * FROM applications Where tcid = '$tcid' And status = 'Approved' Order By id desc";
    $appresult = $conn->query($appquerry);
    while($row = $appresult->fetch_assoc()){
        $applications[] = $row; 
    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>Applications - Tesda Training Center</title>
      <?php include 'links.php' ?>
      <style>
         .tbtn{
            border: none;
            outline: none;
            padding: 2px 10px;
            box-shadow: 0 0 3px 0 black;
            background: transparent;
            border-radius: 4px;
            cursor: pointer;
         }
         .tbtn:hover{
            box-shadow: 0 0 5px 0 black;
         }
      </style>
   </head>
   <body>
      <?php include 'header.php' ?>
      <?php include 'sidebar.php' ?>
      <main id="main" class="main">
         <?php if(isset($_SESSION['tmessage'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $_SESSION['tmessage']; ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['tmessage']); ?>
         <?php endif ?>
         <div class="pagetitle">
            <h1>Applications</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Review</li>
                  <li class="breadcrumb-item active">Applications</li>
               </ol>
            </nav>
         </div>
         <section class="section dashboard">
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                        <div class="filter">
                              <a class="icon" href="#" data-bs-toggle="dropdown">
                                 <i class="bi bi-three-dots"></i></a>
                              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                 <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="applications.php">All</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="applications-approved.php">Approved</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="applications-pending.php">Pending</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="applications-rejected.php">Rejected</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="card-body">
                              <h5 class="card-title">
                                 Recieved Applications
                              </h5>
                              <table class="table-borderless datatable">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Application For</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($applications as $row): ?>
                                    <tr>
                                       <td><?= $row['first_name'] ?> <?= $row['last_name'] ?></td>
                                       <td><?= $row['qualification'] ?></td>
                                       <td><?= $row['date'] ?></td>
                                       <td>
                                          <span style="font-size: 15px" class="badge border-primary border-1 text-<?= $row['status'] == 'Approved' ? 'success' : ($row['status']=='Rejected' ? 'danger' : 'warning') ?>"
                                             ><?= $row['status'] ?></span
                                          >
                                       </td>
                                       <td>
                                          <form action="viewer.php" method="post">
                                             <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                                             <button class="tbtn">view</button>
                                          </form>
                                       </td>
                                    </tr>
                                    <?php endforeach ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </section>
      </main>
      <?php include 'footer.php' ?>
   </body>
</html>
