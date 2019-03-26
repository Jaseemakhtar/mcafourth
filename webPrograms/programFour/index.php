<?php
    $cookie_name = "lastVisited";
    $cookie_value = date("h:m:s",time());
    $expiry = time() + (60 * 60 * 2); //Will expire after 2 hours
    setcookie($cookie_name, $cookie_value, $expiry, "/");
?>
<html>
    <body>
        <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Welcome! You've visited for the first time.";
        } else {
            echo "Last Visited On: " . $_COOKIE[$cookie_name];
        }
        ?>
    </body>
</html> 
