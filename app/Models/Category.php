<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'danhmucsaches';
    
    public function categoryChildren(){
        return $this->hasMany(Category::class, 'DMS_parentId');
    }

    public function products(){
        return $this->hasMany(Product::class, 'S_DanhmucId');
    }
}
