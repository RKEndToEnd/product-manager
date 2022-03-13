<?php
if (isset($_POST["destroyProductBtn"]))
{
    $product_id = convert_data($_POST['product_id'],'decrypt');
    if($product_id > 0) {
        $query = "
        DELETE FROM product_manager.products
        WHERE product_id = $product_id
    ";
        $statement = $connect->prepare($query);
        $statement->execute();
        header('location:products.php');
    }
}