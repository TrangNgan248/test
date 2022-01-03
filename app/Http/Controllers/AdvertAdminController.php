<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\RequestAdvert;
    use Illuminate\Http\Request;
    use App\Models\Advert;
    use App\Traits\StorageImageTrait;
    use App\Traits\AuthAdminTrait;
    use Exception;
    USE Illuminate\Support\Facades\Log;

    class AdvertAdminController extends Controller
    {
        use StorageImageTrait;
        use AuthAdminTrait;
        private $advert;
        public function home(){
            $this->AuthLogin();
            return view('home');
        }
        public function __construct(Advert $advert)
        {
            $this->advert=$advert;
        }
        public function index(){
            $this->AuthLogin();
            $adverts=$this->advert->paginate(5);
            return view('admin.advert.index',compact('adverts'));
            
            // $adverts = $this->advert->paginate(5);
            // dd($adverts);
            // // return view('advert.index',compact('adverts'));
        }
        public function create(){
            $this->AuthLogin();
            return view('admin.advert.add');
        }
        public function store(RequestAdvert $request){
            try{
                $data= [
                    'name' => $request->name,
                    'description' => $request->description,
                ];
                $dataImgage =$this->storageTraitUploat($request,'image_path','advert');
                if(!empty($dataImgage))
                {
                    $data['image_name']=$dataImgage['file_name'];
                    $data['image_path']=$dataImgage['file_path'];
                }
                $this->advert->create($data);
                return redirect()->route('advert.index'); 
            }
            catch(Exception $exception){
                Log::error('Message:' . $exception->getMessage() . 'Line' . $exception->getLine());
            }
            
        }
        public function edit($id){
            $adverts=$this->advert->find($id);
            return view('admin.advert.edit', compact('adverts'));
        }
        public function update(RequestAdvert $request,$id){
            try{
                $data=[
                            'name'=>$request->name,
                            'description'=>$request->description,
                ];
                $dataImgage =$this->storageTraitUploat($request,'image_path','advert');
                if(!empty($dataImgage))
                {
                    $data['image_name']=$dataImgage['file_name'];
                    $data['image_path']=$dataImgage['file_path'];
                }
                $this->advert->find($id)->update($data);
                return redirect()-> route('advert.index');
            }
            catch(Exception $exception){
                Log::error('Message:' . $exception->getMessage() . 'Line' . $exception->getLine());
            }
        }
        
        public function delete($id){
            try{
                $this->advert->find($id)->delete();
                return response()->json([
                    'code'=>200,
                    'message'=>'success',
                ],200);
            }
            catch (Exception $exception) {
                Log::error('Message:' . $exception->getMessage() . 'Line' . $exception->getLine());
                return response()->json([
                    'code'=>500,
                    'message'=>'fail',
                ],500);
            }
        }
    }
?>