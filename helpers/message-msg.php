<?php
if (isset($_GET['msg']))
{
    if ($_GET['msg'] =='add')
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'.$message.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}