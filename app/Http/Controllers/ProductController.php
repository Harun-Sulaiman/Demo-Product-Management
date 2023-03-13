<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public $product;
    public function __construct(IProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // return all products
        $products =  $this->product->getAllProducts();
        return view('product.index')->with('products', $products);
    }

    public function show($id)
    {
        // get single product
        $product = $this->product->getSingleProduct($id);
        return view('product.show')->with('product', $product);
    }

    public function create()
    {
        // create page
        return view('product.create');
    }

    public function store(Request $request)
    {
        // validate and store data
        $request->validate([
            'picture' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        //image upload
        $data = $request->all();
        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        $this->product->createProduct($data);
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = $this->product->editProduct($id);
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(300, 300)->save($path);
            $product->picture = 'images/' . $filename;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
}
