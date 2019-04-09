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

    // metabasi stin selida mathimatos
    public function lesson_index($lesson_name)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $lesson = Lesson::where('name', $lesson_name)->first();
        $is_subscribed = $user->subscribed_lessons()->where('name', $lesson_name)->get();

        return view('lessons.lesson_page')->with('data', ['lesson' => $lesson,'has_sub' => $is_subscribed]);
    }

    // emfanisi anakoinosewn mathimatos
    public function show_announcement($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $title = $lesson_name;

        $subtitle = "Ανακοινώσεις";



        $innerHTML = <<<'EOT'
         <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="has-text-centered">Ανακοίνωση</th>
                    <th class="has-text-centered">Ημερομηνία</th>
                    <th class="has-text-centered">Από</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
EOT;


        return view('lessons.lessons_main')->with('data', ['lesson' => $lesson , 'table' => $innerHTML , 'title' => $title,'subtitle' => $subtitle]);
    }




    //emfanisi olwn twn arxeiwn tou mathimatos
    public function show_files($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $subtitle = "Έγγραφα";
        $title = $lesson_name;



        $innerHTML = <<<'EOT'
               <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="has-text-centered">Τύπος</th>
                    <th class="has-text-centered">Όνομα</th>
                    <th class="has-text-centered">Μέγεθος</th>
                    <th class="has-text-centered">Ημερομηνία</th>
                    <th class="has-text-centered"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>

                <tr class="visible">
                    <td class="text-center"><span class="fa fa-file-pdf-o"></span></td>
                    <td class="has-text-centered"><input type="hidden" value="/modules/document/index.php?course=CEID1030&amp;download=/5c6fb6e1kRRi.pdf">
                        <a href="" class="fileURL fileModal" target="_blank" title="Διαφάνειες 1ης διάλεξης">Διαφάνειες 1ης διάλεξης</a>
                        <br>
                        <span class="comment text-muted"><small>Σημειώσεις για το μάθημα</small></span>
                    </td>
                    <td class="has-text-centered" >6.84 MB</td>
                    <td class="has-text-centered"  title="22-02-2019 10:46:25">22-02-2019</td>
                    <td  class="has-text-centered"><a href="/modules/document/index.php?course=CEID1030&amp;download=/5c6fb6e1kRRi.pdf"><span class="fa fa-download" title="" data-toggle="tooltip" data-original-title="Αποθήκευση"></span></a></td>
                </tr>
            </tbody>
        </table>
EOT;


        return view('lessons.lessons_main')->with('data', ['lesson' => $lesson , 'table' => $innerHTML ,'title' => $title ,'subtitle'=>$subtitle]);
    }


}
