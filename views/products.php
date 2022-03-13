<?php
include "../models/db_connect.php";
include "../controllers/function.php";
include "../controllers/productsController.php";
include "../controllers/products-createController.php";


include "layout/header.php";
?>
    <div class="container-fluid px-4" xmlns="http://www.w3.org/1999/html">
        <h1 class="mt-4">Magazyn produktów</h1>
        <?php
        if (isset($_GET["action"]))
        {
            if ($_GET["action"] == 'add')
            {
            ?>
            <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
                <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
                <li class="breadcrumb-item"><a href="products.php">Produkty</a></li>
                <li class="breadcrumb-item active">Dodawanie produktów</li>
            </ol>
            <?php
            include "../helpers/error-msg.php";
            ?>
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Dodawanie nowego produktu</div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="" class="form-label"></label>
                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Nazwa produktu"/>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label"></label>
                                    <select name="product_category" id="product_category" class="form-control">
                                        <?php echo select_product_category($connect); ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label"></label>
                                    <textarea type="text" name="product_description" id="product_description" class="form-control" placeholder="Opis produktu"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label"></label>
                                    <select name="product_status" id="product_status" class="form-control">
                                        <option value="">Wybierz status produktu</option>
                                        <option value="Dostępny">Dostępny</option>
                                        <option value="Niedostępny">Niedostępny</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <a href="products.php" type="button" class="btn btn-sm btn-outline-secondary">Anuluj</a>
                                    <input type="submit" name="createProductBtn" class="btn btn-sm btn-outline-primary" value="Dodaj produkt"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>=
        <?php
        }
    }else{
            ?>
            <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
                <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
                <li class="breadcrumb-item active">Produkty</li>
            </ol>
            <?php
            $message = 'Produkt został dodany.';
            include "../helpers/message-msg.php";
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6"></i> Zarządzanie produktami</div>
                        <div class="col col-md-6" align="right">
                            <a href="products.php?action=add" class="btn btn-sm btn-outline-success" id="addProductBtn"><i class="fas fa-plus"></i> Dodaj produkt</a>
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
            }
            ?>
    </div>
<?php
include "layout/footer.php";
