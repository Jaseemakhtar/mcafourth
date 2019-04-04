<?php
    $dep = $_GET['id'];

    if($dep == 1)
        $deptName = "Information Department";
    else if($dep == 2)
        $deptName = "Sales Department";
    else if($dep == 3)
        $deptName = "Operations Department";
    else
        $deptName = "Research & Development Department";

    $projects = array();

    include('connection.php');

    $sql = "SELECT id, fname, lname, depId FROM programeight.employee WHERE depId = $dep";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $projects[] = $row;
        }
    }


    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $deptName ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        table, td, th{
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 10px;">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <div class="navbar-brand">Boring Company Database</div>
            </div>
        </nav>
        <div class="alert alert-success" role="alert"><?= $deptName . "'s Employees" ?></div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department Id</th>
            </tr>
            <?php 
                for($i = 0; $i < count($projects); $i++){ 
                    echo '<tr>';
                    echo "<td>" . $projects[$i]['id'] . " </td>" ;
                    echo "<td>" . $projects[$i]['fname'] . " </td>" ;
                    echo "<td>" . $projects[$i]['lname'] . " </td>" ;
                    echo "<td>" . $projects[$i]['depId'] . " </td>" ;
                    echo '</tr>';
                } 
            ?>
                
        </table>
        <footer>
            <h5 align="center" >Made with <span style="color: #fc3f5e; font-size: 1.3em;">&hearts;</span></h5>
            <h5 align="center" >by <a style="text-decoration: none; color: inherit;" href="https://jaseemakhtar.github.io"   >Jaseemakhtar &copy;</a></h6>
        </footer>
    </div>
</body>
</html>