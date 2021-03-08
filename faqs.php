<?php
$page_name = "faqs";
require "classes/DialogueReader.php";
$obj = new DialogueReader();
$dialogues = $obj->getAnsweredDialogues();
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Felix Chen">

    <link rel="icon" type="image/png" href="assets/images/dog.png">

    <title>Vito - FAQs</title>

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
            <?php if($dialogues): ?>
            <div class="accordion" id="accordion">
                <?php 
                $cardCount = 0;
                foreach ($dialogues as $dialogue):
                    $cardCount++;
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $cardCount;?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $cardCount;?>" aria-expanded="false" aria-controls="collapse<?php echo $cardCount;?>">
                            <?php echo $dialogue["question"]; ?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?php echo $cardCount;?>" class="collapse" aria-labelledby="heading<?php echo $cardCount;?>" >
            
                        <div class="card-body">
                            <?php echo $dialogue["answer"]; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>There are no questions at the moment. Come back soon!</p>
        <?php endif; ?>
        </div>

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <!-- <p>© 2021 Felix Chen</p> -->
        </footer>
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