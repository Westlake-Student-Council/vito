<!doctype html>
<html>
<head>
    <title>Vito - Asked a Q</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('header.php')?>
    <div class="content">
    <h3>Thank</h3>
	<p>
    Now you can go view others' questions <a class="here" href="index.php">here</a>
    <!-- link to the table -->
	</p>
<?php
require ('mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Identification
    //first name
    $fname = mysqli_real_escape_string($dbcon,
        trim($_POST['fname']));
    //email
    $email = mysqli_real_escape_string($dbcon,
        trim($_POST['email']));
    //question
    $question = mysqli_real_escape_string($dbcon,
        trim($_POST['question']));
    //answer
    $answer = null;
    //amnswered
    $answered = false;
    //date
    // $date = 
    // not  needed hopefully
        
    //send all the info to the database
    $q = "INSERT INTO 
            QuestionTable (fname, email, question, answer, answered, date)
          VALUES
                  ('$fname','$email','$question','$answer','$answered',now())";
    $result = @mysqli_query($dbcon, $q);
    mysqli_close($dbcon);
    //close the connection to the server
    //since we are done
    exit();
}
//end of if statement of request method equaling post
?>

</body>
</html>