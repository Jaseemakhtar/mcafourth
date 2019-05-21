<?php
    $ssn = $_GET['ssn'];
    include('connection.php');
    $sql = "SELECT ssn, fname, lname, email, phone, address FROM programnine.employee WHERE ssn = '$ssn' ";
    $result = mysqli_query($conn, $sql);
    $emp = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $emp[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Program Nine</title>
    <style>
        *{
            font-family: Arial;
        }
        td, tr, th{
            border: 1px solid #ddd;
            padding: .4em;
        }
        table{
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <div>
        <h2> Employee details of SSN = <?= $emp[0]['ssn'] ?> </h2>
        <table>
            <tr>
                <th>SSN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            <tr>
                <td><?= $emp[0]['ssn'] ?></td>
                <td><?= $emp[0]['fname'] ?></td>
                <td><?= $emp[0]['lname'] ?></td>
                <td><?= $emp[0]['email'] ?></td>
                <td><?= $emp[0]['phone'] ?></td>
                <td><?= $emp[0]['address'] ?></td>
            </tr>
            
        </table>
    </div>
</body>
</html>