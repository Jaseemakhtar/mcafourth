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

    $sql = "SELECT id, name, location, dep FROM programeight.project WHERE dep = $dep";

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
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    
    <h1>Boring Company Database</h1>
        
    <h3><?= $deptName . "'s Projects" ?></h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Project Name</th>
            <th>Location</th>
            <th>Department Id</th>
        </tr>
        <?php 
            for($i = 0; $i < count($projects); $i++){ 
                echo '<tr>';
                echo "<td>" . $projects[$i]['id'] . " </td>" ;
                echo "<td>" . $projects[$i]['name'] . " </td>" ;
                echo "<td>" . $projects[$i]['location'] . " </td>" ;
                echo "<td>" . $projects[$i]['dep'] . " </td>" ;
                echo '</tr>';
            } 
        ?>
                
    </table>
</body>
</html>