<?php 
    include('connection.php');
    $msg = '';
    $dmsg = '';

    if(isset($_POST['delete'])){
        $ids = $_POST['ids'];
        
        foreach ($ids as $id){ 
            $sql = "DELETE FROM programten.contacts WHERE id = $id";
            if (mysqli_query($conn, $sql)) {
                $dmsg =  "Record deleted successfully";
            } else {
                $dmsg = "Error deleting record: " . mysqli_error($conn);
            }
        }
    }

    $sql = "SELECT * FROM programten.contacts";
    $result = mysqli_query($conn, $sql);
    $contacts = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $contacts[] = $row;
        }
    }else{
        $msg =  "No records found.";
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
    <h1>Delete Contacts</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <table border="1" style="width: 100%;">
            <tr>
                <th> .</th>
                <th> ID</th>
                <th> Name</th>
                <th> Phone</th>
                <th> Address</th>
            </tr>
            <?php 
                for($i = 0; $i < count($contacts); $i++){ 
                    echo '<tr>';
                    echo '<td> <input type="checkbox" name="ids[]" value="' . $contacts[$i]['id'] . '"> </td>' ;
                    echo "<td>" . $contacts[$i]['id'] . " </td>" ;
                    echo "<td>" . $contacts[$i]['name'] . " </td>" ;
                    echo "<td>" . $contacts[$i]['phone'] . " </td>" ;
                    echo "<td>" . $contacts[$i]['address'] . " </td>" ;
                    echo '</tr>';
                } 
            ?>
            <tr align="center">
                <td colspan="5"> <input type="submit" value="Delete" name="delete"> </td>
            </tr>

        </table>
    </form>

    <p><?= $msg ?></p>
    <p><?= $dmsg ?></p>
</center>
</body>
</html>