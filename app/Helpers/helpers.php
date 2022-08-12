<?php
namespace app\helpers;
use Illuminate\Support\Facades\Auth;

// if(!function_exists('email')){
//     function email(){
//         $user = Auth::user();
//         return $user->email;
//     }
// }
class helper
{
    public static function test(){
        return view('customer.index'); 
        //echo 'hello helper';
    }

    //public static function IDGenerator($model, $trow, $length=4, $prefix)
    public  static function  IDGenerator($model, $trow, $length, $prefix)
    {
        $data = $model::orderBy('id','desc')->first();
        if(! $data){
            $og_length = $length;
            $last_number = '';
        }else{
                $code = substr($data->$trow, strlen($prefix)+1);
               
                $actual_last_number = ($code/1)*1;
                $increment_last_number = $actual_last_number;
                $last_number_length = strlen($increment_last_number);
                $log_length = $length- $last_number_length;
                $last_number = $increment_last_number;
        } 
        $zeros ='';
        for($i=0; $i<$log_length; $i++){
            $zeros.="0";
        }
        return $prefix.'-'.$zeros.$last_number;
    }
}