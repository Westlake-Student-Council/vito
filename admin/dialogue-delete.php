<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
error_reporting(E_ALL);

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["user_loggedin"]) || $_SESSION["user_loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Process delete operation after confirmation
if(isset($_POST["dialogue_id"]) && !empty($_POST["dialogue_id"])){
  
    require "../classes/DialogueDeletion.php";
    $obj = new DialogueDeletion($_POST["dialogue_id"]);

    if($obj->deleteDialogue()) {
        header("location: dashboard.php");
        exit();
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Check existence of id parameter
    if(empty(trim($_GET["dialogue_id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Felix Chen">

    <link rel="icon" type="image/png" href="../assets/images/dog.png">
    
    <title>Delete Q&A</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/libraries/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="../assets/libraries/carousel.css" rel="stylesheet"> -->

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        main {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <main>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header" style="text-align:center;">
                            <h1>Delete Q&A</h1>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="alert alert-danger" style="text-align:center;">
                                <p>Are you sure you want to delete this Q&A?</p>
                                <br>
                                <p>
                                    <input type="hidden" name="dialogue_id" value="<?php echo trim($_GET["dialogue_id"]); ?>"/>
                                    <input type="submit" value="Yep." class="btn btn-danger">
                                    <a href="dashboard.php" class="btn btn-secondary">Never mind.</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap Core JavaScript -->
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/libraries/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/libraries/jquery-slim.min.js"><\/script>')</script>
    <script src="../assets/libraries/popper.min.js"></script>
    <script src="../assets/libraries/bootstrap.min.js"></script>

</body>
</html>
