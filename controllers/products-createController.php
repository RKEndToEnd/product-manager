<?php
$message = '';
$error = '';

if(isset($_POST["createProductBtn"]))
{
    $formdata = array();
    if (empty($_POST["product_name"]))
    {
        $error .= '<li>Wpisz nazwę produktu.</li>';
    }else{
        $formdata['product_name'] = trim($_POST["product_name"]);
    }
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
            ':product_name' => $formdata['product_name'],
            ':product_category' => $formdata['product_category'],
            ':product_description' => $formdata['product_description'],
            ':product_status' => $formdata['product_status'],
            ':created_at' => timestamp($connect)
        );
        $query = "
        INSERT INTO product_manager.products
        (product_name, product_category, product_description, product_status, created_at)
        VALUES (:product_name, :product_category, :product_description, :product_status, :created_at)
        ";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        header('location:products.php?msg=add');
    }
}