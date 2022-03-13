<?php
include "../models/db_connect.php";
include "../controllers/function.php";
include "../controllers/product-categoriesController.php";
include "../controllers/product-categories-createController.php";
include "../controllers/product-categories-editController.php";
include "../controllers/product-categories-deleteController.php";
include "layout/header.php";
?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kategorie produktów</h1>
        <?php
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'add')
            {
        ?>
        <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
            <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
            <li class="breadcrumb-item"><a href="product-categories.php">Kategorie produktów</a></li>
            <li class="breadcrumb-item active">Dodawanie kategorii produktów</li>
        </ol>
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-md-4">
                <?php
                include "../helpers/error-msg.php";
                ?>
                <div class="card">
                    <div class="card-header">Dodawanie kategorii produktów</div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="" class="form-label"></label>
                                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Nazwa kategorii"/>
                            </div>
                            <div class="modal-footer">
                                <a href="product-categories.php" type="button" class="btn btn-sm btn-outline-secondary">Anuluj</a>
                                <input type="submit" name="createCatBtn" class="btn btn-sm btn-outline-primary" value="Dodaj kategorię"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
             }
            else if($_GET["action"] == 'edit')
            {
                $category_id = convert_data($_GET["code"],'decrypt');
                if($category_id > 0)
                {
                    $query = "
                        SELECT * FROM product_manager.category 
                        WHERE category_id = '$category_id'
                    ";
                    $category_result = $connect->query($query);
                    foreach($category_result as $category_row)
                    {
                    ?>
                    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
                        <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
                        <li class="breadcrumb-item"><a href="product-categories.php">Kategorie produktów</a></li>
                        <li class="breadcrumb-item active">Edycja kategorii produktów</li>
                    </ol>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-md-4">
                                <?php
                                include "../helpers/error-msg.php";
                                ?>
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-edit"></i> Edycja kategorii produktów</div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label class="form-label">Nazwa kategorii</label>
                                                <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $category_row['category_name']; ?>" />
                                            </div><div class="mb-3">
                                                <label class="form-label">Nazwa kategorii</label>
                                                <select type="text" name="category_status" id="category_status" class="form-control" value="<?php echo $category_row['category_status']; ?>" />
                                                    <option selected><?php echo $category_row['category_status']; ?></option>
                                                    <option value="Aktywna">Aktywna</option>
                                                    <option value="Nieaktywna">Nieaktywna</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="category_id" value="<?php echo $_GET['code']; ?>" />
                                                <a href="product-categories.php" type="button" class="btn btn-sm btn-outline-secondary">Anuluj</a>
                                                <input type="submit" name="updateCatBtn" class="btn btn-sm btn-outline-primary" value="Zaktualizuj dane kategorii"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
				    }
			    }
		    }
            else if($_GET["action"] == 'delete')
            {
                $category_id = convert_data($_GET["code"],'decrypt');
                if($category_id > 0)
                {
                    $query = "
                        SELECT * FROM product_manager.category 
                        WHERE category_id = '$category_id'
                    ";
                    $category_result = $connect->query($query);
                    foreach($category_result as $category_row)
                    {
                        ?>
                        <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
                            <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
                            <li class="breadcrumb-item"><a href="product-categories.php">Kategorie produktów</a></li>
                            <li class="breadcrumb-item active">Edycja kategorii produktów</li>
                        </ol>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-md-4">
                                <?php
                                include "../helpers/error-msg.php";
                                ?>
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-edit"></i> Edycja kategorii produktów</div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label class="form-label">Nazwa kategorii</label>
                                                <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $category_row['category_name']; ?>" disabled/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nazwa kategorii</label>
                                                <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $category_row['category_status']; ?>" disabled/>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="category_id" value="<?php echo $_GET['code']; ?>" />
                                                <a href="product-categories.php" type="button" class="btn btn-sm btn-outline-secondary">Anuluj</a>
                                                <input type="submit" name="destroyCatBtn" class="btn btn-sm btn-outline-primary" value="Usuń kategorię"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
        }else{
        ?>
        <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
            <li class="breadcrumb-item"><a href="dashboard.php">Panel</a></li>
            <li class="breadcrumb-item active">Kategorie produktów</li>
        </ol>
        <?php
            $message = 'Kategoria produktu została dodana.';
            $msgedit = 'Kategoria została zmieniona';
            include "../helpers/message-msg.php";
        ?>
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6"><i class="fas fa-table me1"></i> Zarządzanie kategoriami produktów</div>
                    <div class="col col-md-6" align="right">
                        <a href="product-categories.php?action=add" class="btn btn-sm btn-outline-success" id="createCategoryBtn"><i class="fas fa-plus"></i> Dodaj kategorię</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Nazwa kategotrii</th>
                        <th>Status kategorii</th>
                        <th>Utworzona</th>
                        <th>Zaktualizowana</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nazwa kategotrii</th>
                        <th>Status kategorii</th>
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
        <?php
        }
        ?>
    </div>

<?php
include "layout/footer.php";