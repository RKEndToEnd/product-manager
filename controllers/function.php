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