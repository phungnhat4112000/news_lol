<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// sử dụng eloquent
class Categories extends Model
{
    use HasFactory;
    //khai báo tênn table để sử dụng 
    protected $table = "categories";
    //nếu trong table categories không có 2 cột create_at va update_at thì phải khai báo  dông code bên dưới
    public $timestamps = false;
}
