<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Products;

class Front extends Controller
{
    public function defaultfront(){
        $cat = Category::all();
        session(["category"=>$cat]);
       
        return view('front.home');
    }
    public function login(){
        return view('front.login');
    }
    public function contact(){
        return view('front.contact');
    }
    public function cart(){
        return view('front.cart');
    }
    public function checkout(){
        return view('front.checkout');
    }
    public function blog(){
        return view('front.blog');
    }
    public function blog_single(){
        return view('front.blog-single');
    }
    public function error(){
        return view('front.404');
    }
    public function shop(){
        return view('front.shop');
    }
    public function product_details(){
        return view('front.product-details');
    }
    public function products($id){
        $data=Products::all()->where('cid',$id);
        return view("front.frontcat",compact('data'));

        // return view('front.frontcat');
    }
}
