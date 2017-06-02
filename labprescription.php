<?php
session_start();
 require_once('Connections/database_connection.php');
 include_once('includes/functions.php'); 
?>
<?php
	if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
      }else{
      //redirect_to('resultset.php');
      }
?>
<?php
		if (isset($_POST['submit'])){
      			// pre($_POST);

	  
	   $visit = mysqli_fetch_assoc(find_visit($ID));
	     $visit_id = $visit['visit_id'];

       $prescription = $_POST['prescribe'];
       $visit_id = $_POST['visit_id'];
      
      mysqli_select_db($connection, $database) or die(mysql_error());

     $query = "UPDATE visits SET prescription='{$prescription}' ";
     $query .= "WHERE ID ='{$ID}' ";
      
      
      $result =  mysqli_query($connection, $query);
      confirm_query($result);
      // echo $patient_id;
      //redirect_to('resultset.php');
    }
?>

<!doctype html>
<html>
<head>
<title>Prescription</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="//cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
</head>
<body>
<div id="main">
<div id="login">
<h2>PRESCRIPTION FORM</h2>
<div class="bg-primary" >PRESCRIBE DRUGS</div>
<form action="labprescription.php" method="post">

				<?php
                $visit = mysqli_fetch_assoc(find_visit($ID));
                $patient  = mysqli_fetch_assoc(find_patient($visit['ID']));
              ?>
<label>Name :<?php echo ucwords($patient['Sname']." ".$patient['othername']); ?></label><br />
<label>ID :<?php echo $visit['ID']; ?></label><br />
<label>Prescription :</label>
<input type="hidden" name="visit_id" value="<?php echo $visit_id; ?>"/>
<textarea  name="prescribe" id="prescribe" placeholder="write prescription here"> </textarea>
<input name="submit" type="submit" value=" Submit prescription ">
</form>
            <p><script>
            CKEDITOR.replace( 'prescribe' );
                              </script></p>
</div>
</div>
</body>
</html>