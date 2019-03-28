<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;

class LessonsController extends Controller
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

    // arxiki selida
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

    // metabasi stin selida mathimatos
    public function lesson_index($lesson_name)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $lesson = Lesson::where('name', $lesson_name)->first();
        $is_subscribed = $user->subscribed_lessons()->where('name', $lesson_name)->get();

        return view('lessons.lesson_page')->with('data', ['lesson' => $lesson,'has_sub' => $is_subscribed]);
    }

    // dikse ola ta diathesima mathimata
    public function lesson_show()
    {
        $all_lessons = Lesson::all();
        $title ='Μαθήματα';
        $subtitle = 'Όλα τα μαθήματα';

        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        $user_lessons = $user->subscribed_lessons()->get();

        return view('lessons.lessons')->with('data', ['subtitle' => $subtitle,'title' => $title,'lessons' => $all_lessons,'subscriptions' => $user_lessons]);
    }

    // emfanisei mathimatwn pou exei eggrafei o xristis
    public function subscriptions()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if ($user->role =="student") {
            $user_lessons=$user->subscribed_lessons()->orderBy('eksamino')->get();
        } else {
            $user_lessons=$user->teaching_lessons()->orderBy('eksamino')->get();
        }

        $title ='Μαθήματα';
        $subtitle = 'Τα μαθήματα μου';

        return view('lessons.lessons')->with('data', ['subtitle' => $subtitle,'title' => $title,'lessons' => $user_lessons]);
    }


    // grigori anazitisi mathimatos
    public function search(Request $request)
    {
        $term = $request->term;
        $lessons = Lesson::where('name', 'LIKE', '%'.$term.'%')->get();

        if (count($lessons)==0) {
            $searchResult[]='Κανένα Αποτέλεσμα';
        } else {
            foreach ($lessons as $key => $value) {
                $searchResult[] = $value->name;
            }
        }

        return $searchResult;
    }

    // metabasi sto mathima pou anazitithike
    public function search_result(Request $request)
    {
        $lesson = Lesson::where('name', $request->searchlesson)->first();


        return redirect()->action(
            'LessonsController@lesson_index',
            ['lesson_name' => $lesson->name]
);
    }


    //eggrafi se mathima
    public function subscribe_to_lesson(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $lesson = Lesson::where('id', $request->input('lesson_id'))->first();

        // grapse ton xristi sto mathima
        if ($request->input('mode') == 'subscribe') {
            $user->subscribed_lessons()->attach($request->input('lesson_id'));
            return redirect('lessons/subscriptions')->with('success', 'Εγγραφήκατε επιτυχώς στο μάθημα: '.$lesson->name);
        } else {//aliws ksegrapston
            $user->subscribed_lessons()->detach($request->input('lesson_id'));
            return redirect('lessons/subscriptions')->with('success', 'Απεγγραφήκατε επιτυχώς από μάθημα: '.$lesson->name);
        }
    }
}
