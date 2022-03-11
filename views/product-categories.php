<?php
include "../models/db_connect.php";
include "../controllers/function.php";
include "../controllers/product-categoriesController.php";
include "layout/header.php";

?>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Kategorie produktów</h1>
        <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
            <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
            <li class="breadcrumb-item active">Kategorie produktów</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6"><i class="fas fa-table me1"></i> Zarządzanie kategoriami produktów</div>
                    <div class="col col-md-6">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Nazwa kategotrii</th>
                        <th>Status</th>
                        <th>Utworzona</th>
                        <th>Zaktualizowana</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nazwa kategotrii</th>
                        <th>Status</th>
                        <th>Utworzona</th>
                        <th>Zaktualizowana</th>
                        <th>Akcje</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    include "../controllers/product-categories-tableController.php";
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
include "layout/footer.php";
