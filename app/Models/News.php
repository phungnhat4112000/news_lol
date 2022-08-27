<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//trong Model muon sử dụng dối tượng nào thì phải khai báo đói tượng đó
//sử dụng đối tượng DB để thao tác csdl
use DB;
//đối tượng để lááy get,POST,file
use Request;

class News extends Model
{
    use HasFactory;
    public function modelRead()
    {
        $data = DB::table("news")->orderBy("id","desc")->paginate(10);
        return $data;
    }
    //update
    public function modelGetRecord($id)
    {
        $record = DB::table("news")->where("id","=",$id)->first();
        return $record;
    }
    //update 
    public function modelUpdate($id)
    {
        $name= request("name");
        $category_id = request("category_id");
        $description = request("description");
        $content = request("content");
        $hot = request("hot") != "" ? 1 : 0;
        //update bản ghi
        DB::table("news")->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot]);
        //nếu có ảnh thì update ảnh
        if(Request::hasFile("photo"))
        {
            //--
            //lấy ảnh cũ để xoá
            //select("photo") <=> chỉ lấy trường dữ liệu có tên là photo trong table news
            $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
            if(isset($oldPhoto->photo) && file_exists("upload/news/".$oldPhoto->photo)&&$oldPhoto!="")
                //dấu @ để che dấu lỗi
                @unlink("upload/news/".$oldPhoto->photo);
            //---
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thực hiện upload ảnh
            Request::file("photo")->move("upload/news",$photo);
            //update bản ghi
            DB::table("news")->where("id","=",$id)->update(["photo"=>$photo]);
        }
    }

    //create
    public function modelCreate(){
        $name = request("name");
        $category_id = request("category_id");
        $description = request("description");
        $content = request("content");
        $hot = request("hot") != "" ? 1 : 0;
        $photo = "";
        //neu co anh thi update anh
        if(Request::hasFile("photo")){
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thuc hien upload anh
            Request::file("photo")->move("upload/news",$photo);
        }
        //insert ban ghi
        DB::table("news")->insert(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo]);        
    }
    //create
    public function modelDelete($id){
        //---
        //lay anh cu de xoa
        //select("photo") <=> chi lay truong du lieu co ten la photo trong table news
        $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
        if(isset($oldPhoto->photo) && file_exists("upload/news/".$oldPhoto->photo)&&$oldPhoto!="")
            //dau @ de che dau loi
            @unlink("upload/news/".$oldPhoto->photo);
        //---
        DB::table("news")->where("id","=",$id)->delete();
    }
}
