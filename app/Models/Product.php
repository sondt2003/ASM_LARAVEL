<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    
        use HasFactory,SoftDeletes;
        protected $table = "product";
        protected $fillable = ['id','name','id_category','id_sale','price','image','description']; // định nghĩa những trường csdl gán trong model để add được giá trị lên
    
}
