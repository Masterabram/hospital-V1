<?php
 session_start();

 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 
?>

<?php
  if(isset($_GET['visit_id'])){
        $visit_id = $_GET['visit_id'];
  }else{
      // redirect_to('doctor.php');

      echo "No ID HERE" ;
    }
?>

<?php
    
    if (isset($_POST['submit'])){
      
      // pre($_POST);

      $visit_id = $_POST['visit_id'];
      $prescription = $_POST['prescription'];
      $test1 = $_POST['test1'];
      $test2 = $_POST['test2'];
      $test3 = $_POST['test3'];


        pre($_POST);
    
      
      mysqli_select_db($connection, $database) or die(mysql_error());

     $query = "UPDATE visits SET prescription='{$prescription}', test1='{$test1}', test2='{$test2}', test3='{$test3}' ";
     $query .= "WHERE visit_id ='{$visit_id}' ";
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;
      $_SESSION['message'] = "Referal succesful";
      redirect_to('doctor.php');
    }

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

    <title>DOCTOR</title>
    <script src="ckeditor/ckeditor.js"></script>

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
                    <li><a href="doctor.php"> <span class="glyphicon glyphicon-home"></span> HOME</a></li>
                    <li><a href="account.php">My account</a></li>
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


            
    
        <p>&nbsp;</p>

                <?php  
                 $visit = mysqli_fetch_assoc(find_visit($visit_id));
                 
                ?>
                  <ul class="list-group">
                      
                        <li class="list-group-item">PATIENT ID<strong> : <?php echo $visit['ID']; ?></strong></li>
                     
                        <li class="list-group-item">PATIENT NAME<strong> : <?php echo ucwords($visit['name']); ?></strong></li>
                     
                        <li class="list-group-item">TEMPERATURE<strong> :<?php echo $visit['temp']; ?> *C</strong></li>
                     
                        <li class="list-group-item">PRESSURE<strong> :<?php echo $visit['bp']; ?> mmHg</strong></li>
                     
                        <li class="list-group-item">AGE<strong> :<?php echo $visit['age']; ?> yrs</strong></li>
                      
                        <li class="list-group-item">WEIGHT<strong>: <?php echo $visit['weight']; ?> kg</strong></li>
                    
              </ul>

      
<form method="post" action="prescription.php?ID=<?php echo $visit['ID']; ?>">
   
      <input type="hidden" name="visit_id" value="<?php echo $visit['visit_id']; ?>" /> 
        <table width="280" border="1" class="table table-striped">
                  <tr>
                    <td>Write prescription:</td>
                  </tr>
                  <tr>
                    <td><textarea cols="45" row="5" style="resize:none" name="prescription" wrap="hard" id="symptoms"></textarea></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
          </table>
          <p>
          <script>
            CKEDITOR.replace( 'prescription' );</script></p>
 
  
      <table width="280" border="0" class="table table-striped">
                  <tr>
                    <td>Test to be performed:</td>
                  </tr>
                  <tr>
                    <td>Test 1</td>
                  </tr>
                  <tr>
                  <td>
                    <select name="test1" >
                      <option value="null">--Test 1--</option>
                        <option value="malaria">Malaria</option>
                        <option value="typhoid">Typhoid</option>
                        <option value="Tuberclosis">TB</option>
                        <option value="Mulnutrition">Nutrition</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td>Test 2:</td>
                  </tr>
                  <tr>
                    <td><select name="test2" >
                      <option value="null">--Test2--</option>
                        <option value="malaria">Malaria</option>
                        <option value="typhoid">Typhoid</option>
                        <option value="Tuberclosis">TB</option>
                        <option value="Mulnutrition">Nutrition</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td>Test 3</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="test3" placeholder="specify other test " /></td>
                  </tr> 
                  <tr>
                    <td><input type="submit" class="btn btn-primary btn-lg" name="submit" id="to lab" value=" Refer " ></td>
                  </tr>
          </table>
     </form>
            
          </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <?php echo messages(); ?>
            <div class="panel panel-default">
                    <div class="panel-body .alert alert-info">IMPORTANT PATIENT HEALTH INFORMATION</div>
                        <div class="panel-footer">
                         
                              <?php
                                $patient_set = mysqli_fetch_assoc(find_patient($visit['ID']));
                                // pre($patient_set);
                              ?>
                        
                              <ul class="list-group">
                                <li class="list-group-item">
                                  <?php

                                    if ($patient_set['health_info'] == ! null){

                                      echo ($patient_set['health_info']);
                                    }else

                                      echo "Not available" ; 
                                      ?>
                                    </li>
                              </ul>

                        </div>
                  </div>
          </PANEL>

        <hr>

        <ul class="nav nav-pills nav-stacked">
                      <li><a href="doctor.php">Home</a></li>
                      <li><a href="resultset.php">Laboratory results</a></li>
                      <li><a href="account.php">My account</a></li>
                      <li><a href="logout.php">Log Out</a></li>
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
