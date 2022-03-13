<?php
if (!is_user_login())
{
    header('location:login.php');
}
$query = "
    SELECT * FROM product_manager.category
        ORDER BY category_name ASC
";
$statement = $connect->prepare($query);
$statement->execute();
