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