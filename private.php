<?php
session_start();
if(!$_SESSION['login'] || !$_SESSION['password']){
    header('Location:login.php');
    die();
}
if($_POST['unlogin']){
    session_destroy();
    header('Location: login.php');
}
$login = $_SESSION['login'];
$connexion = new PDO('mysql:host=localhost;dbname = academy; charset = utf8',"root","");
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$profile = $connexion->query("SELECT * FROM academy.users WHERE login='$login'");
$row = $profile->fetchAll();


?>
<link rel="stylesheet" href="style.css">
<style>
    body{
        background-color: <?php echo $_COOKIE['color']; ?>;
    }
</style>
<body>
<h1>Личный кабинет</h1>
<?php echo "Привет, ". $_SESSION['login']; ?>
<p>Вход строго для зарегистрированных пользователей</p>
<br>
<?php echo "Имя: ". $row['0']['name']."<br> Фамилия:". $row['0']['surname']. "<br> Телефон:". $row['0']['phone']."<br> E-mail:".$row['0']['mail']."<br>"; ?>
<form action="" method="post">
    <input type="submit" name="unlogin" value="Выйти" class="btn">
</form>

</body>
