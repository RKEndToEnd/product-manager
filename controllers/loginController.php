<?php
if (isset($_POST["loginBtn"]))
{
    $formdata = array();
    if (empty($_POST["user_email"]))
    {
        $message .= '<li>Wpisz adres email.</li>';
    }else{
        if (!filter_var($_POST["user_email"],FILTER_VALIDATE_EMAIL))
        {
            $message .='<li>Nieprawidłowy adres email</li>';
        }else{
            $formdata['user_email'] = $_POST['user_email'];
        }
    }
    if (empty($_POST['user_password']))
    {
        $message .= '<li>Wpisz hasło.</li>';
    }else{
        $formdata['user_password'] = $_POST['user_password'];
    }
    if ($message == '')
    {
        $data = array(
            ':user_email' => $formdata['user_email']
        );
        $query = "
            SELECT * FROM product_manager.users 
            WHERE user_email = :user_email
        ";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        if ($statement->rowCount() > 0)
        {
            foreach ($statement->fetchAll() as $row)
            {
                if ($row['user_password'] == $formdata['user_password'])
                {
                    $_SESSION['user_id'] = $row['user_id'];
                    header('location:dashboard.php');
                }else{
                    $message = '<li>Nieprawidłowe hasło.</li>';
                }
            }
        }else{
            $message = '<li>Adres email nie istnieje.</li>';
        }
    }
}
