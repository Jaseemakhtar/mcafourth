<?php
    session_start();
    $counter = 1;
    $session_name = "pageCount";
?>
<html>
    <head>
        <style>
            body{
                font-family: Arial;
            }
        </style>
        <title>Session Demonstration</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION[$session_name])) {
                $counter = $_SESSION[$session_name];
                $_SESSION[$session_name] = ++$counter;
                echo "<h2><center>No. of Visits: " . $_SESSION[$session_name] . "</center></h2>";
            } else {
                $_SESSION[$session_name] = $counter;
                echo "<h2><center>Welcome! You've visited for the first time.</center></h2>";
            }
        ?>
    </body>
</html> 
