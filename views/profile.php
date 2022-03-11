<?php
include "../models/db_connect.php";
include "../controllers/function.php";

if (!is_user_login())
{
    header('location:login.php');
}

$message = '';
$error = '';

include "../controllers/profileController.php";

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
