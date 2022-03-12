<?php
include "../models/db_connect.php";
include "../controllers/function.php";
include "../controllers/productsController.php";


include "layout/header.php";
?>
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
        <li class="breadcrumb-item active">Produkty</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><i class="fas fa-table me1"></i> Zarządzanie produktami</div>
                <div class="col col-md-6" align="right">

                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Kategoria</th>
                    <th>Opis</th>
                    <th>Status</th>
                    <th>Utworzony</th>
                    <th>Zaktualizowany</th>
                    <th>Akcje</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nazwa</th>
                    <th>Kategoria</th>
                    <th>Opis</th>
                    <th>Status</th>
                    <th>Utworzony</th>
                    <th>Zaktualizowany</th>
                    <th>Akcje</th>
                </tr>
                </tfoot>
                <tbody>
                    <?php
                    include "../controllers/products-tableController.php";
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
include "layout/footer.php";


