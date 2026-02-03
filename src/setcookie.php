<?php
    $scadenza = time() + 60 * 60 * 24 * 7; 

        setcookie("username", $_POST["username"], $scadenza);
        setcookie("theme", $_POST["theme"], $scadenza);

        header("Location: welcome.php");

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>

        <select name="theme">
            <option value="light">Chiaro</option>
            <option value="dark">Scuro</option>
        </select>

        <button type="submit">INVIA</button>
    </form>
</body>
</html>