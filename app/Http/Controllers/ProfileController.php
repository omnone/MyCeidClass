<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;

class ProfileController extends Controller
{
    /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //selida diaxeirisi profile xristi
    public function profile_index()
    {
        return view('user.settings');
    }

    //statistika foititi
     public function foititis_statistika()
    {
        return view('user.student_statistics');
    }
}
