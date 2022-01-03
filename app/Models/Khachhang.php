<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Khachhang extends Model
    {
        use HasFactory;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'KH_TenTruyCap',
            'KH_MatKhau',
            'KH_HoTen',
            'KH_Email',
            'KH_NgayBatDau',
            'KH_TrangThai',
            'KH_DienThoai',
            'KH_DiaChi'
        ];
        public function Thehangs(){
            return $this->hasMany(Thehang::class,'TH_KhachHangId');
        }
    }
?>
