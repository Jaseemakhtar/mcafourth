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
    <title><?= $deptName ?></title>
    <style>
        table, td, th{
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Boring Company Database</h1>
    <h3><?= $deptName . "'s Employees" ?></h3>
    <table>
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
</body>
</html>