<?php
if (isset($_POST["updateProductBtn"]))
{
    $formdata = array();
    if (empty($_POST["product_category"]))
    {
        $error .= '<li>Wybierz kategorię produktu z listy.</li>';
    }else{
        $formdata['product_category'] = trim($_POST['product_category']);
    }
    if (empty($_POST["product_description"]))
    {
        $error .= '<li>Wstaw opis produktu.</li>';
    }else{
        $formdata['product_description'] = trim($_POST['product_description']);
    }
    if (empty($_POST["product_status"]))
    {
        $error .= '<li>Wybierz status produktu z listy.</li>';
    }else{
        $formdata['product_status'] = trim($_POST['product_status']);
    }
    if ($error == '')
    {
        $data = array(
            ':product_category' => $formdata['product_category'],
            ':product_description' => $formdata['product_description'],
            ':product_status' => $formdata['product_status'],
            ':updated_at' => timestamp($connect),
            ':product_id' => $_POST['product_id']
        );
        $query = "
		UPDATE product_manager.products 
        SET product_category = :product_category, 
        product_description = :product_description, 
        product_status = :product_status,
        updated_at = :updated_at
        WHERE product_id = :product_id
		";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        header('location:products.php');
    }
}
