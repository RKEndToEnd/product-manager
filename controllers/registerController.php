<?php
$message ='';

if (isset($_POST['registerBtn'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    if (empty($_POST['user_name']))
    {
        $message .= '<li>Wpisz imię i nazwisko.</li>';
    }
    if (empty($_POST['user_email']))
    {
        $message .= '<li>Wpisz adres email.</li>';
    }
    if (empty($_POST['user_password'])) {
        $message .= '<li>Wpisz hasło.</li>';
    }else {
        $sth = $connect->prepare(
            'INSERT INTO product_manager.users (user_name,user_email,user_password) 
                        VALUE (:user_name,:user_email,:user_password)'
        );
        $sth->bindValue(':user_name', $name, PDO::PARAM_STR);
        $sth->bindValue(':user_email', $email, PDO::PARAM_STR);
        $sth->bindValue(':user_password', $hashPassword, PDO::PARAM_STR);
        $sth->execute();
        $message .= '<li>Użytkownik został dodany. Można się zalogować.</li>';
    }
}