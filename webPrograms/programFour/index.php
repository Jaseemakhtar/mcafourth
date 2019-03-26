<?php
    $cookie_name = "lastVisited";
    $cookie_value = date("h:m:s",time());
    $expiry = time() + (60 * 60 * 2); //Will expire after 2 hours
    setcookie($cookie_name, $cookie_value, $expiry, "/");
?>
<html>
    <head>
        <style>
            body{
                font-family: Arial;
            }
        </style>
        <title>Cookie Demonstration</title>
    </head>
    <body>
        <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "<h2><center>Welcome! You've visited for the first time.</center></h2>";
        } else {
            echo "<h2><center>Last Visited On: " . $_COOKIE[$cookie_name] . "</center></h2>";
        }
        ?>
    </body>
</html> 
