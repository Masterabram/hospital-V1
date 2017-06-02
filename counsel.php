<?php 
  require_once('Connections/database_connection.php'); 
  include_once('includes/functions.php');
?>

<?php
  if(isset($_POST['comment'])){
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Basic</h3>
                    </div>
                    <div class="panel-body">
                       <span class="period"><sup>under 20</sup>YOUTH</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>5</strong> members</li>
                        <li class="list-group-item">sharing problems </li>
                        <li class="list-group-item">youth dockets</li>
                        <li class="list-group-item">Spending leisure</li>
                        <li class="list-group-item">ralationship advice</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Sign Up!</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Plus <span class="label label-success">Best Value</span></h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>$</sup>39<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>10</strong> User</li>
                        <li class="list-group-item"><strong>500</strong> Projects</li>
                        <li class="list-group-item"><strong>Unlimited</strong> Email Accounts</li>
                        <li class="list-group-item"><strong>1000GB</strong> Disk Space</li>
                        <li class="list-group-item"><strong>10000GB</strong> Monthly Bandwidth</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Sign Up!</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ultra</h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>$</sup>159<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Unlimted</strong> Users</li>
                        <li class="list-group-item"><strong>Unlimited</strong> Projects</li>
                        <li class="list-group-item"><strong>Unlimited</strong> Email Accounts</li>
                        <li class="list-group-item"><strong>10000GB</strong> Disk Space</li>
                        <li class="list-group-item"><strong>Unlimited</strong> Monthly Bandwidth</li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary">Sign Up!</a>
                        </li>
                    </ul>
                </div>
            </div>            
        </div>
        </div>


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
