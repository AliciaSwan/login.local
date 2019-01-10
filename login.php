<?php

session_start();
if($_SESSION['login'] || $_SESSION['password']){
    header('Location:private.php');
    die();
}
$connexion = new PDO('mysql:host=localhost;dbname = academy; charset = utf8',"root","");
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$login = $connexion->query("SELECT * FROM `academy`.users");

if ($_POST['login']){
    foreach ($login as $log){
        if($_POST['login']==$log['login'] && $_POST['password']==$log['password']){
            $_SESSION['login']=$_POST['login'];
            $_SESSION['password']=$_POST['password'];

            setcookie('color',$_POST['color'], time()+3600);

            header('Location:private.php');
        }
    }
    echo "Неверный логин или пароль";
}


?>
<link rel="stylesheet" href="style.css">
<body>
<h1>Авторизоваться</h1>
<form action="" method="post">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <label for="colors">Выберите цвет</label>
    <select name="color" id="colors" required >
        <option value="#f2f0d5">бежевый</option>
        <option value="#89ecf9">голубой</option>
    </select>
    <input type="submit" value="Отправить" class="btn">
</form>
<p>Вы еще не зарегистрированы? <a href="registration.php">Регистрация</a></p>
</body>
