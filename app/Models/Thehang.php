<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thehang extends Model
{
    use HasFactory;

    protected $fillable = [
        'TH_KhachHangId',
        'TH_Ngay',
        'TH_ThanhTien',
        'TH_TrangThai'
    ];

    public function Khachhangs(){
        return $this->belongsTo(Khachhang::class,'TH_KhachHangId','id');
    }
    public function Chitietthehangs(){
        return $this->hasMany(Chitietthehang::class,'CTTH_TheHangId');
    }
}
