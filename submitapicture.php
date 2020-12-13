<!doctype html>
<html>
<head>
    <title>Vito - Submit a Picture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('header.php')?>
    <div class="content">
    <h3>Submit a Picture</h3>
    
    <form action="submitted.php" method="post">
        <!-- identification -->
        What is your picture? <br>
        <input type="text" class="fname" title="fname" id="fname" name="fname"
                value="<?php
                if (isset($_POST['fname']))
                    echo $_POST['fname']
                ?>" >
        <!-- labeling the input & keep the values filling in
            in case of errors -->
		
        <input type="submit" title="submit">
    </form>
    </div>
</body>
</html>