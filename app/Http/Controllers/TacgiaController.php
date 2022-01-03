<?php
    namespace App\Http\Controllers;

    use App\Models\Tacgia;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Exception;
    use Illuminate\Support\Facades\Log;
    use App\Traits\AuthAdminTrait;
    class TacgiaController extends Controller
    {   
        use AuthAdminTrait;
        private $tacgia;
        private $htmlSelect = '';

        public function __construct(Tacgia $tacgia)
        {
            $this->tacgia = $tacgia;
        }

        public function create(){
            $this->AuthLogin();
            $htmlOption = $this->getTacgia($id = '');
            return view('admin.tacgias.add', compact('htmlOption')); 
        }

        public function index(){
            $this->AuthLogin();
            $tacgias = $this->tacgia->latest()->paginate(3);
            return view('admin.tacgias.index', compact('tacgias')); 
        }

        public function store(Request $request){
            $this->tacgia->create([
                'TG_HoTen' => $request->TG_HoTen,
                'TG_Mota' => $request->TG_Mota
            ]);
            return redirect()->route('tacgias.index');
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
            $htmlOption = $this->htmlSelect;
            return $htmlOption;
        }

        public function edit($id){
            $tacgia = $this->tacgia->find($id);
            $htmlOption = $this->getTacgia($tacgia->id);
            return view('admin.tacgias.edit', compact('tacgia', 'htmlOption'));
        }

        public function update($id, Request $request){
            $this->tacgia->find($id)->update([
                'TG_HoTen' => $request->TG_HoTen,
                'TG_Mota' => $request->TG_Mota
            ]);
            return redirect()->route('tacgias.index');
        }

        public function delete($id){
            try{
                $this->tacgia->find($id)->delete();
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