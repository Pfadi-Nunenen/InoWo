<?php


namespace App\Helper;

use DB;

class Helper{
    public static function br2nl($str){
        return str_replace('<br />', '\n', $str);
    }
}
