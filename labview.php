<?php
 session_start();

 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 
?>

<?php
  if(isset($_GET['visit_id'])){
        $visit_id = $_GET['visit_id'];
  }else{
      // redirect_to('lab.php');

      echo "NO ID FOUND";
    }
?>

<?php
      if (isset($_POST['update_lab_result'])){
          pre($_POST);

          // $visit = mysqli_fetch_assoc(find_visit($visit_id));
          $visit_id = $visit['visit_id'];

      
      $result1 =  $_POST['result1'];
      $result2 =  $_POST['result2'];
      $result3 =  $_POST['result3'];
      $labnote =  $_POST['labnote'];
      $lab =  $_POST['lab'];


        mysqli_select_db($connection, $database) or die(mysql_error());

     $query = "UPDATE visits SET result1='{$result1}', result2='{$result2}', result3='{$result3}', labnote='{$labnote}', lab='{$lab}' ";
     $query .= " WHERE visit_id ='{$visit_id}' ";
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;
      $_SESSION['message'] = "Reuest read in wait list";
      redirect_to('lab.php');
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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="ckeditor/ckeditor.js"></script>
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
                     
                        <li class="list-group-item">TEST 1<strong> :<?php echo $visit['test1']; ?></strong></li>
                     
                        <li class="list-group-item">TEST 2<strong> :<?php echo $visit['test2']; ?></strong></li>
                     
                        <li class="list-group-item">TEST 3<strong> :<?php echo $visit['test3']; ?></strong></li>
                      
                        <li class="list-group-item">Doctors Notes<strong>: <?php echo $visit['notes']; ?> </strong></li>
                    
              </ul>

         
       
<form class="navbar-form" method="post" action="labview.php?ID=<?php echo $visit['ID']; ?>">
        <table width="300" border="1" class="table table-striped">
                  <input type="hidden" value="<?php echo $visit['visit_id']; ?>" name="visit_id" />
                  <input type="hidden" name="lab" value="<?php echo $_SESSION['name']; ?>" />
                  <tr>
                    <td>Lab test Results;</td>
                  </tr>
                  <tr>
                    <td>Test 1 :
                    <input type="text" name="result1" id="T1"></td>
                  </tr>
                  <tr>
                    <td>Test 2 :
                    <input type="text" name="result2" id="T2"></td>
                  </tr>
                  <tr>
                    <td>Test 3 :
                    <input type="text" name="result3" id="textfield6"></td>
                  </tr>
                  <tr>
                    <td>Lab results notes</td>
                  </tr>
                  <tr>
                    <td><textarea cols="45" row="5" name="labnote" wrap="hard" id="labnot" style="resize:none"></textarea></td>
                  </tr>
                </table>
            <p>
                        <script>
            CKEDITOR.replace( 'labnote' );
                              </script>
              
            <table width="300" border="0">
              <tr>
                <td width="141"><input class="btn primary" name="update_lab_result" type="submit"  value="Submit Result"></td>
              </tr>
            </table>
     </form>
            
          </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
               
<table width="350" border="0">
            <tr>
              <th width="70">Patient ID</th>
              <th width="40">visitID</th>
              <th width="200">Patient name </th>
              <th width="40">check</th>
            </tr>
          </table>
          <p>&nbsp;</p>
          <table width="350" border="0" class="table-striped" align="centre">
            

                 <?php
                    $visit_set = find_labs(1, $current_page);
                  // pre($patient_set);
                    while($visit = mysqli_fetch_assoc($visit_set)){
                  ?>
                    <tr>
                      <td width="70"><a href="labview.php?visit_id=<?php echo $visit['visit_id']; ?>"> <?php echo ($visit['ID']); ?> </a></td>
                      <td width="40"><?php echo ($visit['visit_id']); ?></td>
                      <td width="200"> <?php echo ucwords($visit['name']); ?></td>
                      <td width="40"><input type="checkbox" name="check" id="check"
                      <?php
                            if($visit['result1']!=null){
                              echo "checked";
                            }
                          ?> ></td>
                    </tr>
                  <?php
                    }
                  ?>

              
            
          </table>
        </form>
        <hr>
    <?php
      $pages = ceil(mysqli_num_rows(find_labs(0, $current_page)) / 20);
      for($page=1;$page<=$pages;$page++){
    ?>
      <a href="labview.php?page=<?php echo $page?>"><?php echo $page; ?></a>
    <?php
      }
    ?> 

        <hr>

        <ul class="nav nav-pills nav-stacked">
                      <li><a href="doctor.php">Home</a></li>
                      <li  class="active"><a href="resultset.php">Laboratory results</a></li>
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
