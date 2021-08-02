<?php
class kripto{
    public $key = "979a218e0632df2935317f98d47956c7";

    public function set_key($key){
        $this->key = $key;
    } 
    public function get_key(){
        return $this->key;
    }

    public function encript_kripto($str) {
            $kunci = $this->get_key();
            $hasil = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $karakter = substr($str, $i, 1);
                $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
                $karakter = chr(ord($karakter)+ord($kuncikarakter));
                $hasil .= $karakter;
            }
            return urlencode(base64_encode($hasil));
        }
    public function descript_kripto($str) {
            $str = base64_decode(urldecode($str));
            $hasil = '';
            $kunci = $this->get_key();
            for ($i = 0; $i < strlen($str); $i++) {
                $karakter = substr($str, $i, 1);
                $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
                $karakter = chr(ord($karakter)-ord($kuncikarakter));
                $hasil .= $karakter;
            }
            return $hasil;
        }
}




// $new = new kripto();
// $new->set_key("979a218e0632df2935317f98d47956c7");
// echo $new->descript_kripto("nKCm");