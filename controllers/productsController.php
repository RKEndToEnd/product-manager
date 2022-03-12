<?php
if (!is_user_login())
{
    header('location:login.php');
}
$query ="
    SELECT * FROM product_manager.products
    ORDER BY product_name ASC
";
$statement = $connect->prepare($query);
$statement->execute();