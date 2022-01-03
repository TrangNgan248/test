<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tintuc extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'TT_TieuDe',
        'TT_TacGia',
        'TT_Ngay',
        'TT_MoTa',
        'TT_NoiDung',
        'TT_Anh',
        'TT_HienThi',
        'TT_NhomTin',
        'TT_TrangThai',
        'TT_paths'
    ];

    public function Nhomtins(){
        return $this->belongsTo(Nhomtin::class,'TT_NhomTin','id');
    }
}
