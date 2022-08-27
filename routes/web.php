<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-------------
//url public/login
Route::get("login",function(){
    //hash là chế độ mã hoá password trong laravel
    //echo Hash::make("123");
    return view("backend.login");
});
//url public/logout
Route::get("logout",function(){
    Auth::logout();
    return redirect(url("login"));
});
//---
// sau khi aasn nut submit
Route::post("login",function(){
    // lấy các  giá trị form
    $email = request("email");
    $password= request("password");
    //Auth::Attempt ->trả về true nếu email, password khớp với bẩng users
    if(Auth::Attempt(["email"=>$email,"password"=>$password]))
        return redirect(url("admin/users"));
    else
        return redirect(url('login')); 

});
//-------------
//url:public/admin/user
//khai bao class controller o day
use App\Http\Controllers\UsersController;
//url: public/admin/users -> hien thi danh sach cac ban ghi
Route::get("admin/users",[UsersController::class,"read"])->middleware("check_login");
//url: public/admin/users/update/id -> sua ban ghi - GET
Route::get("admin/users/update/{id}",[UsersController::class,"update"])->middleware("check_login");
//url: public/admin/users/update/id -> sua ban ghi - POST
Route::post("admin/users/update/{id}",[UsersController::class,"updatePost"])->middleware("check_login");
//url: public/admin/users/create -> them ban ghi - GET
Route::get("admin/users/create",[UsersController::class,"create"])->middleware("check_login");
//url: public/admin/users/create -> them ban ghi - POST
Route::post("admin/users/create",[UsersController::class,"createPost"])->middleware("check_login");
//url: public/admin/users/delete/id -> xoa ban ghi - GET
Route::get("admin/users/delete/{id}",[UsersController::class,"delete"])->middleware("check_login");
//----------------------------
//----------------------------



//----------------------------
//khai bao class controller o day
use App\Http\Controllers\CategoriesController;
//url: public/admin/categories -> hien thi danh sach cac ban ghi
Route::get("admin/categories",[CategoriesController::class,"read"])->middleware("check_login");
//url: public/admin/categories/update/id -> sua ban ghi - GET
Route::get("admin/categories/update/{id}",[CategoriesController::class,"update"])->middleware("check_login");
//url: public/admin/categories/update/id -> sua ban ghi - POST
Route::post("admin/categories/update/{id}",[CategoriesController::class,"updatePost"])->middleware("check_login");
//url: public/admin/categories/create -> them ban ghi - GET
Route::get("admin/categories/create",[CategoriesController::class,"create"])->middleware("check_login");
//url: public/admin/categories/create -> them ban ghi - POST
Route::post("admin/categories/create",[CategoriesController::class,"createPost"])->middleware("check_login");
//url: public/admin/categories/delete/id -> xoa ban ghi - GET
Route::get("admin/categories/delete/{id}",[CategoriesController::class,"delete"])->middleware("check_login");
//----------------------------



//----------------------------
//khai bao class controller o day
use App\Http\Controllers\NewsController;
//url: public/admin/news -> hien thi danh sach cac ban ghi
Route::get("admin/news",[NewsController::class,"read"])->middleware("check_login");
//url: public/admin/news/update/id -> sua ban ghi - GET
Route::get("admin/news/update/{id}",[NewsController::class,"update"])->middleware("check_login");
//url: public/admin/news/update/id -> sua ban ghi - POST
Route::post("admin/news/update/{id}",[NewsController::class,"updatePost"])->middleware("check_login");
//url: public/admin/news/create -> them ban ghi - GET
Route::get("admin/news/create",[NewsController::class,"create"])->middleware("check_login");
//url: public/admin/news/create -> them ban ghi - POST
Route::post("admin/news/create",[NewsController::class,"createPost"])->middleware("check_login");
//url: public/admin/news/delete/id -> xoa ban ghi - GET
Route::get("admin/news/delete/{id}",[NewsController::class,"delete"])->middleware("check_login");
//-----







//frontend
// Route::get('/', function () {
//     return view('welcome');
// });


//trang chủ
Route::get('/',function(){
    return view('frontend.home');
});
//trang danh mục
Route::get('news/category/{category_id}',function($category_id){
    return view('frontend.newscategory',["category_id"=>$category_id]);
});
//trang chi tiết

Route::get("news/detail/{id}",function($id){
    return view('frontend.newsdetail',["id"=>$id]);
});