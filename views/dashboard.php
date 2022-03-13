<?php
include "../models/db_connect.php";
include "../controllers/function.php";

if(!is_user_login())
{
    header('location:login.php');
}

include "layout/header.php";
?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Stan magazynu</h1>
        <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
            <li class="breadcrumb-item active">Panel</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary bg-opacity-75 text-black-50 mb-4">
                    <div class="card-body">
                        <h1 class="text-center"><?php echo total_products($connect);?></h1>
                        <h5 class="text-center">Ilość produktów</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info bg-opacity-75 text-black-50 mb-4">
                    <div class="card-body">
                        <h1 class="text-center"><?php echo total_product_categories($connect);?></h1>
                        <h5 class="text-center">Ilość kategorii produktów</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success bg-opacity-75 text-black-50 mb-4">
                    <div class="card-body">
                        <h1 class="text-center"><?php echo total_avaliable_products($connect);?></h1>
                        <h5 class="text-center">Produkty dostępne</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger bg-opacity-75 text-black-50 mb-4">
                    <div class="card-body">
                        <h1 class="text-center"><?php echo total_unavaliable_products($connect);?></h1>
                        <h5 class="text-center">Produkty niedostępne</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
include "layout/footer.php";
