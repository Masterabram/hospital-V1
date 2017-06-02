<?php
 session_start();

 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 
?>
<?php

if(isset($_GET['visit_id'])){
        $visit_id = $_GET['visit_id'];
    }
?>

<?php

    if (isset($_POST ['submit'])){
      
      // pre($_POST);

      $visit_id =(int) $_POST['visit_id'];
	    // $age =(int) $_POST['age'];
      // $ID = $_POST['ID'];
      $nurse = $_POST['nurse'];
      $bp = $_POST['bp'];
      $temp = $_POST['temp'];
      $weight = $_POST['weight'];
      $height = $_POST['height'];
    
      
      mysqli_select_db($connection, $database) or die(mysql_error());

     $query = "UPDATE visits SET bp='{$bp}', temp='{$temp}', weight='{$weight}', height='{$height}', nurse='{$nurse}' ";
     $query .= " WHERE visit_id ={$visit_id} ";
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;
      $_SESSION['message'] = "Details added successfully";

      redirect_to('visitque.php');
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

    <title>NURSE</title>

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
                    
                    <li><a href="reception.php">Home</a></li>
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
    	
        <form class="navbar-form" method='POST' action='visitdetails.php' autocomplete="off">
  
        <table width="300" border="0" align="center" class="table-striped">
               <?php 
                 $visit = mysqli_fetch_assoc(find_visit($visit_id));
                 
                 ?>
                 <input type="hidden" name="visit_id" value="<?php echo $visit_id; ?>"/>
                 <input type="hidden" name="nurse" value="<?php echo $_SESSION['name']; ?>" >
              <tr>
                <td width="300"><table width="289" height="121" border="0" align="center">
                  <tr>
                    <th width="116" height="41" scope="row">Patient Name</th>
                    <td width="118">: <?php echo ucwords($visit['name']); ?></td>
                  </tr>
                  <tr>
                    <th height="39" scope="row">Patient ID</th>
                    <td>:<?php echo ($visit['ID']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Visit ID</th>
                    <td>: <?php echo ($visit['visit_id']); ?></td>
                  </tr>
                </table>
                <p><input name="visit_id" type="hidden" id="visit_id" value="<?php echo $visit['visit_id']; ?>"></p></td>
              </tr>
              <tr>
                <!-- <td><input name="age" type="text" required class="StyleTextField" id="age" placeholder="age"></td> -->
              </tr>
              <tr>
                <td><input name="bp" type="text" required class="StyleTextField" id="bp" placeholder="blood pressure"></td>
              </tr>
              <tr>
                <td><input name="temp" type="text" required class="StyleTextField" id="temp" placeholder="temperature"></td>
              </tr>
              <tr>
                <td><input name="weight" type="text" class="StyleTextField" id="weight" placeholder="weight(kg)"></td>
              </tr>
              <tr>
                <td><input name="height" type="text" class="StyleTextField" id="height" placeholder="height in(cm)"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="25"><table width="124" border="0" align="center">
                  <tr>
                      <td><input name="submit" type="submit" class="btn-lg" id="submit" value="+ Add visit details"></td>
                  </tr>
                </table></td>
              </tr>
          </table>
        </form>
     
        
  </div>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="alert alert-success">Copyright &copy; Abraham Mcogol 2016</p>
                </div>
            </div>
        </footer>
</html>