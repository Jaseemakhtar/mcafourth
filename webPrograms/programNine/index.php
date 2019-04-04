<?php
    include('connection.php');
    $sql = "SELECT ssn FROM programnine.employee";
    $result = mysqli_query($conn, $sql);
    $ssns = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $ssns[] = $row;
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Program Nine</title>
    <style>
        *{
            font-family: Arial;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Select SSN to view the details of an Employee </h2>
    <form method="get" action="details.php">
        <select name="ssn">
            <?php
                 for($i = 0; $i < count($ssns); $i++){ 
                    echo '<option value="'. $ssns[$i]['ssn'] . '">' . $ssns[$i]['ssn'] . '</option>';
                }
            ?>
        </select>
        <hr>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>