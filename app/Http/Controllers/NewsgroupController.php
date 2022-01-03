<?php
    namespace App\Http\Controllers;
    use App\Traits\AuthAdminTrait;
    use App\Models\Nhomtin;
    use App\Models\Tintuc;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Components\NewsgroupRecusive;
    // use App\Components\NewsRecusive;

    class NewsgroupController extends Controller
    {
        private $tintuc;
        private $nhomtin;
        use AuthAdminTrait;

        public function __construct(Nhomtin $nhomtin, Tintuc $tintuc)
        {
            $this->nhomtin = $nhomtin;
            $this->tintuc = $tintuc;
        }

        public function create(){
            $this->AuthLogin();
            $htmlOption = $this->getNhomtin($NT_ViTri = '');
            return view('admin.newsgroup.add', compact('htmlOption')); 
        }

        public function index(){
            $this->AuthLogin();
            $nhomtins = $this->nhomtin->latest()->paginate(3);
            return view('admin.newsgroup.index', compact('nhomtins')); 
        }

        public function store(Request $request){
            $this->nhomtin->create([
                'NT_Ten' => $request->NT_Ten,
                'NT_MoTa' => $request->NT_MoTa,
                'NT_ViTri' => $request->NT_ViTri,
            ]);
            return redirect()->route('newsgroup.index');
        }

        public function getNhomtin($NT_ViTri){
            $data = $this->nhomtin->all();
            $recusive = new NewsgroupRecusive($data);
            $htmlOption = $recusive->nhomtinRecusive($NT_ViTri);
            return $htmlOption;
        }

        public function edit($id){
            $nhomtin = $this->nhomtin->find($id);
            $htmlOption = $this->getNhomtin($nhomtin->NT_ViTri);
            return view('admin.newsgroup.edit', compact('nhomtin', 'htmlOption'));
        }

        public function update($id, Request $request){
            $this->nhomtin->find($id)->update([
                'NT_Ten' => $request->NT_Ten,
                'NT_MoTa' => $request->NT_MoTa,
                'NT_ViTri' => $request->NT_ViTri,
            ]);
            return redirect()->route('newsgroup.index');
        }
        
        public function delete($id){
            $this->nhomtin->find($id)->delete();
            return redirect()->route('newsgroup.index');
        }
    }
?>