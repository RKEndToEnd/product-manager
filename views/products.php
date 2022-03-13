<?php
include "../models/db_connect.php";
include "../controllers/function.php";
include "../controllers/productsController.php";
include "../controllers/products-createController.php";
include "../controllers/products-editController.php";

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
            else if ($_GET["action"] == 'edit'){
                $product_id = convert_data($_GET["code"], 'decrypt');
                if ($product_id > 0)
                {
                    $query = "
                    SELECT * FROM product_manager.products
                    WHERE product_id = '$product_id'
                    ";
                }
                $product_result = $connect->query($query);
                foreach ($product_result as $product_row)
                {
                    ?>
                    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
                        <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
                        <li class="breadcrumb-item"><a href="products.php">Produkty</a></li>
                        <li class="breadcrumb-item active">Edycja produktów</li>
                    </ol>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="col-md-4">
                            <?php
                            include "../helpers/error-msg.php";
                            ?>
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-edit"></i> Edycja produktu</div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Nazwa produktu</label>
                                            <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $product_row['product_name'];  ?>" disabled/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Kategoria produktu</label>
                                            <select name="product_category" id="product_category" class="form-control">
                                                <?php echo select_product_category($connect); ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Opis produktu</label>
                                            <textarea type="text" name="product_description" id="product_description" class="form-control" placeholder="Opis produktu" ><?php echo $product_row['product_description'];  ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status produktu</label>
                                            <select type="text" name="product_status" id="product_status" class="form-control" value="<?php  ?>" />
                                                <option value="">Wybierz status produktu</option>
                                                <option value="Dostępny">Dostępny</option>
                                                <option value="Niedostępny">Niedostępny</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="product_id" value="<?php echo $product_row['product_id']; ?>" />
                                            <a href="product-categories.php" type="button" class="btn btn-sm btn-outline-secondary">Anuluj</a>
                                            <input type="submit" name="updateProductBtn" class="btn btn-sm btn-outline-primary" value="Zaktualizuj dane produktu"/>
                                        </div>
                                    </form>
                                    <script>
                                        document.getElementById('product_category').value = "<?php echo $product_row['product_category'];  ?>";
                                        document.getElementById('product_status').value = "<?php echo $product_row['product_status'];  ?>";
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
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
