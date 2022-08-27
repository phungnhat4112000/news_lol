<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//trong controller muốn sử dụng đối tượng nào thì phải khai báo ở đây
//đối đwuọng thao tác csdl
use DB;
//đối tượng mã hoá password
use Hash;
class UsersController extends Controller
{
    //url: public/admin/users
    public function read()
    {   
        /*
         truy vấn dữ liệu
         DB::table("users") tác dộng vào bảng users
         orderBy("id","desc") <=> order by id desc
         paginate(4) <=> phân 4 bảng ghi trên một trang
         */
        $data = DB::table("users")->orderBy("id","desc")->paginate(4);
        //gọi view
        return view("backend.users_read",["data"=>$data]);
    }
    //update -GET
    public function update($id)
    {
        //tạo một action để đưa vào thuộc tính âction của thẻ form
        $action = url("admin/users/update/$id");
        //lấy một bản ghi
        //first() <=> lấy một bản ghi
        $record = DB::table("users")->where("id","=",$id)->first();
        return view("backend.users_create_update",["record"=>$record,"action"=>$action]);
    }

     //--update -POst
    public function updatePost($id)
    {
        $name = request("name");
        $password =request("password");
        //update name
        DB::table("users")->where("id","=",$id)->update(["name"=>$name]);
        //nếu password không rỗng thì update password
        if($password != "")
        {
            //mã hoá password
            $password = Hash::make($password);
            DB::table("users")->where("id","=",$id)->update(["password"=>$password]);
        }     
        //di chuyển đến một url khác
        return redirect(url("admin/users"));
    }

     //create - GET
    public function create(){
        //tạo một action để đưa vào thuộc tính action của thẻ form
        $action = url("admin/users/create");
        return view("backend.users_create_update",["action"=>$action]);
    }
    //create - POST
    public function createPost(){
        $email = request("email");
        $name = request("name");
        $password = request("password");
        //mã hoá password 
        $password = Hash::make($password);
        //kiểm tra xem email đã tồn tại chưa, nếu  chưa tồn tại thì mới cho insert
        //Count() <=> trả về số lượng bản ghi truy vấn
        $countEmail = DB::table("users")->where("email","=",$email)->Count();
        if($countEmail == 0){
            //insert 
            DB::table("users")->insert(["email"=>$email,"name"=>$name,"password"=>$password]);
            //di chuyển đến url khác 
            return redirect(url("admin/users"));
        }
        else
            return redirect(url("admin/users/create?notify=emailExists"));
    }

    //delete
    public function delete($id){
        //lấy một bản ghi
        //first() <=> lấy một bản ghi
        DB::table("users")->where("id","=",$id)->delete();
        //di chuyển đến một url khác 
        return redirect(url("admin/users"));
    }
}
