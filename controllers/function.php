<?php

function main_url()
{
    return 'http://localhost/product_manager/';
}
function is_user_login()
{
    if (isset($_SESSION['user_id']))
    {
        return true;
    }
    return false;
}
function timestamp()
{
    date_default_timezone_set('Europe/Warsaw');
    return date("Y-m-d H:i:s",STRTOTIME(date('h:i:sa')));
}
function convert_data($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt')
    {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if ($action == 'decrypt')
    {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
function select_product_category($connect)
{
    $query = "
	SELECT category_name FROM product_manager.category 
	WHERE category_status = 'Aktywna' 
	ORDER BY category_name ASC
	";

    $result = $connect->query($query);

    $output = '<option value="">Wybierz kategorię produktu</option>';

    foreach($result as $row)
    {
        $output .= '<option value="'.$row["category_name"].'">'.$row["category_name"].'</option>';
    }

    return $output;
}
function total_products($connect)
{
    $total = 0;
    $query = "
    SELECT COUNT(product_id) AS Total FROM product_manager.products
    ";
    $result = $connect->query($query);
    foreach ($result as $row)
    {
        $total = $row["Total"];
    }
    return $total;
}
function total_avaliable_products($connect)
{
    $total = 0;
    $query = "
    SELECT COUNT(product_id) AS Total FROM product_manager.products
    WHERE product_status = 'Dostępny'
    ";
    $result = $connect->query($query);
    foreach ($result as $row)
    {
        $total = $row["Total"];
    }
    return $total;
}
function total_unavaliable_products($connect)
{
    $total = 0;
    $query = "
    SELECT COUNT(product_id) AS Total FROM product_manager.products
    WHERE product_status = 'Niedostępny'
    ";
    $result = $connect->query($query);
    foreach ($result as $row)
    {
        $total = $row["Total"];
    }
    return $total;
}
function total_product_categories($connect)
{
    $total = 0;
    $query = "
    SELECT COUNT(category_id) AS Total FROM product_manager.category
    WHERE category_status = 'Aktywna'
    ";
    $result = $connect->query($query);
    foreach ($result as $row)
    {
        $total = $row["Total"];
    }
    return $total;
}
