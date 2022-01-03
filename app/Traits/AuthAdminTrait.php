<?php
namespace App\Traits;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
trait AuthAdminTrait
{
    public function AuthLogin(){
        $id=session()->get('email');
        if($id){
            return redirect()->to('home');
        }
        else{
            return redirect()->to('admin')->send();
        }
    }
}
?>