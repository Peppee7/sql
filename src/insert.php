<?php
    if ($_SERVER('REQUEST_METOD') == 'POST') {
        $servername = 'db';
        $username = "myuser";
        $password = "mypassword";
        $database = "myapp_db";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $q = "INSERT INTO utenti (nome, email) VALUED ('" . $_POST['name'] . "'. '" . $_POST['email'] . "')";

        if ($conn->$query($q)) {
            echo "Eseguito con successo";
            $conn->close();
        } else {
            echo "Eroore";
        }
    }
?>

<html>
    <body>
        <div id="fomr">
            <form action="" method="post">
                <label for="name">Nome: </label>
                <input type="text" name="name" required>
                <br><br>
                <label for="email">Email: </label>
                <input type="text" name="email" required>
                <br><br>
                <input type="submit" value="INVIA">
            </form>
        </div>
        <div id="users">
            <?php 
                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                $q = "SELECT * from utenti";

                $results = $conn->query($q);

                $row = $results->fetch_array(MYSQLI_ASSOC);
                echo $row['email'];
                echo ("<br>");
            ?>
        </div>
    </body>
</html>