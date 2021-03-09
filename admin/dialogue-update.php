<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
ini_set('log_errors',1);
error_reporting(E_ALL);

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["user_loggedin"]) || $_SESSION["user_loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$dialogue_id = "";

if(isset($_GET["dialogue_id"]) && !empty(trim($_GET["dialogue_id"]))){
    $dialogue_id = $_GET["dialogue_id"];
} else {
    header("location: dashboard.php");
    exit();
}

require "../classes/DialogueUpdate.php";
$obj = new DialogueUpdate($dialogue_id);
$obj->loadCurrentDialogueDetails();

// Define variables and initialize with empty values
$question = $obj->getQuestion();
$answer = $obj->getAnswer();
$inquirer_name = $obj->getInquirerName();
$email_address = $obj->getEmailAddress();
$is_answered = $obj->getIsAnswered();

$question_error = "";
$answer_error = "";
$inquirer_name_error = "";
$email_address_error = "";
$is_answered_error = "";


// Processing form data when form is submitted
if(isset($_POST["dialogue_id"]) && !empty($_POST["dialogue_id"])){

    // Validate inquirer_name
    $inquirer_name = trim($_POST["inquirer_name"]);
    $inquirer_name_error = $obj->setInquirerName($inquirer_name);

    // Validate email_address
    $email_address = trim($_POST["email_address"]);
    $email_address_error = $obj->setEmailAddress($email_address);

    // Validate question 
    $question = trim($_POST["question"]);
    $question_error = $obj->setQuestion($question);

    // Validate answer 
    $answer = trim($_POST["answer"]);
    $answer_error = $obj->setAnswer($answer);

    // Check is_public
    $is_answered = trim($_POST["is_answered"]);
    $is_answered_error = $obj->setIsAnswered($is_answered);

    // Check input errors before inserting in database
    if(empty($inquirer_name_error) 
    && empty($email_address_error) 
    && empty($question_error) 
    && empty($answer_error) 
    && empty($is_answered_error) 
    ) {
        if($obj->updateDialogue()) {
            header("location: dashboard.php");
            exit();
        } 
        else {
            echo "Something went wrong. Please try again later.";
        }
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

    <title>Update Q&A</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/libraries/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/libraries/carousel.css" rel="stylesheet">

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
                        <div class="page-header">
                            <h2>Update Event</h2>
                        </div>
                        <p>Please edit the input values and submit to update the Q&A.</p>
                    
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                            <!--field for inquirer_name-->
                            <div class="form-group <?php echo (!empty($inquirer_name_error)) ? 'has-error' : ''; ?>">
                                <label><b>First Name of Person Asking Question</b></label>
                                <input readonly name="inquirer_name" class="form-control" value="<?php echo $inquirer_name; ?>">
                                <span class="help-block"><?php echo $inquirer_name_error;?></span>
                            </div>

                            <!--field for email_address-->
                            <div class="form-group <?php echo (!empty($email_address_error)) ? 'has-error' : ''; ?>">
                                <label><b>Email Address of Person Asking Question</b></label>
                                <input readonly name="email_address" class="form-control" value="<?php echo $email_address; ?>">
                                <span class="help-block"><?php echo $email_address_error;?></span>
                            </div>

                            <!--field for question-->
                            <div class="form-group <?php echo (!empty($question_error)) ? 'has-error' : ''; ?>">
                                <label><b>Question Content</b></label>
                                <textarea type="text" name="question" class="form-control"><?php echo $question; ?></textarea>                          
                                <span class="help-block"><?php echo $question_error;?></span>
                            </div>

                            <!--field for answer-->
                            <div class="form-group <?php echo (!empty($answer_error)) ? 'has-error' : ''; ?>">
                                <label><b>Answer Content</b></label>
                                <textarea type="text" name="answer" class="form-control"><?php echo $answer; ?></textarea>                          
                                <span class="help-block"><?php echo $answer_error;?></span>
                            </div>

                            <!--field for is_answered-->
                            <div class="form-group <?php echo (!empty($is_answered_error)) ? 'has-error' : ''; ?>">
                                <label for="is_answered"><b>Is this ready to be displayed in the FAQs?&nbsp;</b></label>
                                <input type="radio" name="is_answered" value="0" <?php if($is_answered==0){echo "checked";}?>> Not yet.&nbsp;&nbsp;
                                <input type="radio" name="is_answered" value="1" <?php if($is_answered==1){echo "checked";}?>> Yes!
                                <span class="help-block"><?php echo $is_answered_error;?></span>
                            </div>

                            <input type="hidden" name="dialogue_id" value="<?php echo $dialogue_id; ?>"/>
                            <input type="submit" class="btn btn-primary" value="Update!">
                            <a href="dashboard.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../footer.php';?>
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
