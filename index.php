<?php
include "controllers/function.php";
include "views/layout/header.php";

?>

<div class="bg-dark py-5 container px-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-6">
            <div class="text-center my-5">
                <h1 class="display-5 fw-bolder text-white mb-2">Magazyn produktów<i class="fa-brands fa-accusoft"></i></h1>
                <p class="lead text-white-50 mb-4">Prosty system do zarządzania bazą produktów z uwzględnieniem ilości, ceny i kategorii.</p>
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <a class="btn btn-outline-primary px-4 me-sm-3" href="views/login.php">Zaloguj się</a>
                    <a class="btn btn-outline-primary px-4 me-sm-3" href="views/register.php">Zrejestruj się</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "views/layout/footer.php";
?>

