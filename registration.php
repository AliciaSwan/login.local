<?php
session_start();
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Vérifie si la chaine ressemble à un email
    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $mail = $_POST['mail'];
    } else {
        echo 'Введите корректный e-mail.';
    }


    $connexion = new PDO('mysql:host=localhost;dbname = academy; charset = utf8',"root","");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connexion->query("INSERT INTO academy.users (`name`,`surname`,`login`,`password`,`mail`,`phone`) VALUES ('$name','$surname', '$login', '$password', '$mail', '$phone')");
    //echo "Вы успешно зарегистрировались. Войти в личный кабинет <a href='login.php'>Вход</a>";
    $_SESSION['login']=$login;
    $_SESSION['password']=$password;

    setcookie('color',$_POST['color'], time()+3600);

    header('Location: private.php');



    if(!isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['mail']) || !isset($_POST['phone'])){
        echo "Анкета должна быть полностью заполнена. Проверьте правильность заполнения Ваших данных.";
    }

}




?>
<link rel="stylesheet" href="style.css">
<body>
<h1>Регистрация</h1>
<form action="" method="post">
    <input type="text" name="name" id="" placeholder="Имя" required>
    <input type="text" name="surname" id="" placeholder="Фамилия" required><br>
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="email" name="mail" placeholder="E-mail" required>
    <input type="tel" name="phone" placeholder="Телефон" required><br>
    <label for="colors">Выберите цвет</label>
    <select name="color" id="colors" required >
        <option value="#f2f0d5">бежевый</option>
        <option value="#89ecf9">голубой</option>
    </select><br>
    <input type="submit" value="Отправить" class="btn">
</form>
<p>Уже зарегистрированы? <a href="login.php">Вход</a></p>
</body>
