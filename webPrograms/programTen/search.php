<?php 
    include('connection.php');
    $msg = '';
    $contacts = array();

    if(isset($_POST['search'])){
        $name = $_POST['name'];
        
        $sql = "SELECT * FROM programten.contacts WHERE name LIKE '%$name%'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $contacts[] = $row;
            }
        }else{
            $msg =  "No records found.";
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
    <title>Address Book</title>
    <style>
        body{
            font-family: Arial;
        }
    </style>
</head>
<body>
<center>
    <h1>Search Contacts</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="name" placeholder="Type Name to search" >
        <input type="submit" value="Search" name="search">
    </form>
    <br>
    <table border="1" style="width: 100%;">
        <tr>
            <th> ID</th>
            <th> Name</th>
            <th> Phone</th>
            <th> Address</th>
        </tr>
        <?php 
            for($i = 0; $i < count($contacts); $i++){ 
                echo '<tr>';
                echo "<td>" . $contacts[$i]['id'] . " </td>" ;
                echo "<td>" . $contacts[$i]['name'] . " </td>" ;
                echo "<td>" . $contacts[$i]['phone'] . " </td>" ;
                echo "<td>" . $contacts[$i]['address'] . " </td>" ;
                echo '</tr>';
            } 
        ?>
    </table>
    <p><?= $msg ?></p>
</center>
</body>
</html>