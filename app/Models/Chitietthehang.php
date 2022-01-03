<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Chitietthehang extends Model
    {
        use HasFactory;
        use HasFactory;
        protected $fillable = [
            'CTTH_TheHangId',
            'CTTH_SachId',
            'CTTH_SoLuong',
            'CTTH_ThanhTien'
        ];
        public function Sachs(){
            return $this->belongsTo(Sach::class,'CTTH_SachId','id');
        }
        public function Thehangs(){
            return $this->belongsTo(Thehang::class,'CTTH_TheHangId','id');
        }
    }
?>