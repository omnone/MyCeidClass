<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


use Illuminate\Support\Facades\Storage;

use App\User;
use App\Lesson;
use App\Ergasia;

class ErgasiesController extends Controller
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

    //  emfanisi ergasiwn mathimatos
    public function show_homework($lesson_name)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        //girna oles tis energes ergasies tou foititi gia ola ta mathimata
        if ($lesson_name == "all") {
            $title = "Μαθήματα";
            $subtitle = "Οι εργασίες μου";
            $ergasia_id = "1o σετ ασκήσεων";


            if ($user->role =="student") {
                $user_lessons=$user->subscribed_lessons()->orderBy('eksamino')->get();
            } else {
                $user_lessons=$user->teaching_lessons()->orderBy('eksamino')->get();
            }

            $ergasies = array();

            foreach ($user_lessons as $lesson) {
                $ergasies = $lesson->ergasies()->orderBy('lesson_id')->get()->toArray();
            }


            if (auth()->user()->role == "student") {
                $table_head =  <<<EOD
           <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Μάθημα</th>
                    <th class="">Τίτλος</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Έχει Αποσταλέι</th>
                    <th class="">Βαθμός</th>
                </tr>
            </thead>
            <tbody>
EOD;

                foreach ($ergasies as $ergasia) {
                    $lesson = Lesson::where('id', $ergasia['lesson_id'])->first();

                    $innerHTML = <<<EOD
                <tr>
                    <td class=""><a href="/lessons/$lesson->name">$lesson->name</a></td>
                    <td class=""><a href="homework/{$ergasia['id']}">{$ergasia['title']}</a>
                    </td>
                    <td class="">{$ergasia['deadline']}</td>
                    <td class="">Ναι</td>
                    <td width="30" align="center"></td>
                </tr>
EOD;
                    $table_head = $table_head . $innerHTML;
                }
            } else {
                $table_head =  <<<EOD
           <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Μάθημα</th>
                    <th class="">Τίτλος</th>
                    <th class="">Αρχείο</th>
                    <th class="">Ημ/νια Δημιουργίας</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Υποβολές</th>
                </tr>
            </thead>
            <tbody>
EOD;

                foreach ($ergasies as $ergasia) {
                    $lesson = Lesson::where('id', $ergasia['lesson_id'])->first();

                    $innerHTML = <<<EOD
                <tr>
                    <td class=""><a href="/lessons/$lesson->name">$lesson->name</a></td>
                    <td class=""><a href="homework/{$ergasia['id']}">{$ergasia['title']}</a>
                    </td>
                    <td class="" ><a href='/lessons/$lesson_name}/homework/{$ergasia['id']}/{$ergasia['file_path']}'><i class="fa fa-download" aria-hidden="true"></i>{$ergasia['file_path']}</a></td>
                    <td class="">{$ergasia['created_at']}</td>
                    <td class="">{$ergasia['deadline']}</td>
                    <td class="">0</td>
                </tr>
EOD;
                    $table_head = $table_head . $innerHTML;
                }
            }

            $table = $table_head . '
            </tbody>
        </table>';

            return view('lessons.lessons_main')->with('data', ['table' => $table, 'title' => $title, 'subtitle' => $subtitle]);
        } else { //girna tis ergasies gia to sigkekrimeno mathima

            $lesson = Lesson::where('name', $lesson_name)->first();
            $title = $lesson_name;
            $subtitle = "Εργασίες";

            $ergasies = $lesson->ergasies()->orderBy('created_at')->get();

            if (auth()->user()->role == "student") {
                $table_head =  <<<EOD
           <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Τίτλος</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Έχει Αποσταλέι</th>
                    <th class="">Βαθμός</th>
                </tr>
            </thead>
            <tbody>
EOD;

                foreach ($ergasies as $ergasia) {
                    $innerHTML = <<<EOD
                <tr>
                    <td class=""><a href="homework/$ergasia->id">$ergasia->title</a>
                    </td>
                    <td class="">$ergasia->deadline</td>
                    <td class="">Ναι</td>
                    <td width="30" align="center"></td>
                </tr>
EOD;
                    $table_head = $table_head . $innerHTML;
                }
            } else {
                $table_head =  <<<EOD
           <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Τίτλος</th>
                    <th class="">Αρχείο</th>
                    <th class="">Ημ/νια Δημιουργίας</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Υποβολές</th>
                </tr>
            </thead>
            <tbody>
EOD;

                foreach ($ergasies as $ergasia) {
                    $innerHTML = <<<EOD
                <tr>
                    <td class=""><a href="homework/$ergasia->id">$ergasia->title</a>
                    </td>
                    <td class="" ><a href='/lessons/$lesson_name}/homework/$ergasia->id/$ergasia->file_path'><i class="fa fa-download" aria-hidden="true"></i> $ergasia->file_path</a></td>
                    <td class="">$ergasia->created_at</td>
                    <td class="">$ergasia->deadline</td>
                    <td class="">0</td>
                </tr>
EOD;
                    $table_head = $table_head . $innerHTML;
                }
            }

            $table = $table_head . '
            </tbody>
        </table>';


            return view('lessons.lessons_main')->with('data', ['lesson' => $lesson, 'table' => $table, 'title' => $title, 'subtitle' => $subtitle]);
        }
    }

    // emfanisi selida ergasias
    public function show_ergasia($lesson_name, $ergasia_id)
    {
        $ergasia = Ergasia::where('id', $ergasia_id)->first();
        $lesson = Lesson::where('id', $ergasia->lesson_id)->first();


        $title = $lesson_name;
        $subtitle = "Εργασίες: " . "\"" . $ergasia->title . "\"";
        $url = 'lessons/' . $title . '/homework/store';

        if (auth()->user()->role == "student") {
            return view("lessons.ergasia_page")->with('data', ['lesson' => $lesson, 'title' => $title, 'subtitle' => $subtitle, 'go_url' => $url, 'ergasia' => $ergasia]);
            ;
        } else {
            return view("lessons.ergasia_vathmologisi")->with('data', ['lesson' => $lesson, 'title' => $title, 'subtitle' => $subtitle, 'go_url' => $url, 'ergasia' => $ergasia]);
            ;
        }
    }

    // dimiourgia ergasias

    public function create_ergasia($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $title = $lesson_name;
        $subtitle = 'Δημιουργία Εργασίας';

        return view("lessons.ergasia_create")->with('data', ['lesson' => $lesson, 'title' => $title, 'subtitle' => $subtitle]);
    }


    // apothikeusi ergasias
    public function store_ergasia(Request $request, $lesson_name)
    {
        $this->validate($request, [
            'title' => 'required',
            'deadline_date' => 'required',
            'deadline_hour' => 'required',
            'ergasia_file' => 'file|nullable|max:1999'
        ]);

        $lesson = Lesson::where('name', $lesson_name)->first();


        if ($request->hasFile('ergasia_file')) {
            // filename with the extension
            $filename_full = $request->file('ergasia_file')->getClientOriginalName();
            // filename
            $filename = pathinfo($filename_full, PATHINFO_FILENAME);
            //ext
            $extension = $request->file('ergasia_file')->getClientOriginalExtension();


            $store_filename = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('ergasia_file')->storeAs('public/ergasia_files', $store_filename);
        } else {
            $store_filename = '-';
        }


        $ergasia = new Ergasia;
        $ergasia->title = $request->input('title');
        if ($request->input('description')) {
            $ergasia->description = $request->input('description');
        } else {
            $ergasia->description = 'Δεν υπάρχει περιγραφή.';
        }

        $ergasia->file_path = $store_filename;

        $time = $request->input('deadline_hour');
        $date = $request->input('deadline_date');

        $ergasia->deadline = date('Y-m-d H:i', strtotime("$date $time"));

        $ergasia->lesson_id = $lesson->id;

        $ergasia->save();

        return redirect('http://localhost:8000/lessons/' . $lesson->name . '/homework')->with('success', 'Η εργασία δημιουργήθηκε επιτυχώς!');
    }


    // katevasma arxeiwn ergasiwn
    public function download_file($lesson_name, $ergasia_id, $file_name)
    {
        $file_path = 'public/ergasia_files/' . $file_name;

        if (!Storage::disk('local')->exists($file_path)) {
            return redirect('http://localhost:8000/lessons/' . $lesson->name . '/homework')->with('error', 'Το αρχείο δεν βρέθηκε!');
        }

        $file_in_storage = Storage::disk('local')->get($file_path);

        $type = Storage::disk('local')->mimeType($file_path);

        $download = Response::make($file_in_storage, 200);
        $download->header("Content-Type", $type);

        return $download;
    }
}
