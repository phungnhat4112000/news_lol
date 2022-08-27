<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//đối tượng thao tác csdl
use DB;
//muốn sử dụng model Categories thig phải khai báo ở đây -> sử dụng eloquent
use App\Models\Categories;
///đối tượng kiểm tra dữ liệu
use Validator;
class CategoriesController extends Controller
{
     //url : public/admin/categories
     public function read()
    {   
        /*
         truy vấn dữ liệu
         DB::table("users") tác dộng vào bảng users
         orderBy("id","desc") <=> order by id desc
         paginate(4) <=> phân 4 bảng ghi trên một trang
         */
        $data = Categories::orderBy("id","desc")->paginate(4);
        //gọi view
        return view("backend.categories_read",["data"=>$data]);
    }
    //update -GET
    public function update($id)
    {
        //tạo một action để đưa vào thuộc tính âction của thẻ form
        $action = url("admin/categories/update/$id");
        //lấy một bản ghi
        //first() <=> lấy một bản ghi
        $record = Categories::where("id","=",$id)->first();
        return view("backend.categories_create_update",["record"=>$record,"action"=>$action]);
    }
    //--update -POst
    public function updatePost($id)
    {
        $name = request("name");
        //update name
        Categories::where("id","=",$id)->update(["name"=>$name]);
        //di chuyển đến một url khác
        return redirect(url("admin/categories"));
    }
    //create - GET
    public function create(){
        //tạo một action để đưa vào thuộc tính action của thẻ form
        $action = url("admin/categories/create");
        return view("backend.categories_create_update",["action"=>$action]);
    }
    //create - POST
    public function createPost(){
 
        $name = request("name");
            //insert 
            Categories::insert(["name"=>$name]);
            //di chuyển đến url khác 
            return redirect(url("admin/categories"));
        }
       
    

    //delete
    public function delete($id){
        //lấy một bản ghi
        //first() <=> lấy một bản ghi
        Categories::where("id","=",$id)->delete();
        //di chuyển đến một url khác 
        return redirect(url("admin/categories"));
    }
}
