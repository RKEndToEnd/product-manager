<?php
include "../models/db_connect.php";
include "../controllers/function.php";

$message = '';

include "../controllers/loginController.php";

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
