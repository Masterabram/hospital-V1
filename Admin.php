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
    <nav class="navbar navbar-inverse navbar-fixed-top .alert alert-info" style="position:absolute" role="navigation">
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
                    <li class="active"><a href="admin.php"> Home </a></li>
                    <li><a href="account.php?">My account</a></li>
                    <li><a href="registration.php">Add Staff</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out </a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- END OF THE NAV -->

        <!-- Call to Action Well -->
        <div class="row">
          <div class="col-lg-12 .alert alert-danger">

                                        
                                     <ul class="nav navbar-nav .nav nav-tabs nav-justified ">
                    
                                        <li><a href="reception.php">Reception</a></li>
                                        <li><a href="visitque.php">Nurse</a></li>
                                        <li><a href="doctor.php">Doctor</a></li>
                                        <li><a href="lab.php">Laboratory</a></li>
                                        <li><a href="phermacy.php">Phermacy</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Additional pages<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="Admin_view_staff.php">Staff</a>
                                                </li>
                                                <li>
                                                    <a href="patientlist.php">Patient List</a>
                                                </li>
                                                <li>
                                                    <a href="#">Booked Counselling</a>
                                                </li> 
                                                <li>
                                                    <a href="staff_activity.php">Staff Activity</a>
                                                </li>    
                                        </li>
                                        
                                    </ul>
                    
            
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

<BR>
    <hr>
    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
            
            <table width="620 auto" class="table" align="centre">
                  <tr>
                    <th width="82" scope="col">PATIENT ID</th>
                    <th width="56" scope="col">VISIT ID</th>
                    <th width="157" scope="col">NAME</th>
                    <th width="105" scope="col">CATEGORY</th>
                    <th width="106" scope="col">CHECK IN</th>
                    <th width="72" scope="col">CHECK </th>
                  </tr>
                  
                  <?php

                    $visit_set = find_visits(1, $current_page);
                  // pre($patient_set);
                    while($visit = mysqli_fetch_assoc($visit_set)){
                  ?>
                 
                  <tr>
                    <td><a href="advipatvisits.php?ID=<?php echo $visit['ID']; ?>"> <?php echo ($visit['ID']); ?> </a></td>
                    <td><?php echo ($visit['visit_id']); ?></td>
                    <td><?php echo ucwords($visit['name']); ?></td>
                    <td>To be defined</td>
                    <td><?php echo ($visit['timestamp']); ?></td>
                    <td><input type="checkbox" name="check" id="check"
                          <?php
                            if($visit['checkout']!=null && $visit['bp']!=null){
                              echo "checked";
                            }
                          ?> ></td>
                  </tr>
                  <?php
					}
				  ?>
                  
             </table>
<hr>
<?php
      $pages = ceil(mysqli_num_rows(find_visits(0, $current_page)) / 20);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="Admin.php?page=<?php echo $page?>"><?php echo $page; ?></a>
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
                
                <div class="panel panel-default">
                    <div class="panel-body .alert alert-info">STAFF ATTENDANCE QUANTITY</div>
                        <div class="panel-footer">

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
      $pages = ceil(mysqli_num_rows(find_staff(0, $current_page)) / 15);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="Admin.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
?>

                         </div>
                    </div>
                </PANEL>       


            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>



        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body .alert alert-info">BOOKED APPOINTMENTS</div>
                        <div class="panel-footer">
                                    <table width="350" class="table">
                                            <tr>
                                              <th width="160">NAME</th>
                                              <th width="100">CONTACT</th>
                                              <th width="90">DATE</th>
                                            </tr>
                                        <?php
                                            $visit_set = find_books(1, $current_page);
                                          // pre($patient_set);
                                            while($visit = mysqli_fetch_assoc($visit_set)){
                                        ?>
                                            <tr>
                                              <td width="120"><?php echo ($visit['name']); ?> </td>
                                              <td width="100"><?php echo ($visit['tell']); ?></td>
                                              <td width="100"> <?php echo $visit['date']; ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
<hr>
<?php
      $pages = ceil(mysqli_num_rows(find_books(0, $current_page)) / 5);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="Admin.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
?>
                        </div>
                    </div>
                </PANEL>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Adverticement</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe 
                    rem nisi accusamus error velit animi non ipsa placeat. Recusandae, 
                    suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                     dolor consectetur.</p>
                <a class="btn btn-default .disabled" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body .alert alert-info"> COMMENTS </div>
                        <div class="panel-footer">
                            <table width="200" class="table">
                             
                              <tr>
                                <th scope="col">TIME</th>
                                <th scope="col">COMMENT</th>
                              </tr>
                              
                              <?php

                                $comment_set = find_comments(1, $current_page);
                              
                                while($comment = mysqli_fetch_assoc($comment_set)){
                              ?>
                              <tr>
                                <td><?php echo ($comment['timestamp']); ?>;</td>
                                <td><?php echo ($comment['comment']); ?></td>
                              </tr>
                              <?php
            					}
            				  ?>
                            </table>
<hr>
<?php
      $pages = ceil(mysqli_num_rows(find_comments(0, $current_page)) / 4);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="Admin.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
?>
                        </div>
                    </div>
                </PANEL>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-info">Copyright &copy; Abraham Mcogol 2016</p>
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
