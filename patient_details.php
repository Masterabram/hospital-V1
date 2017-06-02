<?php
session_start();
 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 

?>

<?php
  if(isset($_GET['page'])){
    $current_page = $_GET['page'] - 1;
  }else{
    $current_page = 0;
  }
?>

<?php
  if(isset($_GET['patient_id'])){
    $patient_id = $_GET['patient_id'];
  }else{
    // $current_page = 0;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="position:absolute" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">classs</span>
                    <span class="icon-bar">dream</span>
                    <span class="icon-bar">Love</span>
                </button>
               
               <h2>
                <?php 
                 if ($_SESSION['image'] == ! null){
                      // echo "There it is";
                      echo '<img  src="images/staff_profile/'.$_SESSION['image'].'" class="img-circle" alt="profile pick" width="60px" height="60px" >';
                    }else{
                      echo '<img  src="images/staff_profile/404.jpg" class="img-circle" alt="profile pick" width="60px" height="60px" >';
                    }  
                    echo "  "; echo $_SESSION['name'];
                ?>
               </h2>
                
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div style="float:right" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="Admin.php"> <span class="glyphicon glyphicon-home"></span> HOME</a></li>
                    <li><a href="#">My account</a></li>
                    <li><a href="registration.php">Add Staff</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out </a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
          <div class="col-md-8">


            
    <form class="navbar-form" action="reception.php" method="POST">
      <table width="600" align="centre" border="0" class="table-striped">
        <tr>
          <th width="180" scope="col">PATIENT ADM NO:</th>
          <th width="300" scope="col">PATIENT NAME</th>
          <th width="120" scope="col">PATIENT CONTACT</th>
          </tr>
              <?php
                    $patient_set = find_patients(1, $current_page);
                  // pre($patient_set);
                    while ($patient = mysqli_fetch_assoc($patient_set)){
                  ?>
                      <strong><tr>
                        <td><a  href="patient_details.php?patient_id=<?php echo $patient['ID']; ?>"> <?php echo ($patient['ID']); ?><a/></td>
                        <td><?php echo ucwords ($patient['Sname']. " ". $patient['othername']); ?></td>
                        <td><?php echo ($patient['contact']); ?></td>
                      </tr></strong>
                      
                      <?php
                    }
                  ?>
        </table>
        <hr>
    </form>
    <?php
      $pages = ceil(mysqli_num_rows(find_patients(0, $current_page)) / 20);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="patient_list.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
    ?>

            
          </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
              <?php echo messages(); ?>
              <form>
                  <?php
                    $patient_set = mysqli_fetch_assoc(find_patient($patient_id));
                    // pre($patient_set);
                    $id = $patient_set['ID'];
                    // echo $id;
                  ?>

                <div class="alert alert-info">
                 <?php 
                 if ($patient_set['image'] == ! null){
                      // echo "There it is";
                      echo '<img  src="images/patient_profile/'.$patient_set['image'].'" class="img-circle" alt="profile pick" width="80px" height="80px" >';
                    }else

                      // echo "No image found";
                      echo '<img src="images/default_patient.png" class="img-circle" alt="profile pick" width="80px" height="80px" >';
 
                ?>
                <br>
                <?php echo ucwords($patient_set['Sname']." ".$patient_set['othername']); ?>
                </div>
                
                 <ul class="list-group">
                    <li class="list-group-item"><strong>REG No:</strong> <?php echo ($patient_set['ID']); ?></li>
                    <li class="list-group-item"><strong>COURSE:</strong> <?php echo ($patient_set['course']); ?></li>
                    <li class="list-group-item"><strong>FUCULTY:</strong><?php echo ($patient_set['fuculty']); ?></li>
                    <li class="list-group-item"><strong>SEX : </strong> <?php echo ($patient_set['sex']); ?></li>
                    <li class="list-group-item"><strong>CONTACT: </strong><?php echo ($patient_set['contact']); ?></li>
                    <li class="list-group-item"><strong>EMAIL: </strong> <?php echo ($patient_set['email']); ?></li>
                    <li class="list-group-item"><strong>HEALTH INFORMATION: </strong> <?php echo ($patient_set['health_info']); ?></li>
                    <li class="list-group-item"><strong> <a class="btn btn-primary btn-block" href="patient_edit.php?patient_id=<?php echo $id ; ?>" > Edit Information </a></strong></li>
                  </ul>
               
                </form>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
       
        <!-- /.row -->

        

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-danger">Copyright &copy; Abraham Mcogol 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
