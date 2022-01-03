<?php
    namespace App\Components;
    use App\Models\Tintuc;
    class NewsRecusive{
        private $data;
        private $htmlSelect = '';
        public function __construct($data)
        {
            $this->data = $data;
        }

        public function tintucRecusive($id = 0, $text='')
        {
            foreach ($this->data as $value) {
                $this->htmlSelect .= "<option value='".$value['id']."'>" . $text . $value['TT_TieuDe'] . "</option>";
            }
            return $this->htmlSelect;
        }
    }
?>