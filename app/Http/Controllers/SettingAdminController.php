<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Exception;
    use App\Models\Setting;
    use Illuminate\Support\Facades\Log;
    use App\Http\Requests\SettingRequest;
    use App\Traits\AuthAdminTrait;
    class SettingAdminController extends Controller
    {
        private $setting;
        use AuthAdminTrait;

        public function __construct(Setting $setting)
        {
            $this->setting=$setting;
        }

        public function index(){
            $this->AuthLogin();
            $settings=$this->setting->latest()->paginate(5);
            return view('admin.settings.index',compact('settings'));
        }

        public function create(){
            $this->AuthLogin();
            return view('admin.settings.add');
        }

        public function store(SettingRequest $request){
            $this->setting->create([
                'config_key'=>$request->config_key,
                'config_value'=>$request->config_value,
                'type'=>$request->type,
            ]);
            return redirect()->route('settings.index');
        }

        public function edit($id){
            $settings=$this->setting->find($id);
            return view('admin.settings.edit',compact('settings'));
        }

        public function update(SettingRequest $request,$id){
            $this->setting->find($id)->update([
                'config_key'=>$request->config_key,
                'config_value'=>$request->config_value,
                'type'=>$request->type,
            ]);
            return redirect()->route('settings.index');
        }

        public function delete($id){
            try{
                $this->setting->find($id)->delete();
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