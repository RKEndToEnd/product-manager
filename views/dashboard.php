<?php
include "../models/db_connect.php";
include "../controllers/function.php";

if(!is_user_login())
{
    header('location:login.php');
}

include "layout/header.php";
?>

<?php
include "layout/footer.php";
