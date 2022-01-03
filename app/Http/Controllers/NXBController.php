<?php
    namespace App\Http\Controllers;

    use App\Models\Nxb;
    use App\Http\Controllers\Controller;
    use App\Traits\AuthAdminTrait;
    use Illuminate\Http\Request;
    use Exception;
    use Illuminate\Support\Facades\Log;

    class NXBController extends Controller
    {
        private $nxb;
        private $htmlSelect = '';
        use AuthAdminTrait;

        public function __construct(Nxb $nxb)
        {
            $this->nxb = $nxb;
        }

        public function create(){
            $this->AuthLogin();
            $htmlOption = $this->getNXB($id = '');
            return view('admin.nxbs.add', compact('htmlOption')); 
        }

        public function index(){
            $this->AuthLogin();
            $nxbs = $this->nxb->latest()->paginate(3);
            return view('admin.nxbs.index', compact('nxbs')); 
        }

        public function store(Request $request){
            $this->nxb->create([
                'NXB_Ten' => $request->NXB_Ten,
                'NXB_Mota' => $request->NXB_Mota
            ]);
            return redirect()->route('nxbs.index');
        }

        public function getNXB($id){
            $data1 = $this->nxb->all();
            foreach ($data1 as $value) {
                if( !empty($id) && $id==$value['id'] ){
                    $this->htmlSelect .= "<option selected value='".$value['id']."'>" . $value['NXB_Ten'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='".$value['id']."'>" . $value['NXB_Ten'] . "</option>";
                }
            }
            $htmlOption = $this->htmlSelect;
            return $htmlOption;
        }

        public function edit($id){
            $nxb = $this->nxb->find($id);
            $htmlOption = $this->getNXB($nxb->id);
            return view('admin.nxbs.edit', compact('nxb', 'htmlOption'));
        }

        public function update($id, Request $request){
            $this->nxb->find($id)->update([
                'NXB_Ten' => $request->NXB_Ten,
                'NXB_Mota' => $request->NXB_Mota
            ]);
            return redirect()->route('nxbs.index');
        }

        public function delete($id){
            try{
                $this->nxb->find($id)->delete();
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