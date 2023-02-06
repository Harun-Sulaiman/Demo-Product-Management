<?php
namespace App\Repository;

interface IAdminRepository {

    public function adminGetAllProducts();
    public function adminDeleteProduct($id);

}
?>
