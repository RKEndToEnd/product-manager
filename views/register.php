<?php
include "../models/db_connect.php";
include "../controllers/function.php";

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_BCRYPT);

    $sth = $connect->prepare('INSERT INTO product_manager.users (user_email,user_password) VALUE (:email,:password)');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
    $sth->execute();

    die('Rejestracja pomyslna!');
}
include "layout/header.php";
?>
        <div>
<h1>Formularz rejestracyjny</h1>
<form method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="register">Zarejestruj</button>
</form>
        </div>

<?php
    include "layout/footer.php";