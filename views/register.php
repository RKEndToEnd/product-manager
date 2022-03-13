<?php
include "../models/db_connect.php";
include "../controllers/function.php";
include "../controllers/registerController.php";
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
            <div class="card-header">Rejestracja nowego użytkownika</div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="user_name" class="form-label"></label>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Imię i nazwisko"/>
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label"></label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label"></label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Hasło"/>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php" type="button" class="btn btn-outline-success">Przejdź do logowania</a>
                        <a href="../index.php" type="button" class="btn btn-outline-secondary">Anuluj</a>
                        <input type="submit" name="registerBtn" class="btn btn-outline-primary" value="Zarejestruj"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include "layout/footer.php";