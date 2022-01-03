<?php
    namespace App\Http\Controllers;
    use App\Components\MenuRecusive;
    use App\Models\Menu;
    use App\Traits\AuthAdminTrait;
    use Illuminate\Http\Request;
    use Illuminate\support\str;
    use Exception;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\DB;

    class MenuController extends Controller
    {   private $menuRecusive;
        private $menu;
        use AuthAdminTrait;
        public function __construct(MenuRecusive $menuRecusive, Menu $menu)
        {
            $this->menuRecusive=$menuRecusive;
            $this->menu=$menu;
        }

        public function index(){
            $this->AuthLogin();
            $menus=$this->menu->latest()->paginate(10);
            return view ('admin.menus.index',compact('menus'));
        }

        public function create()
        {
            $this->AuthLogin();
            // $htmlOption=$this->getCategory($parentId='');
            $optionSelect=$this->menuRecusive->menuRecusiveAdd();         
            return view ('admin.menus.add',compact('optionSelect'));
        }

        public function store(Request $request){
            $this->menu->create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'slug'=> str::slug($request->name)
            ]);
            return redirect()->route('menus.index');
        }

        public function edit($id,Request $request){
            $menuEdit=$this->menu->find($id);
            $optionSelect=$this->menuRecusive->menuRecusiveEdit($menuEdit->parent_id); 
        return view ('admin.menus.edit',compact('optionSelect','menuEdit'));
        }

        public function update($id,Request $request){
            $this->menu->find($id)->update([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'slug'=> str::slug($request->name)
            ]);
            return redirect()->route('menus.index');
        }

        public function delete($id){
            try{
                $this->menu->find($id)->delete();
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