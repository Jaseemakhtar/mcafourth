<?php
    include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <style>
        *{
            font-family: Arial;
        }
        table{
            text-align: left;
        }
    </style>
</head>
<body>
    <h1><center>Add Book</center></h1>
    <div>
        <center>
        <form action="add.php" method="post">
            <table>
                <tr>
                    <th>Accession No.</th>
                    <td><input type="text" name="accession_no"></td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <th>Authors</th>
                    <td><input type="text" name="authors"></td>
                </tr>
                <tr>
                    <th>Edition</th>
                    <td><input type="text" name="edition"></td>
                </tr>
                <tr>
                    <th>Publisher</th>
                    <td><input type="text" name="publisher"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;"><input type="submit" name="submit_add" value="Submit"></td>
                </tr>
            </table>
        </form>
        <?php
                if(isset($_POST['submit_add'])){
                        $accessionno = $_POST['accession_no'];
                        $title = $_POST['title'];
                        $authors = $_POST['authors'];
                        $edition = $_POST['edition'];
                        $publisher = $_POST['publisher'];
                        
                        $sql = "INSERT INTO mcafourth.programseven (title, acession_no, authors, edition, publishers) VALUES ('" . $title ."', '" . $accessionno . "', '" . $authors. "', '". $edition . "', '". $publisher . "')";
                        if(mysqli_query($conn, $sql)){
                            echo "<h4> Inserted Successsfully. </h4> ";
                        }else{
                            echo "<h4> Failed to insert [ " . mysqli_error($conn) . " ]</h4> ";
                        }
                }
                $conn->close();
        ?>            
        </center>
    </div>
</body>
</html>