<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Danhmucsach extends Model
    {
        use HasFactory,SoftDeletes;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'DMS_Tieude',
            'DMS_parentId',
            'DMS_Mota',
            //         'DMS_TrangThai',
            'DMS_Vitri'
        ];
        public function Sachs(){
            return $this->hasMany(Sach::class,'S_DanhmucId');
        }
    }
?>
