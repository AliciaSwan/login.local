<?php
//$email = 'test'; // test avec une chaine qui n'est pas une adresse email
$email = 'test@example.com'; // test avec une chaine qui est une adresse email

// Vérifie si la chaine ressemble à un email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Cet email est correct.';
} else {
    echo 'Cet email a un format non adapté.';
}

?>
<link rel="stylesheet" href="style.css">

<a href="login.php">Вход</a> / <a href="registration.php">Регистация</a>

<h1>Добро пожаловать!</h1>
