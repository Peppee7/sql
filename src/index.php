<?php
    $servername = "db";
    $username = "myuser";
    $password = "mypassword";
    $database = "myapp_db";

    echo $servername . "<br> /";
    echo $username . "<br> /";
    echo $password . "<br> /";
    echo $database . "<br> /";

    /*$conn = new mysqli($servername, $username, $password, $database);

    if($conn -> connect_error){
        die("Connessione fallita: " . $conn_error);
    }

    echo "<h1>Connessione riuscita a MySQL:</h1>";

    $result = $conn -> query("SHOW TABLES;");
    echo "<pre>";
    while($row = $result -> fetch_array()){
        print_r($row);
    }
    echo "</pre>";
    $conn -> close();*/
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
</head>
<body>
    <table>
        <?php
            while ($row = $result->fetch_array()) {
                
        ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="user_id" value="<?php echo $row["id"] ?>">
                        <input type="submit" value="CANECELLA">
                    </form>
                </td>
            </tr>
        <?php
           }                
        ?>
    </table>
</body>
</html>
