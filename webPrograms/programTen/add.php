<?php 
    include('connection.php');
    $msg = '';
    if(isset($_POST['add'])){
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $sql = "INSERT INTO programten.contacts (id, name, phone, address) VALUES (NULL, '$name', $phone , '$address')";
        if(mysqli_query($conn, $sql)){
            $msg = "Inserted Successsfully.";
        }else{
            $msg = "Failed to insert [ " . mysqli_error($conn) . " ]";
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
    <h1>Add Contact</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="number" name="phone"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="add" value="Submit"></td>
            </tr>
        </table>    
    </form>
    <p><?= $msg ?></p>
</center>
</body>
</html>