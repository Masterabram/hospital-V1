<?php
  session_start();
 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 

?>

<?php

if (isset($_POST ['submit'])){
   
      $surname = $_POST['sname'];
      $oname = $_POST['oname'];
      $id = $_POST['id'];
      $email = $_POST['email'];
      $tel =(int) $_POST['tel'];
      $sex = $_POST['SEX'];
      $fuculty = $_POST['fuculty'];
      $course = $_POST['course'];
      $dob = $_POST['dob'];
      $address = $_POST['address'];

      mysqli_select_db($connection, $database) or die(mysql_error());

      $query = "INSERT INTO receptiomadd (Sname, othername, ID, email, contact, sex, address, fuculty, course, dob) VALUES ('{$surname}', '{$oname}', '{$id}', '{$email}', '$tel', '{$sex}', '{$address}', '{$fuculty}', '{$course}', '{$dob}')" ;
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;
      redirect_to('visitadd.php?patient_id='.$id);
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

    <title>RECEPTION</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">
    <script src="js/jquery-2.0.3.min.js"></script>
    <!-- // <script src="js/jquery-ui.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/npm.js"></script>
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
       
      <!-- new form -->
        <form action="reception.php" method="post" autocomplete="off">
          <table width="600" align="centre"><tr><td>
            <div class="panel-body .alert alert-info">Register new patient</div>
            <div class="input-group input-group-sm" >
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input type="text" class="form-control" name="sname" placeholder="First name" required>
            </div>
            <br />    
            
            <div class="input-group input-group-sm">
                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                  <input type="text" class="form-control" name="oname" placeholder="Last name" required>
            </div>
            <br />
            
            <div class="input-group input-group-sm">
                  <span class="input-group-addon">@</span>
                  <input type="email" class="form-control" name="email"  placeholder="Email" required>
            </div>
            <br />
            
            <div class="input-group input-group-sm">
                  <span class="input-group-addon glyphicon glyphicon-phone"></span>
                  <input type="text" class="form-control" name="tel" placeholder="Mobile" >
            </div>
            <br />
            
            <div class="input-group input-group-sm">
                  <span class="input-group-addon">ID</span>
                  <input type="text" class="form-control" name="id"  placeholder="Reg./ Admission No" required>
            </div>
            <br />
            
            <div class="input-group input-group-sm">
                  <span class="input-group-addon">Address</span>
                  <input type="text" class="form-control" name="address" placeholder="Address/ Hostel" required>
            </div>
            <br /> 

            <div class="input-group">
                  <span class="input-group-addon"> D.O.B</span>
                  <input type='text' class="form-control" name="dob" placeholder="YYYY/MM/DD" required>
            </div>
            <br />

            <div class="input-group input-group-sm">
                  <span class="input-group-addon">sex</span>
                  <select name="SEX" class="form-control" required>
                    
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                
                  </select>
            </div>
            <br />

            <div class="input-group input-group-sm">
                  <span class="input-group-addon">Fuculty</span>
                  <select name="fuculty" class="form-control" required>
                    
                        <option value="M">Computing</option>
                        <option value="F">medicine</option>
                
                  </select>
            </div>
            <br />

            <div class="input-group input-group-sm">
                  <span class="input-group-addon">Course</span>
                  <input type="text" class="form-control" name="course" placeholder="eg. BSc IT" required>
            </div>
            <br /> 

            <div class="input-group input-group-sm">
                  <input name="submit" type="submit" class="pull-centre" id="submit" value="+ Add Patient">
            </div>
            <br /> 

            </td></tr></table>        

      </form>
<!-- end of form -->
            
          </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
              <!-- alert  -->
              <?php echo messages(); ?>

       <!-- <div class="alert alert-info">BOOKED APPOINTMENTS</div>    -->     
        <div class="panel panel-default">
            <div class="panel-body .alert alert-info">BOOKED APPOINTMENTS</div>
            <div class="panel-footer">
              <table width="340" border="0">
            <tr>
              <th width="120">NAME</th>
              <th width="100">CONTACT</th>
              <th width="100">DATE</th>
            </tr>
          </table>
          <p>&nbsp;</p>
          <table width="350" border="0" class="table-striped" align="centre">
            

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

              
            
          </table></div>
          </div>
          </PANEL>
        <!-- </form> -->
        <hr>
    <?php
      $pages = ceil(mysqli_num_rows(find_books(0, $current_page)) / 20);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="reception.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
    ?> 

        <hr>

        <ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href="reception.php">Home</a></li>
                      <li><a href="patient_list.php">Patient List</a></li>
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
    
    <!-- Bootstrap Core JavaScript -->
    

</body>

</html>
