<?php
    $dep = $_GET['dep'];

    if($dep == 1)
        $deptName = "Information Department";
    else if($dep == 2)
        $deptName = "Sales Department";
    else if($dep == 3)
        $deptName = "Operations Department";
    else
        $deptName = "Research & Development Department";

    $employees = $projects = '';

    include('connection.php');
    $sqlP = "SELECT count(*) AS projects FROM programeight.project WHERE dep = $dep";
    $sqlE = "SELECT count(*) AS employees FROM programeight.employee WHERE depId = $dep";

    $result = mysqli_query($conn, $sqlP);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $projects = $row['projects'];
        }
    }

    $result = mysqli_query($conn, $sqlE);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $employees = $row['employees'];
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $deptName ?></title>
</head>
<body>
    <h1>Boring Company Database</h1>
    <h3><?= $deptName ?></h3>
    <ul>
        <li>
            <a href="projectView.php?id=<?= $dep ?>">Projects&nbsp;<span>(<?= $projects ?>)</span></a>
        </li>
        <li>
            <a href="empView.php?id=<?= $dep ?>">Employees&nbsp;<span>(<?= $employees ?>)</span></a>
        </li>
    </ul>
</body>
</html>