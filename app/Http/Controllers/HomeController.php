<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Product;
use App\ProductImage;
use App\Testimony;
use Akaunting\Money\Money;
use Vinkla\Instagram\Instagram;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('admin.home');
        }else {
            $products = Product::orderBy('product_name','asc')->get();
            $instagram = new Instagram('1236147385.1677ed0.8146cd7d31234dd68f49267cc4b78344');
            $result = array_slice($instagram->get(), 0, 6, true);
            return view('home', compact('products', 'result'));
        }
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);
        $product->price = Money::IDR($product->price, true);
        $images = ProductImage::where('product_id', $id)->orderBy('created_at', 'asc')->get();
        foreach ($images as $image) {
        $image->path = Storage::url($image->path);
        }
        if(Auth::check()){
            return view('admin.detail-product', compact('product', 'images'));
        }else {
            $products = Product::orderBy('product_name','asc')->get();
        return view('product', compact('products', 'product', 'images'));
        }
    }

    public function testimony()
    {
        if(Auth::check()){
            return redirect()->back();
        }else {
            $testimonies = Testimony::orderBy('created_at','desc')->get();
            $products = Product::orderBy('product_name','asc')->get();
            foreach ($testimonies as $testimony) {
                $testimony->picture = Storage::url($testimony->picture);
            }
            return view('testimony', compact('testimonies', 'products'));
        }
    }

    public function generate()
    {
        return bcrypt('admin');
    }
}
