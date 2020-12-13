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
    <p>Before you consider asking a question,
        please check out Vito's 
        <a href="faqs.php">FAQs</a>
        and other questions students have asked.</p>
    <form action="submitted.php" method="POST">
        <!-- identification -->
        What is your first name? <br>
        <input type="text" class="fname" title="fname" id="fname" name="fname"
                value="<?php
                if (isset($_POST['fname']))
                    echo $_POST['fname']
                ?>" >
        <!-- labeling the input & keep the values filling in
            in case of errors -->

        <br> What is your email?
        <br><div class="tinytext">This is in case Officer Peals wants clarification with your question.</div>
        <input type="email" class="email" title="email" id="email" name="email"
                value="<?php
                if (isset($_POST['email']))
                    echo $_POST['email']
                ?>" >

        <br> What is your question? <br>
        <textarea type="text" class="question" title="question" id="question" name="question"
               rows="4" cols="58" value="<?php
               if (isset($_POST['question']))
                   echo $_POST['question']
               ?>" ></textarea>
        <br>
        <input type="submit" title="submit">
    </form>
    </div>
</body>
</html>