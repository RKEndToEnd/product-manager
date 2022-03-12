<?php
if (isset($_POST["destroyCatBtn"]))
{
    $category_id = convert_data($_POST['category_id'],'decrypt');
    if($category_id > 0) {
        $query = "
        DELETE FROM product_manager.category
        WHERE category_id = $category_id
    ";
        $statement = $connect->prepare($query);
        $statement->execute();
        header('location:product-categories.php');
    }
}