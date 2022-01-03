<?php
    namespace App\Http\Controllers;

    use App\Components\Recusive;
    use App\Http\Controllers\Controller;
    use App\Models\Danhmucsach;
    use App\Models\Nxb;
    use App\Models\Sach;
    use App\Models\Tacgia;
    use App\Traits\AuthAdminTrait;
    use App\Traits\StorageImageTrait;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
    use Exception;
    USE Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\DB;

    class SachController extends Controller
    {   
        use AuthAdminTrait;
        use StorageImageTrait;
        private $category;
        private $sp;
        private $nxb;
        private $tacgia;
        private $htmlSelect = '';
        private $htmlSelect2 = '';
        
        public function __construct(Danhmucsach $category,Sach $sp,Tacgia $tacgia,Nxb $nxb)
        {
            $this->category=$category;
            $this->sp=$sp;
            $this->nxb=$nxb;
            $this->tacgia=$tacgia;
            
        }

        public function index(){
            $this->AuthLogin();
            $saches=$this->sp->paginate(5);
            return view ('admin.sachs.index',compact('saches'));
        }
            
        public function create()
        {
            $this->AuthLogin();
            $htmlOption=$this->getCategory($parentId='');
            $htmlOptionn=$this->getTacgia($id='');    
            $htmlOptionnn=$this->getNXB($id='');     
            return view ('admin.sachs.add',compact('htmlOption','htmlOptionn','htmlOptionnn'));
        }

        public function getCategory($parentId){
            $data=$this->category->all();
            $recusive=new Recusive($data);
            $htmlOption=$recusive->danhmucsachRecusive($parentId);
            return $htmlOption;
        }

        public function getTacgia($id){
            $data1 = $this->tacgia->all();
            foreach ($data1 as $value) {
                if( !empty($id) && $id==$value['id'] ){
                    $this->htmlSelect .= "<option selected value='".$value['id']."'>" . $value['TG_HoTen'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='".$value['id']."'>" . $value['TG_HoTen'] . "</option>";
                }
            }
            $htmlOptionn = $this->htmlSelect;
            return $htmlOptionn;
        }

        public function getNXB($id){
            $data1 = $this->nxb->all();
            foreach ($data1 as $value) {
                if( !empty($id) && $id==$value['id'] ){
                    $this->htmlSelect2 .= "<option selected value='".$value['id']."'>" . $value['NXB_Ten'] . "</option>";
                } else {
                    $this->htmlSelect2 .= "<option value='".$value['id']."'>" . $value['NXB_Ten'] . "</option>";
                }
            }
                $htmlOptionnn = $this->htmlSelect2;
                return $htmlOptionnn;
        }
            
        public function store(Request $request){
            try{
                DB::beginTransaction();
                $dataSach=[
                    'S_Ten'=>$request->S_Ten,
                    'S_GiaBan'=>$request->S_GiaBan,
                    'S_DanhmucId'=>$request->S_DanhmucId,
                    'S_Mota'=>$request->S_Mota,
                    'S_Chitiet'=>$request->S_Chitiet,
                    'S_TuKhoa'=>$request->S_TuKhoa,
                    'S_NXBId'=>$request->S_NXBId,
                    'S_SoLuong'=>$request->S_SoLuong,
                    'S_TacGiaId'=>$request->S_TacGiaId
                ];
                $dataUp=$this->storageTraitUploat($request,'S_Anh','sachs');
                if(!empty($dataUp)){
                    $dataSach['S_Anh']=$dataUp['file_name'];
                    $dataSach['S_ViTri']=$dataUp['file_path'];
                }
                $sp=$this->sp->create($dataSach);
                DB::commit();
                return redirect()->route('sachs.index');
            } catch(Exception $exception){
                DB::rollBack();
                Log::error('Message:' . $exception->getMessage() . 'Line' . $exception->getLine());
            }
        }

        public function edit($id){
            $sachEdit=$this->sp->find($id); //sp laf bien  nhan dl
            $htmlOption=$this->getCategory($sachEdit->S_DanhmucId);
            $htmlOptionnn=$this->getNXB($sachEdit->S_NXBId);
            $htmlOptionn = $this->getTacgia($sachEdit->S_TacGiaId);
            return view ('admin.sachs.edit',compact('sachEdit','htmlOption','htmlOptionn','htmlOptionnn'));
        }

        public function update(Request $request,$id){
            try{
                DB::beginTransaction();
                $dataSach=[
                    'S_Ten'=>$request->S_Ten,
                    'S_GiaBan'=>$request->S_GiaBan,
                    'S_DanhmucId'=>$request->S_DanhmucId,
                    'S_Mota'=>$request->S_Mota,
                    'S_Chitiet'=>$request->S_Chitiet,
                    'S_TuKhoa'=>$request->S_TuKhoa,
                    'S_NXBId'=>$request->S_NXBId,
                    'S_TacGiaId'=>$request->S_TacGiaId
                ];
                $dataUp=$this->storageTraitUploat($request,'S_Anh','sachs');
                if(!empty($dataUp)){
                    $dataSach['S_Anh']=$dataUp['file_name'];
                    $dataSach['S_ViTri']=$dataUp['file_path'];
                }
                $sp=$this->sp->find($id)->update($dataSach);
                DB::commit();
                return redirect()->route('sachs.index');
            } catch(Exception $exception){
                DB::rollBack();
                Log::error('Message:' . $exception->getMessage() . 'Line' . $exception->getLine());
            }
            return redirect()->route('sachs.index');
        }

        public function delete($id){
            try{
                $this->sp->find($id)->delete();
                return response()->json([
                        'code'=>200,
                        'message'=>'success',        
                ],200);
            }
            catch(Exception $exception){
                Log::error('Message:' . $exception->getMessage() . 'Line' . $exception->getLine());
                return response()->json([
                        'code'=>500,
                        'message'=>'fail',            
                ],500);
            }
        }
    }
?>