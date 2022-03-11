<?php
if (isset($_POST['userUpdateBtn']))
{
    $formdata = array();
    if (empty($_POST['user_name']))
    {
        $error .= '<li>Wpisz imię i nazwisko.</li>';
    }else{
        $formdata['user_name'] = $_POST['user_name'];
    }
    if (empty($_POST['user_password']))
    {
        $error .= '<li>Wpisz hasło.</li>';
    }else{
        $formdata['user_password'] = $_POST['user_password'];
    }
    if ($error == '')
    {
        $user_id = $_SESSION['user_id'];
        $data = array(
            ':user_name' => $formdata['user_name'],
            ':user_password' => $formdata['user_password'],
            ':user_id' => $user_id
        );
        $query = "
            UPDATE product_manager.users
                SET user_name = :user_name,
                    user_password = :user_password
                WHERE user_id = :user_id
        ";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $message = 'Dane użytkownika zostały zaktualizowane.';
    }
}

$query = "
    SELECT * FROM product_manager.users
    WHERE user_id = '".$_SESSION["user_id"]."'
";

$result = $connect->query($query);
