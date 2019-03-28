<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;


class PagesController extends Controller
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


    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if ($user->role =="student") {
            // vriskw ta mathimata pou einai eggegramenos o foititis
            $user_lessons = $user->subscribed_lessons()->orderBy('eksamino')->get();
            return view('pages.index')->with('lessons', $user_lessons);
        } else {
            // vriskw mathimata pou didaskei o kathigitis
            $user_lessons = $user->teaching_lessons()->orderBy('eksamino')->get();
            return view('pages.index')->with('lessons', $user_lessons);
        }
    }


    public function lesson_index($lesson_name){

        $lesson = Lesson::where('name',$lesson_name)->first();
        return view('lessons.lesson_page')->with('lesson', $lesson);

    }
}
