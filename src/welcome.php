<?php
$username = $_COOKIE["username"];
$theme = $_COOKIE["theme"];

if($theme === "dark") {
    $bg = "#111";
    $color = "#fff";
} else {
    $bg = "#fff";
    $color = "#111";
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Benvenuto</title>
</head>
<body style="background:<?= $bg ?>; color:<?= $color ?>;">
    <h1>Benvenuto, <?= $username ?></h1>
</body>
</html>