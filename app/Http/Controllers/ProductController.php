<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getAll()
  {
    $products = Product::orderBy('product_name','asc')->get();
    foreach ($products as $product) {
      $product->description = str_limit($product->description, 200, '...');
    }
    $images = ProductImage::orderBy('created_at', 'asc')->get();
    foreach ($images as $image) {
      $image->path = Storage::url($image->path);
    }
    return view('admin.product', compact('products'));
  }

  public function add()
  {
    $products = Product::orderBy('product_name','asc')->get();
    return view('admin.add-product', compact('product'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'product_name' => 'unique:products|max:255',
        'price' => 'numeric',
    ]);

    $product = new Product;
    $product->product_name = $request->product_name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->save();

    $product_id = Product::orderBy('id', 'desc')->first();
    foreach ($request->images as $image) {
      $productImage = new ProductImage;
      $productImage->path = $image->store('public/products');
      $productImage->product_id = $product_id->id;
      $productImage->save();
    }
    return redirect()->route('show-product');
  }

  public function getOne($id)
  {
    $images = ProductImage::orderBy('created_at', 'asc')->get();
    foreach ($images as $image) {
      $image->path = Storage::url($image->path);
    }
    $product = Product::findOrFail($id);
    return view('admin.edit-product', compact('product','images'));
  }

  public function update(Request $request, $id)
  {
    $product = Product::findOrFail($id);
    $product->product_name = $request->product_name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->save();

    return redirect()->route('product', [$id]);
  }

  public function delete($id)
  {
    // $product = Product::find($id);
    // Storage::delete($product->picture);
    // $product->forceDelete();
    //
    // return redirect()->route('show-product');
  }

  public function test()
  {
    $results = Product::orderBy('id', 'desc')->first();
    return $results;
  }

}
