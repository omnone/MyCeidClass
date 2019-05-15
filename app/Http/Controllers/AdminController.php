<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Eksetasi;
use App\Aithousa;
use App\Eksetastiki_Periodos;

class AdminController extends Controller
{
    //
    public function admin_index()
    {
        return view("admin.admin_index");
    }

    public function eksetastiki_index()
    {
        $eksetastiki = Eksetastiki_Periodos::where('finished', 0)->first();
        $eksetaseis = $eksetastiki->exams()->get();

        return view("admin.eksetastiki_index")->with('data', ['eksetaseis'=>$eksetaseis ,'eksetastiki' => $eksetastiki]);
        ;
    }

    public function save_eksetastiki(Request $request)
    {
        return $request;
        $eksetasi = Eksetasi::where('finished', 0)->first();
    }

    // public function save_eksetastiki(){

    // }
}
