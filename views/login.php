<?php
include "../models/db_connect.php";
include "../controllers/function.php";

$message = '';

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

include "layout/header.php";

?>

<div class="d-flex align-items-center justify-content-center">
    <div class="col-md-4">
        <?php
        if ($message != '')
        {
            echo '<div class="alert alert-danger"><ul>'.$message.'</ul></div>';
        }
        ?>
        <div class="card">
            <div class="card-header">Magazyn produktów logowanie</div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="user_email" class="form-label"></label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label"></label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Hasło"/>
                    </div>
                    <div class="modal-footer">
                        <a href="../index.php" type="button" class="btn btn-outline-secondary">Anuluj</a>
                        <input type="submit" name="loginBtn" class="btn btn-outline-primary" value="Zaloguj"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
include "layout/footer.php";
?>
