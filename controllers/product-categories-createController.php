<?php
$message = '';
$error = '';

if (isset($_POST['createCatBtn']))
{
    $formdata = array();
    if (empty($_POST['category_name']))
    {
        $error .= '<li>Wpisz nazwę kategorii.</li>';
    }else{
        $formdata['category_name'] = trim($_POST['category_name']);
    }
    if ($error == '')
    {
        $query = "
        SELECT * FROM product_manager.category
        WHERE category_name = '".$formdata['category_name']."'
        ";
        $statement = $connect->prepare($query);
        $statement->execute();
        if ($statement->rowCount() > 0)
        {
            $error = '<li>Nazwa kategorii istnieje. Wybierz inną nazwę.</li>';
        }else {
            $data = array(
                ':category_name' => $formdata['category_name'],
                ':category_status' => 'Aktywna',
                ':created_at' => timestamp($connect)
            );
            $query = "
            INSERT INTO product_manager.category
            (category_name, category_status, created_at)
            VALUES (:category_name, :category_status, :created_at)
            ";
            $statement = $connect->prepare($query);
            $statement->execute($data);
            header('location:product-categories.php?msg=add');
        }
    }
}