<?php

namespace App\Http\Controllers;

use app\helpers\helper;
use Illuminate\Http\Request;


class TestingHelperController extends Controller
{
    //
    public function index(){
 
         helper::test();
        //helper::IDGenerator();
    }
}
