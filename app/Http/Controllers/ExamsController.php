<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;

class ExamsController extends Controller
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

    public function show_exams_program()
    {
        return view("exams.exams_program");
    }

    public function participation_index()
    {
        return view("exams.exams_index");
    }
}
