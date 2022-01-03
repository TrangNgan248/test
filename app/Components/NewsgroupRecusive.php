<?php
    namespace App\Components;
    use App\Models\Nhomtin;
    class NewsgroupRecusive{
        private $data;
        private $htmlSelect = '';
        public function __construct($data)
        {
            $this->data = $data;
        }

        public function nhomtinRecusive($NT_ViTri, $id = 0, $text='')
        {
            foreach ($this->data as $value) {
                if($value['NT_ViTri'] == $id){
                    if( !empty($NT_ViTri) && $NT_ViTri==$value['id'] ){
                        $this->htmlSelect .= "<option selected value='".$value['id']."'>" . $text . $value['NT_Ten'] . "</option>";
                    } else {
                        $this->htmlSelect .= "<option value='".$value['id']."'>" . $text . $value['NT_Ten'] . "</option>";
                    }
                    $this->nhomtinRecusive($NT_ViTri, $value['id'], $text.'--');
                }
            }
            return $this->htmlSelect;
        }
    }
?>