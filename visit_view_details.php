<?php
     session_start();

 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 
?>
<?php
  if (isset($_GET['ID'])){
      $ID = $_GET['ID'];
  }else{
    // redirect_to('doctor.php');
    // echo "No ID Here";
  }
?>
<?php
  if (isset($_GET['visit_id'])){
      $visit_id = $_GET['visit_id'];
  }else{
    // redirect_to('doctor.php');
    // echo "No ID Here";
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


            
            <table width="700" height="412" align="center">
                <tr>
                    <?php  
                    

                     $all = mysqli_fetch_assoc(find_all($visit_id));
                     
                    

                     ?>

                  <td width="397" class="alert alert-info"><h3>HUDUMA HEALTH</h3></td>
                </tr>
                <tr>
                  <td><strong><?php echo ucwords($all['name']); ?></strong> of ID <?php echo ($all['ID']); ?> 
                    Atended maseno university hospital on <?php echo ($all['timestamp']); ?></td>
                </tr>
                <tr>
                  <td>He was examined by <i><?php echo ($all['nurse']); ?></i> and <i><?php echo ("DR"." ".$all['doctor']); ?></i>. 
                    He had the following symptoms <?php echo ($all['symptoms']); ?>  </td>
                </tr>
                <tr> 
                  <td>he/she was tested for  <?php echo ($all['test1']." " .$all['test2']." ". $all['test3']); ?> by <i><?php echo ($all['lab']); ?></i> and was 
                    dianosed with <?php echo ($all['result1']." , " .$all['result2']." and ". $all['result3']); ?> </td>
                </tr>
                <tr>
                  <td>he was given the following  drugs <?php echo ($all['prescription']); ?></td>
                </tr>
                <tr>
                  <td>Thank you hop you enjoyed our service </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>Yu were served by <?php echo $_SESSION['name']; ?></td>
                </tr>
                <tr>
                  <td><button class="btn btn-primary btn-block" href="#"> ! <span class="glyphicon glyphicon-print"></span> ! </button></td>
                </tr>
              </table>

            
          </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="alert alert-info"><?php
                                $t=time();
                                
                                echo("DATE"." " .date("d - m - Y",$t));

                                
                                ?>
                </div>
                <?php
                // $visit = mysqli_fetch_assoc(find_visit($ID));
                //  $patient  = mysqli_fetch_assoc(find_patient($visit['ID']));

                //               $allvisits  = mysqli_fetch_assoc(find_all_visits($visit['ID']));
                        
                ?>
                <h5 class="alert alert-success">Here is <strong> <?php echo ucwords($all['name']); ?> </strong> visit details</h5>
                <form>
                      <table width="300" border="0">
                        <tr>
                          <th scope="col" width="140">VISIT DATE</th>
                          <th scope="col" width="60">VISIT ID</th>
                          <th scope="col" width="100">DELETE VISIT</th>
                        </tr>
                        <?php

                          $allvisits = find_all_visits($all['ID']);
                  
                          while($all = mysqli_fetch_assoc($allvisits)){

                        ?>
                        <tr>
                          <td><?php echo ($all['timestamp']); ?></td>
                          <td> <a href="visit_view_details.php?visit_id=<?php echo $all['visit_id']; ?>"> <?php echo ($all['visit_id']); ?></a></td>
                          <td><span class="glyphicon glyphicon-trash"></span></td>
                        </tr>
                        <?php
                          }
                        ?>
                      </table>
                </form
                
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
