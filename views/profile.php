<?php
include "../models/db_connect.php";
include "../controllers/function.php";

if (!is_user_login())
{
    header('location:login.php');
}

$message = '';
$error = '';

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

include "layout/header.php";
?>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Konto użytkownika</h1>
        <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
            <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
            <li class="breadcrumb-item active">Konto użytkownika</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php
                if($error != '')
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="list-unstyled">'.$error.'</ul> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                if($message != '')
                {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$message.' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                ?>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-user-edit"></i> Edycja profilu</div>
                    <div class="card-body">
                        <?php
                        foreach ($result as $row)
                        {
                        ?>
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Imię i nazwisko</label>
                                <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $row['user_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="user_email" id="user_email" class="form-control" value="<?php echo $row['user_email']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Identyfikator użytkownika</label>
                                <input type="text" name="user_unique_id" id="user_unique_id" class="form-control" value="<?php echo $row['user_unique_id']; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hasło</label>
                                <input type="password" name="user_password" id="user_password" class="form-control" value="<?php echo $row['user_password']; ?>">
                            </div>
                            <div class="modal-footer">
                                <a href="dashboard.php" type="button" class="btn btn-outline-secondary">Anuluj</a>
                                <input type="submit" name="userUpdateBtn" class="btn btn-outline-primary" value="Zapisz zmiany">
                            </div>
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "layout/footer.php";
