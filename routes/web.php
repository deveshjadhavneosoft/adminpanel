<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;
use App\Http\Controllers\Front;

Route::get('/', [Front::class,'defaultfront']);
Route::get("/product/{id}",[Front::class,"products"]);


Route::get('/login', [Front::class,'login']);
Route::get('/contact', [Front::class,'contact']);
Route::get('/cart', [Front::class,'cart']);
Route::get('/checkout', [Front::class,'checkout']);
Route::get('/blog', [Front::class,'blog']);
Route::get('/blog-single', [Front::class,'blog_single']);
Route::get('/error', [Front::class,'error']);
Route::get('/shop', [Front::class,'shop']);
Route::get('/product-details', [Front::class,'product_details']);

Route::get('/adminpanel/login', [Main::class,'adminpanel_login']);

Route::post('/login', [Main::class,'login']);

Route::get('/adminpanel/register', [Main::class,'adminpanel_register']);

Route::post('/register', [Main::class,'register']);

// Route::get('/adminpanel/dashboard', [Main::class,'dashboard_adminpanel']);

// Route::get('/adminpanel/changepass', [Main::class,'changepass_adminpanel']);

// Route::post('/changepass', [Main::class,'changepass']);

// Route::get('/adminpanel/edit', [Main::class,'edit_adminpanel']);

// Route::post('/update', [Main::class,'update']);

// Route::get('adminpanel/feedback', [Main::class,'feedback_adminpanel']);

// Route::post('/feedback', [Main::class,'feedback']);

// Route::get("/adminpanel/logout",[Main::class,"logout"]);

// Route::get('/adminpanel/changeimage', [Main::class,'changeimage_adminpanel']);

// Route::post('/changeimage', [Main::class,'changeimage']);

// Route::get("/adminpanel/category",[Main::class,"category"]);
// Route::get("/adminpanel/addcategory",[Main::class,"addcategory"]);
// Route::post("/postaddcategory",[Main::class,"postaddcategory"]);

// Route::get("/adminpanel/products",[Main::class,"products"]);
// Route::get("/adminpanel/addproducts",[Main::class,"addproducts"]);
// Route::post("/postaddproducts",[Main::class,"postaddproducts"]);

// Route::delete("/adminpanel/deletecategory",[Main::class,'delcategory']);
// Route::get("/adminpanel/editcategory/{id}",[Main::class,"editcategory"]);
// Route::post("updatecategory",[Main::class,"updatecategory"]);


Route::middleware([checksession::class])->group(function(){
    Route::get('testing',function(){
        return "Access Granted";
    });

    Route::get('/adminpanel/dashboard', [Main::class,'dashboard_adminpanel']);

    Route::get('/adminpanel/changepass', [Main::class,'changepass_adminpanel']);

    Route::post('/changepass', [Main::class,'changepass']);

    Route::get('/adminpanel/edit', [Main::class,'edit_adminpanel']);

    Route::post('/update', [Main::class,'update']);

    Route::get('adminpanel/feedback', [Main::class,'feedback_adminpanel']);

    Route::post('/feedback', [Main::class,'feedback']);

    Route::get("/adminpanel/logout",[Main::class,"logout"]);

    Route::get('/adminpanel/changeimage', [Main::class,'changeimage_adminpanel']);

    Route::post('/changeimage', [Main::class,'changeimage']);

    Route::get("/adminpanel/category",[Main::class,"category"]);
    Route::get("/adminpanel/addcategory",[Main::class,"addcategory"]);
    Route::post("/postaddcategory",[Main::class,"postaddcategory"]);

    Route::get("/adminpanel/products",[Main::class,"products"]);
    Route::get("/adminpanel/addproducts",[Main::class,"addproducts"]);
    Route::post("/postaddproducts",[Main::class,"postaddproducts"]);

    Route::delete("/adminpanel/deletecategory",[Main::class,'delcategory']);
    Route::get("/adminpanel/editcategory/{id}",[Main::class,"editcategory"]);
    Route::post("updatecategory",[Main::class,"updatecategory"]);

    Route::delete("/adminpanel/deleteproducts",[Main::class,'delproducts']);
    Route::get("/adminpanel/editproducts/{id}",[Main::class,"editproducts"]);
    Route::post("updateproducts",[Main::class,"updateproducts"]);

});