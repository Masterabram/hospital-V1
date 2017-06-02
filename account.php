<?php
session_start();
 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 

?>
<?php
$username = $_SESSION['username'];
    // echo $_SESSION['username'];
if (isset($_POST['update_password'])){

      $password1 =  $_POST['password1'];
      $password2 =  $_POST['password2'];

    if ($password1 == $password2){  

    mysqli_select_db($connection, $database) or die(mysql_error());

     $query = "UPDATE staff SET password='{$password1}' ";
     $query .= " WHERE username ='{$username}' ";
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;
      $_SESSION['message'] = "pasword updated successfully";
    }else{

      $_SESSION['message'] = "Password Does Not match !! NOT UPDATED";

    }
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
<!--                     <li><a href="Admin.php"> <span class="glyphicon glyphicon-home"></span> HOME</a></li>
 -->                 <li><a href="#">My account</a></li>
                    <!-- <li><a href="registration.php">Add Staff</a></li> -->
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
<!-- 
                            <?php
                              // $patient_set = mysqli_fetch_assoc(find_patient($patient_id));
                              // pre($patient_set);
                            ?> -->
                              
                        <?php echo messages(); ?>

                        <div class="panel-body .alert alert-info"> CHANGE PASSWORD</div>
                                            <div class="panel-footer">
                                                <form method="post" action="account.php" enctype="multipart/form-data">
                                                  <ul class="list-group">
                                                            <div class="input-group input-group-sm">
                                                                  <span class="input-group-addon">New password</span>
                                                                  <input type="text" class="form-control" size="20" name="password1" placeholder="NEW PASSWORD" required>
                                                            </div>
                                                            <br />

                                                            <div class="input-group input-group-sm">
                                                                    <span class="input-group-addon">confirm password</span>
                                                                    <input type="text" class="form-control" size="20" name="password2" placeholder="CONFIRM NEW PASSWORD" required>
                                                            </div>
                                                            <br />

                                                            <div class="input-group input-group-sm">
                                                                    
                                                              <input type="submit" class="btn btn-primary btn-block" name="update_password" value="Update Password">
                                                            </div>
                                                            <br />
                                                  </ul>
                                                </form>
                                            </div>
                         
                    </PANEL>
                     
                     
              
                  </div>         
         
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                  <?php

                  $username = $_SESSION['username'];
                    $staff = mysqli_fetch_assoc(find_staffs($username));
                    // pre($patient_set);
                  ?>

                <div class="alert alert-info">
                 <?php 
                    if ($_SESSION['image'] == ! null){
                      // echo "There it is";
                      echo '<img  src="images/staff_profile/'.$_SESSION['image'].'" class="img-circle" alt="profile pick" width="60px" height="60px" >';
                    }else{
                      echo '<img  src="images/staff_profile/404.jpg" class="img-circle" alt="profile pick" width="60px" height="60px" >';
                    } 
                ?>
                <br>
                <?php echo ucwords($staff['name']); ?>
                </div>
                
                 <ul class="list-group">
                    <li class="list-group-item"><strong>USERNAME: </strong> <?php echo ($staff['username']); ?></li>
                    <li class="list-group-item"><strong>STAFF ID: </strong> <?php echo ($staff['ID']); ?></li>
                    <li class="list-group-item"><strong>DEPERTMENT :</strong> <?php echo ($staff['depertment']); ?></li>
                    <li class="list-group-item"><strong>CONTACT: </strong><?php echo ($staff['contact']); ?></li>
                    <li class="list-group-item"><strong>SEX</strong> <?php echo ($staff['sex']); ?></li>
                    <li class="list-group-item"><strong>DATE OF BIRTH: </strong><?php echo ($staff['dob']); ?></li>
                    <li class="list-group-item"><strong>EMAIL: </strong> <?php echo ($staff['email']); ?></li>
                  </ul>
               
                
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
