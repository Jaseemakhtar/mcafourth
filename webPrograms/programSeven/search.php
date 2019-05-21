<?php
    include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Book</title>
    <style>
        *{
            font-family: Arial;
        }
        .tab, .tab td{
            border: 1px solid #777;
        }
        .tab{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1><center>Search Book</center></h1>
    <div>
        <center>
            <form action="search.php" method="post">
                <table>
                    <tr>
                        <th>Enter title: </th>
                        <td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;"><input type="submit" name="submit_search" value="Search!"></td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['submit_search'])){
                    if(isset($_POST['title'])){
                        $title = $_POST['title'];
                        $sql = "SELECT title, authors, edition, publisher from mcafourth.programseven where title = '$title' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<table class=\"tab\"><tr><td>" . $row['title'] ."</td><td>" . $row['authors'] . "</td><td>" . $row['edition'] . "</td><td>" . $row['publishers'] . "</td></tr></table>";
                            }
                        }else{
                            echo "<h3> No records found. </h3> ";
                        }
                    }
                }
                $conn->close();
            ?>            
        </center>
    </div>
</body>
</html>