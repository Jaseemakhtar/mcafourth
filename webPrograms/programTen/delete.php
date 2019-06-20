<?php 
    include('connection.php');
    $msg = '';
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


    if(isset($_POST['delete'])){
        $ids = $_POST['ids'];

        foreach ($ids as $id){ 
            echo $id."<br />";
            
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
    <h1>Delete Contacts</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <table border="1" style="width: 100%;">
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
</center>
</body>
</html>