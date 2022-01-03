<?php
    namespace App\Components;
    class Recusive{
        private $data;
        private $html5Select='';
        public function __construct($data)
        {
            $this->data=$data;
        }

        public function danhmucsachRecusive($parentId,$id=0,$text= ''){
            foreach ($this->data as $value){
                if ($value['DMS_parentId']==$id){
                    if(!empty($parentId) && $parentId==$value['id']){
                        $this->html5Select.= "<option selected value=' ".$value['id']." ' >" . $text. $value['DMS_Tieude']."</option>";
                    } else{
                        $this->html5Select.= "<option value=' ".$value['id']." ' >" . $text. $value['DMS_Tieude']."</option>";
                    }
                    $this->danhmucsachRecusive($parentId,$value['id'],$text. '-');
                }
            }
            return $this->html5Select;
        } 
    }
?>