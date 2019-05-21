<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $name = $addr1 = $addr2 = $email = FALSE;
    $msg = FALSE;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Programs</title>
    <style>
        body, table{
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0 auto;
        }
        td{
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Fill / Search in the Form</h2>
    <form action="" method="post">
    <?php        
        if(isset($_POST["btn_submit"])){
            
            // Connected successfully
            $name = $_POST["name"];
            $addr1 = $_POST["address_one"];
            $addr2 = $_POST["address_two"];
            $email = $_POST["email"];

            $sql = "INSERT INTO programsix.details (name, address_one, address_two, email) VALUES ('". $name ."', '" . $addr1 . "', '" . $addr2. "', '". $email ."')";

            if ($conn->query($sql) === TRUE) {
                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();

        }else if(isset($_POST["btn_search"])){

            $name = $_POST["name"];
            $sql = "select * from programsix.details where name = \"". $name . "\"";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $addr1 = $row["address_one"];
                $addr2 = $row["address_two"];
                $email = $row["email"];
            }else{
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
                
        }
    ?>
        <table >
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" <?php if($name){echo 'value = "'. $name . '"'; } ?> /></td>
            </tr>
            <tr>
                <td>AddressLine 1:</td>
                <td><input type="text" name="address_one" <?php if($addr1){echo 'value = "'. $addr1 . '"';}?> <?php ?> /></td>
            </tr>
            <tr>
                <td>AddressLine 2:</td>
                <td><input type="text" name="address_two" <?php if($addr2){echo 'value = "'. $addr2 . '"';}  ?> /></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" <?php if($email){echo 'value = "'. $email . '"';}  ?> /></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_submit" value="Submit" /> </td>
                <td><input type="submit" name="btn_search" value="Search" /></td>
            </tr>
        </table>
    </form>
    <?php 
        if($msg){
            echo '<h4>'. $msg . '</h4>';
        } 
     ?>
    
</body>
</html>
