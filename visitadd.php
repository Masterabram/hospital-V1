<?php
  
  @session_start();

 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 

?>

<?php
  if(isset($_GET['patient_id'])){
    $patient_id = $_GET['patient_id'];
  }else{
   
   echo "No ID FOUND";
    // redirect_to('reception.php');
  }
?>

<?php
                $patient_set = mysqli_fetch_assoc(find_patient($patient_id));
                $ID = $patient_set['ID'];
?>

<?php
    
 $dob = $patient_set['dob'];
    // echo $dob; 
# procedural
$age = date_diff(date_create($dob), date_create('today'))->y;
// echo $age;

    if (isset($_POST ['submit'])){
   
      $visit_id = $_POST['visit_name'];
      $p_id = $_POST['p_id'];
      $name = $_POST['name'];
      $reception = $_SESSION['name'];
     

      mysqli_select_db($connection, $database) or die(mysql_error());

      $query = "INSERT INTO visits ( ID, reception, name, age ) VALUES ('{$p_id}', '{$reception}', '{$name}', '{$age}')" ;
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;

      $_SESSION['message'] = "The visit has been created succesfully!";

      redirect_to('reception.php');
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

    <title>RECEPTION</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">
    <link href="css/contentsys.css" rel="stylesheet" type="text/css" />

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
                    
                    <li><a href="reception.php.php">HOME</a></li>
                    <li><a href="account.php">My account</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out </a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div id="colorbar"></div>
<div id="content">

    
 <div id="centre" >
   <form class="navbar-form" method="post" action="visitadd.php">
      <table width="300" border="0" align="center" class="table-striped">
            <tr>
              <?php



                $patient_set = mysqli_fetch_assoc(find_patient($patient_id));
                // pre($patient_set);
              ?>
              <td></td>
            </tr>
            <tr>
              <td>
                <table width="284" border="0" align="center">

                  <tr>
                    <th scope="row">PATIENT ID</th>
                    <td><?php echo $patient_set['ID']; ?></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td></td>
            </tr>

                <input type="hidden" name="reception" value="<?php echo $_SESSION['name']; ?>" >
            <td> <input type="hidden" name="p_id" value="<?php echo $patient_set['ID']; ?>" >  </td>
            <tr>
            </tr>
            <tr>
              
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
                <?php
                
                 $patient  = mysqli_fetch_assoc(find_patient($patient_id));

                  $allvisits  = mysqli_fetch_assoc(find_all_visits($patient['ID']));
            
                ?>
                <input type="hidden" name="name" value="<?php echo ucwords($patient['Sname']." ".$patient['othername']); ?>" />
                <h5 class="alert alert-success">Previous visits by: <strong> <?php echo ucwords($patient['Sname']." ".$patient['othername']); ?></strong></h5>
                
                      <table width="300" class="table" align="center">
                        <tr>
                          <th scope="col" width="140">VISIT DATE</th>
                          <th scope="col" width="60">VISIT ID</th>
                          <th scope="col" width="100"> VIEW </th>
                        </tr>
                        <?php

                          $allvisits = find_all_visits($patient['ID']);
                  
                          while($all = mysqli_fetch_assoc($allvisits)){

                        ?>
                        <tr>
                          <td><?php echo ($all['timestamp']); ?></td>
                          <td> <?php echo ($all['visit_id']); ?></td>
                          <td><a  class="btn btn-primary btn-block disabled" href="#"> VIEW </a></td>
                        </tr>
                        <?php
                          }
                        ?>
                      </table>
                
                
            </div>
            <tr>
              <td><table width="124" border="0" align="center">
                <tr>
                  <td><input name="submit" type="submit" class="btn-lg" id="submit" formmethod="POST" value="Create New Visit"></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </form>
     
        
  </div>
</div>
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