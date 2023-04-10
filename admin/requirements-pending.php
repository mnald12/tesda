<?php
    session_start();
    if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){
        header('location: ../admin/index.php');
    }
    $_SESSION['nav-active'] = 'requirements';
    include 'connection.php';
    $requirements = [];
    $reqquerry = "SELECT * FROM certificates Where status = 'Pending' Order By id desc";
    $reqresult = $conn->query($reqquerry);
    while($row = $reqresult->fetch_assoc()){
        $requirements[] = $row; 
    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0" name="viewport" />
      <title>Requirements - Tesda Admin</title>
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
                  <li class="breadcrumb-item active">Requirements</li>
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
                                    <a class="dropdown-item" href="requirements.php">All</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="requirements-approved.php">Approved</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="requirements-pedning.php">Pending</a>
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="requirements-rejected.php">Rejected</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="card-body">
                              <h5 class="card-title">
                                 Recieved Requirements
                              </h5>
                              <table class="table-borderless datatable">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>For</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach($requirements as $row): ?>
                                    <tr>
                                       <td><?= $row['name'] ?></td>
                                       <td><?= $row['req_for'] ?></td>
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
