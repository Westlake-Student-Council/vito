<!doctype html>
<html>
    <head>
        <title>Vito - Ask A Question</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php include('header.php')?>

        <div class="content">
            <h3>Ask A Question</h3>
            <p>Before you consider asking a question, please check out Vito's 
                <a href="faqs.php">FAQs</a>
                and other questions students have asked.
            </p>

            <form action="submitted.php" method="POST">
                <!-- identification -->
                <p>What is your first name?<\p><br>
                <input type="text" class="fname" title="fname" id="fname" name="fname" 
                    value=
                        "<?php
                            if(isset($_POST['fname']))
                            echo $_POST['fname']
                        ?>"><br>
                <!-- labeling the input & keep the values filling in
                    in case of errors -->

                <p>What is your email?</p><br>
                <div class="tinytext"><p>This is in case Officer Peals wants clarification with your question.</p></div>
                <input type="email" class="email" title="email" id="email" name="email"
                        value=
                            "<?php
                                if(isset($_POST['email']))
                                echo $_POST['email']
                            ?>"><br>

                <p>What is your question?</p><br>
                <textarea type="text" class="question" title="question" id="question" name="question" rows="4" cols="58" 
                    value=
                       "<?php
                            if(isset($_POST['question']))
                            echo $_POST['question']
                        ?>" >  
                </textarea><br>
                <input type="submit" title="submit">
            </form>
        </div>
    </body>
</html>