<?php
     session_start();

 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator</title>

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
    <nav class="navbar navbar-inverse navbar-fixed-top .alert alert-success" style="position:absolute" role="navigation">
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
                    <li><a href="Admin.php">HOME</a></li>
                    <li><a href="account.php">My account</a></li>
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
            
            <table class="table table-hover" width="700" align="centre" cellpaddinng="10">
                  <tr>
                    <th width="140" scope="col">PATIENT NAME</th>
                    <th width="60" scope="col">CHECKOUT</th>
                    <th width="100" scope="col">RECEPTION</th>
                    <th width="100" scope="col">NURSE</th>
                    <th width="100" scope="col">DOCTOR</th>
                    <th width="100" scope="col">LABORATORY</th>
                    <th width="100" scope="col">PHARMACY</th>
                  </tr>
                  
                  <?php

                    $visit_set = staff_activity(1, $current_page);
                  // pre($patient_set);
                    while($visit = mysqli_fetch_assoc($visit_set)){
                  ?>
                  
                  <tr>
                    <td><?php echo ucwords ($visit['name']); ?></td>
                    <td><?php echo ($visit['checkout']); ?></td>
                    <td><?php echo ucwords ($visit['reception']); ?></td>
                    <td><?php echo ucwords ($visit['nurse']); ?></td>
                    <td><?php echo ucwords ($visit['doctor']); ?></td>
                    <td><?php echo ucwords ($visit['lab']); ?></td>
                    <td><?php echo ucwords ($visit['phermacy']); ?></td>
                  </tr>
                  <?php
					}
				  ?>
                  
             </table>
  <hr>
    <?php
      $pages = ceil(mysqli_num_rows(staff_activity(0, $current_page)) / 20);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="staff_activity.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
    ?> 

            
          </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="alert alert-info"><?php
                                $t=time();
                                
                                echo(date("Y-m-d g:i:s A",$t));

                                
                                ?>
                </div>
                
                <h5 class="alert alert-success">Staff attendance count</h5>
                
                      <table width="350" class="table">
                        <tr>
                          <th scope="col" width="160">Staff Name</th>
                          <th scope="col" width="60">Staff ID</th>
                          <th scope="col" width="130">Quntity attended</th>
                        </tr>
                        <?php

                          $allvisits = find_staff(1, $current_page);
                  
                          while($all = mysqli_fetch_assoc($allvisits)){

                        ?>
                        <tr>
                          <td><?php echo ($all['name']); ?></td>
                          <td><?php echo ($all['ID']); ?></td>
                          <td>Not available now</td>
                        </tr>
                        <?php
                            }
                        ?>

                      </table>
       <hr>
    <?php
      $pages = ceil(mysqli_num_rows(find_staffs(0, $current_page)) / 5);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="staff_activity.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
    ?> 
               
                
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
          <div class="col-lg-12 .alert alert-danger">
                <div style="float:left" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                  <table width="600" border="0" align="center">
                  <tr>
                    <th scope="row"> 
                    <div style="float:left; width:500" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    					
                                     <ul class="nav navbar-nav .nav nav-tabs nav-justified ">
                    
                                        <li><a href="reception.php">Reception</a></li>
                                        <li><a href="visitque.php">Nurse</a></li>
                                        <li><a href="doctor.php">Dctor</a></li>
                                        <li><a href="lab.php">Laboratory</a></li>
                                        <li><a href="phermacy.php">Phermacy</a></li>
                                        
                                    </ul>
                     </div>
                    </th>
                  </tr>
                </table>
 
                  
            
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-success">Copyright &copy; Abraham Mcogol 2016</p>
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
