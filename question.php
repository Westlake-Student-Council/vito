<?php
$page_name = "question";

require "classes/DialogueCreation.php";
$obj = new DialogueCreation();

$inquirer_name = "";
$email_address = "";
$question = "";

$inquirer_name_error = "";
$email_address_error = "";
$question_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $inquirer_name = trim($_POST["inquirer_name"]);
    $inquirer_name_error = $obj->setInquirerName($inquirer_name);
    
    $email_address = trim($_POST["email_address"]);
    $email_address_error = $obj->setEmailAddress($email_address); 

    $question = trim($_POST["question"]);
    $question_error = $obj->setQuestion($question);

    if(empty($inquirer_name_error) && empty($email_address_error) && empty($question_error)) {
        if($obj->addDialogue()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later. If the issue persists, send an email to westlakestuco@gmail.com detailing the problem.";
        }
    }
}
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Felix Chen">

    <link rel="icon" type="image/png" href="assets/images/dog.png">

    <title>Vito - Ask a Question!</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/libraries/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/libraries/carousel.css" rel="stylesheet">

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
    <?php include "header.php"; ?>

    <main role="main">
        <div class="wrapper">
            <div class="page-header">
                <h2>Ask a Question!</h2>
            </div>
            <p>Have a question for Vito? Fill this form out!<br> Make sure you've read our <strong><a href="faqs.php">FAQs</a></strong> first to see if your question has already been answered!</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!--field for inquirer name-->
                <div class="form-group <?php echo (!empty($inquirer_name_error)) ? 'has-error' : ''; ?>">
                    <label>What's your first name?</label>
                    <input type="text" name="inquirer_name" class="form-control" value="<?php echo $inquirer_name; ?>">
                    <span class="help-block"><?php echo $inquirer_name_error;?></span>
                </div>

                <!--field for email address-->
                <div class="form-group <?php echo (!empty($email_address_error)) ? 'has-error' : ''; ?>">
                    <label>What's your email address?</label>
                    <input type="text" name="email_address" class="form-control" value="<?php echo $email_address; ?>">
                    <span class="help-block"><?php echo $email_address_error;?></span>
                </div>

                <!--field for question-->
                <div class="form-group <?php echo (!empty($question_error)) ? 'has-error' : ''; ?>">
                    <label>What's your question?</label>
                    <textarea type="text" name="question" class="form-control"><?php echo $question; ?></textarea>
                    <span class="help-block"><?php echo $question_error;?></span>
                </div>

                <input type="submit" class="btn btn-primary" value="Ask!">
                <a href="index.php" class="btn btn-default">Cancel</a>
            </form>
        </div>  

        <!-- FOOTER -->
        <?php include "footer.php"; ?>
    </main>

    <!-- Bootstrap Core JavaScript -->
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/libraries/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/libraries/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/libraries/popper.min.js"></script>
    <script src="assets/libraries/bootstrap.min.js"></script>

</body>
</html>