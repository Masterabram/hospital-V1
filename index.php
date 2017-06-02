<?php 
  require_once('Connections/database_connection.php'); 
  include_once('includes/functions.php');
?>

<?php
  if(isset($_POST['comment'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";

    $comment = $_POST['comments'];

    $query = "INSERT INTO comment (comment) VALUES ('{$comment}') ";
    $result =  mysqli_query($connection, $query);
    confirm_query($result);

    redirect_to ('index.php');
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

    <title>HUDUMA HEALTH</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

<script type="text/javascript">
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var strcount
var x = new Date()
var x1=x.toUTCString();// changing the display to UTC string
document.getElementById('ct').innerHTML = x1;
document.getElementById('ct').style.fontSize='20px';
document.getElementById('ct').style.color='#EA4335';



tt=display_c();
}
</script>

</head>

<body onload=display_ct();>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top .active" style="position:absolute" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">classs</span>
                    <span class="icon-bar">dream</span>
                    <span class="icon-bar">Love</span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="Assets/web1.jpg" alt="" width="75" height="60">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div style="float:right" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="#"> <span class="glyphicon glyphicon-home"></span> About </a>
                    </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="bookapp.php">Appointment Booking</a>
                            </li>
                            <li>
                                <a href="counsel.php">Counselling Forums</a>
                            </li>
                            <li>
                                <a href="#">In patient</a>
                            </li>
                            <li>
                                <a href="#">What we dont cover</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="loginindex.php"><span class="glyphicon glyphicon-log-in"></span> Sign in </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div style="margin-top:20; height:100;"></div>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill"> <img src="Assets/img1.jpg" width="900" height="350"></div>
                <div class="carousel-caption">
                    <h2>Your Health</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill">  <img src="Assets/img2.png" width="900" height="350"> </div>
                <div class="carousel-caption">
                    <h2>Our Priority</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill">  <img src="Assets/web1.jpg" width="900" height="350"> </div>
                <div class="carousel-caption">
                    <h2>My joy</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill">  <img src="Assets/img5.jpg" width="900" height="350"> </div>
                <div class="carousel-caption">
                    <h2>My joy</h2>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="alert alert-info" >
                                <span id="ct" ></span>
                </div>
                <h1>Huduma health service centre</h1>
                <p>Huduma health centre is a privatly owned hospital sponsord by Mcogol & Son's Limited</p>
                <p>Book an appointmet today and visist us</p>
                <a class="btn btn-primary btn-lg" href="bookapp.php">Book Appointment !</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center . alert alert-danger">
                   call us today 24/7 @ 0790563533  email : huduma@mydomain.com
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2>Adverticement</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                \ Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae,
                 suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor 
                 consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Adverticement</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe 
                    rem nisi accusamus error velit animi non ipsa placeat. Recusandae, 
                    suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi
                     dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Leave comment</h2>
                <form class="navbar-form navbar-default" method="POST" action="index.php">
       
                    <table width="300" border="0px">
                          <tr>
                            <td><textarea style="resize:none" cols="30" height="30" name="comments" wrap="hard" id="comment"></textarea></td>
                          </tr>
                          <tr>
                            <td><input type="submit" class="btn btn-default" name="comment" value="Submitt Comment"> </td>
                          </tr>
                    </table>
                </form>
                
            </div>
            <!-- /.col-md-4 -->
        </div>
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

     <script>
    $('.carousel').carousel({
        interval: 2500 //changes the speed
    })
    </script>

</body>

</html>
