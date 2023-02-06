<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\IAdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $admin;

    public function __construct(IAdminRepository $admin)
    {
        $this->admin = $admin;
    }

    public function adminGetAllProducts() {
        $products =  $this->admin->adminGetAllProducts();
        return view('admin.index')->with('products', $products);
    }

    public function adminDeleteProduct(Request $request, $id) {
        $this->admin->adminDeleteProduct($id);
        return redirect('/admin/products');
    }
}
