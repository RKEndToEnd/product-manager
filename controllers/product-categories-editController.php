<?php
if (isset($_POST["updateCatBtn"]))
{
    $formdata = array();
    if (empty($_POST["category_name"]))
    {
        $error .= '<li>Wpisz nazwę kategorii.</li>';
    }else{
        $formdata['category_name'] = $_POST['category_name'];
    }
    if (empty($_POST["category_status"]))
    {
        $error = '<li>Wybierz status kategorii.</li>';
    }else{
        $formdata['category_status'] = $_POST['category_status'];
    }
    if ($error == '')
    {
        $category_id = convert_data($_POST['category_id'],'decrypt');
        $query = "
            SELECT * FROM product_manager.category
            WHERE category_name = '".$formdata['category_name']."'
            AND category_id != '".$category_id."' 
        ";
        $statement = $connect->prepare($query);
        $statement->execute();
        if($statement->rowCount() > 0)
        {
            $error = '<li>Nazwa kategorii istnieje. Wybierz inną nazwę.</li>';
        }else{
            $data = array(
                ':category_name' => $formdata['category_name'],
                ':updated_at' => timestamp($connect),
                ':category_id' => $category_id,
                ':category_status' => $formdata['category_status']
            );
            $query = "
                UPDATE product_manager.category
                SET category_name = :category_name,
                    updated_at = :updated_at,
                    category_status = :category_status
                WHERE category_id = :category_id
            ";
            $statement = $connect->prepare($query);
            $statement->execute($data);
            header('location:product-categories.php');
        }
    }
}