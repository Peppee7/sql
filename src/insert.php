<?php
$servername = "db";
$username = "myuser";
$password = "mypassword";
$database = "myapp_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Inserimento 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"]) && isset($_POST["email"]) && !isset($_POST["edit_id"])) {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $q = "INSERT INTO utenti (nome, email) VALUES ('$name', '$email')";
    $conn->query($q);
}

// Eliminazione 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_id"])) {
    $id = $_POST["delete_id"];
    $q = "DELETE FROM utenti WHERE id = '$id'";
    $conn->query($q);
}

// Modifica 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_id"])) {
    $id = $_POST["edit_id"];
    $name = trim($_POST["edit_name"]);
    $email = trim($_POST["edit_email"]);
    $q = "UPDATE utenti SET nome='$name', email='$email' WHERE id='$id'";
    $conn->query($q);
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione utenti</title>
    <script>
        function modifica(id, nome, email) {
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_name").value = nome;
            document.getElementById("edit_email").value = email;
            document.getElementById("editForm").style.display = "block";
        }
    </script>
</head>
<body>
    <h2>Inserisci un nuovo utente</h2>
    <form action="" method="post">
        <label for="name">Nome e Cognome:</label>
        <input type="text" name="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <input type="submit" value="Inserisci">
    </form>

    <h2>Modifica utente</h2>
    <form id="editForm" action="" method="post" style="display:none; border:1px solid #000; padding:10px; margin-top:20px;">
        <input type="hidden" id="edit_id" name="edit_id">
        <label>Nome:</label>
        <input type="text" id="edit_name" name="edit_name" required>
        <br><br>
        <label>Email:</label>
        <input type="email" id="edit_email" name="edit_email" required>
        <br><br>
        <input type="submit" value="Aggiorna">
    </form>

    <h2>Lista utenti</h2>
    <table cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Azioni</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM utenti ORDER BY id ASC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['nome']."</td>
                    <td>".$row['email']."</td>
                    <td>
                        <form action='' method='post' style='display:inline;'>
                            <input type='hidden' name='delete_id' value='".$row['id']."'>
                            <input type='submit' value='Elimina'>
                        </form>
                        <button onclick=\"modifica('".$row['id']."','".$row['nome']."','".$row['email']."')\">Modifica</button>
                    </td>
                </tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>