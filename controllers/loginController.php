<?php
$message = '';
if(isset($_POST['loginBtn'])){
    $email = trim($_POST['user_email']);
    $password = trim($_POST['user_password']);

    if (empty($_POST["user_email"]))
    {
        $message .= '<li>Wpisz adres email.</li>';
    }
    if (empty($_POST['user_password']))
    {
        $message .= '<li>Wpisz hasło.</li>';
    }else{
        $sth = $connect->prepare(
            'SELECT * FROM product_manager.users 
                    WHERE user_email=:user_email
            ');
        $sth->bindValue(':user_email', $email, PDO::PARAM_STR);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        if ($user)
        {
            if (password_verify($password, $user['user_password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                header('location:dashboard.php');
            }else
            {
                $message .= '<li>Nieprawidłowe haslo</li>';
            }
        } else {
            $message .= '<li>Nie znaleziono użytkownika.</li>';
        }
    }
}
