<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    //tạo biến $model (là một biến trong class NewsController)
    public $model;
    //hàm tạo
    public function __construct(){
        //gắn biến model trở thành biến object của class News
        $this->model = new News();
    } 
    //lấy danh sách các bản ghi
    public function read(){
        //lấy dữ liệu từ hàm modelRead của class News
        $data = $this->model->modelRead();
        //gọi view,truyền dữ liệu ra view
        return view("backend.news_read",["data"=>$data]);
    }
    //update
    public function update($id)
    {
        //tạo một action  để đưa vào thuộc tính action của thẻ form
        $action = url("admin/news/update/$id");
        //lấy  dữ liệu từ model
        $record = $this->model->modelGetRecord($id);
        return view("backend.news_create_update",["record"=>$record,"action"=>$action]);
    }
    //update Post
    public function updatePost($id)
    {
        $this->model->modelUpdate($id);
        return redirect(url('admin/news'));
    }
    //create
    public function create(){
        //tao mot action de dua vao thuoc tinh action cua the form
        $action = url("admin/news/create");
        return view("backend.news_create_update",["action"=>$action]);
    }
    //create post
    public function createPost(){
        $this->model->modelCreate();
        return redirect(url('admin/news'));
    }
    //delete
    public function delete($id){
        $this->model->modelDelete($id);
        return redirect(url('admin/news'));
    }
}
