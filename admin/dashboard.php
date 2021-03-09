<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["user_loggedin"]) || $_SESSION["user_loggedin"] !== true){
    header("location: login.php");
    exit;
}

require '../classes/DialogueReader.php';
$obj = new DialogueReader();
$dialogues = $obj->getDialogues();
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Felix Chen">

    <link rel="icon" type="image/png" href="../assets/images/dog.png">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/libraries/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        main {
            margin-top: 100px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .wrapper{
            margin: 0 auto;
        }

        .page-header h2{
            margin-top: 0;
        }

        td {
            text-align:center;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Vito</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                </ul> 

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="wrapper">
            <?php if($dialogues): ?>
                <table class='table table-bordered' id='dialogues'>
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>My Answer</th>
                            <th>Who Asked It?</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dialogues as $dialogue): ?>
                        <tr style="background-color:<?php if($dialogue['is_answered']) echo "#97f50a"; ?>" >
                            <td>
                              <?php echo $dialogue['question']; ?>
                            </td>
                            <td>
                                <?php echo $dialogue['answer']; ?>
                            </td>
                            <td>
                                <?php echo $dialogue['inquirer_name']; ?>
                                <br>
                                <a href="mailto:<?php echo $dialogue['email_address'];?>"class="btn btn-link" >Send an email</a>
                            </td>
                            <td>
                                <a href=<?php echo "dialogue-update.php?dialogue_id=".$dialogue['dialogue_id']; ?> title='Update Q&A' class='btn btn-primary'>Update</a>
                                <a href=<?php echo "dialogue-delete.php?dialogue_id=".$dialogue['dialogue_id']; ?> title='Delete Q&A' class='btn btn-danger'>Delete</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>There are no dialogues at the moment. Come back soon!</p>
            <?php endif; ?>
        </div>
        
        <!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <!-- <p class="float-right"><a href="#">Back to top</a></p> -->
            <!-- <p>© 2021 Felix Chen</p> -->
        </footer>
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