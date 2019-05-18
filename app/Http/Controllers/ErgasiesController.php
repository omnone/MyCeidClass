<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


use Illuminate\Support\Facades\Storage;

use App\User;
use App\Lesson;
use App\Ergasia;
use App\Ypovoli;

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
            $title = 'Μαθήματα';
            $subtitle = 'Οι Εργασίες μου';

            if ($user->role == 'student') {
                $lessons = $user->subscribed_lessons()->get();
            } else {
                $lessons = $user->teaching_lessons()->get();
            }

            return view('ergasies.ergasies_index')->with('data', ['lessons' =>$lessons, 'title'=> $title, 'subtitle'=>$subtitle]);
        } else { //girna tis ergasies gia to sigkekrimeno mathima
            $title = $lesson_name;
            $subtitle = 'Οι Εργασίες μου';

            $lesson = Lesson::where('name', $lesson_name)->first();
            return view('ergasies.ergasies_index')->with('data', ['lesson' =>$lesson, 'title'=> $title, 'subtitle'=>$subtitle]);
        }
    }

    // emfanisi selida ergasias
    public function show_ergasia($lesson_name, $ergasia_id)
    {
        $ergasia = Ergasia::where('id', $ergasia_id)->first();
        $lesson = Lesson::where('id', $ergasia->lesson_id)->first();


        $title = $lesson->name;
        $subtitle = "Εργασία: " . "\"" . $ergasia->title . "\"";
        $url = 'lessons/' . $title . '/homework/store';

        if (auth()->user()->role == "student") {
            $ypovoli  = $ergasia->submittions()->where('user_id', auth()->user()->id)->first();

            return view("ergasies.ergasia_page")->with('data', ['lesson' => $lesson, 'title' => $title, 'subtitle' => $subtitle, 'go_url' => $url, 'ergasia' => $ergasia ,'ypovoli'=>$ypovoli]);
        } else {
            $ypovoles  = $ergasia->submittions()->get();

            return view("ergasies.ergasia_vathmologisi")->with('data', ['lesson' => $lesson, 'title' => $title, 'subtitle' => $subtitle, 'go_url' => $url, 'ergasia' => $ergasia, 'ypovoles' => $ypovoles]);
            ;
        }
    }

    // dimiourgia ergasias
    public function create_ergasia($lesson_name)
    {
        // $lesson = Lesson::where('name', $lesson_name)->first();
        if ($lesson_name == 'Μαθήματα') {
            $lessons = auth()->user()->teaching_lessons()->pluck('name', 'id');

            $title = $lesson_name;
            $subtitle = 'Δημιουργία Εργασίας';

            return view("ergasies.ergasia_create")->with('data', ['lessons' => $lessons, 'title' => $title, 'subtitle' => $subtitle]);
        } else {
            $lessons = Lesson::where('name', $lesson_name)->pluck('name', 'id');
            $lesson = Lesson::where('name', $lesson_name)->first();
            $title = $lesson_name;
            $subtitle = 'Δημιουργία Εργασίας';

            return view("ergasies.ergasia_create")->with('data', ['lesson' => $lesson,'lessons'=>$lessons, 'title' => $title, 'subtitle' => $subtitle]);
        }
    }


    // apothikeusi ergasias
    public function store_ergasia(Request $request, $lesson_name)
    {
        $this->validate($request, [
            'title' => 'required',
            'lesson_id' => 'required',
            'deadline_date' => 'required',
            'deadline_hour' => 'required',
            'ergasia_file' => 'file|nullable|max:1999'
        ]);


        $lesson = Lesson::where('id', $request->lesson_id)->first();


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

        return $ergasia;

        return redirect('http://localhost:8000/lessons/' . $lesson->name . '/homework')->with('success', 'Η εργασία δημιουργήθηκε επιτυχώς!');
    }


    // katevasma arxeiwn ergasiwn
    public function download_file($lesson_name, $ergasia_id, $file_name)
    {
        $file_path = 'public/ergasia_files/' . $file_name;

        if (!Storage::disk('local')->exists($file_path)) {
            $file_path = 'public/ypovoles_ergasiwn/' . $file_name;

            if (!Storage::disk('local')->exists($file_path)) {
                return redirect('http://localhost:8000/lessons/' . $lesson_name . '/homework')->with('error', 'Το αρχείο δεν βρέθηκε!');
            }
        }

        return Storage::disk('local')->download($file_path);
    }

    // paradosi ergasias apo foititi
    public function paradosi_ergasias(Request $request, $lesson_name, $ergasia_id)
    {
        $this->validate($request, [
            'ergasia_file' => 'file|nullable|max:1999'
        ]);

        $ergasia = Ergasia::where('id', $ergasia_id)->first();

        if ($ergasia->deadline < date('Y-m-d H:i')) {
            return redirect('http://localhost:8000/lessons/' . $lesson_name . '/homework')->with('error', 'Η προθεσμία παράδοσης έχει παρέλθει!');
        }


        $ergasia_prev = Ypovoli::where('user_id', auth()->user()->id)->where('ergasia_id', $ergasia_id)->first();


        if ($ergasia_prev !== null) {
            $ergasia_prev->delete();
        }

        if ($request->hasFile('ergasia_file')) {
            // filename with the extension
            $filename_full = $request->file('ergasia_file')->getClientOriginalName();
            // filename
            $filename = pathinfo($filename_full, PATHINFO_FILENAME);
            //ext
            $extension = $request->file('ergasia_file')->getClientOriginalExtension();


            $store_filename = $filename . '_' . auth()->user()->surname . '_' . time() . '.' . $extension;
            $path = $request->file('ergasia_file')->storeAs('public/ypovoles_ergasiwn', $store_filename);
        } else {
            $store_filename = '-';
        }


        $ypovoli_ergasias = new Ypovoli;
        $ypovoli_ergasias->user_id = auth()->user()->id;
        $ypovoli_ergasias->file_path = $store_filename;
        $ypovoli_ergasias->ergasia_id = $ergasia_id;

        $ypovoli_ergasias->save();

        return redirect('http://localhost:8000/lessons/' . $lesson_name . '/homework')->with('success', 'Η εργασία παραδόθηκε επιτυχώς!');
    }


    // vathmologisi ergasiwn
    public function grade_homework($lesson_name, $ergasia_id, Request $request)
    {
        $messages = [ 'required' => 'Παρακαλώ επιλέξτε αρχείο βαθμολόγησης.',
                      'mimes' => 'Μη συμβατός τύπος αρχείου! Το αρχείο πρέπει να είναι τύπου csv.',
                      'max' => 'Το μέγεθος του αρχείου υπερβαίνει το μέγιστο όριο.'
                    ];


        $validator = \Validator::make($request->all(), [
          'bathmologia_file' => '|required|mimes:csv,txt|max:1999'
        ], $messages)->validate();


        // filename with the extension
        $filename_full = $request->file('bathmologia_file')->getClientOriginalName();
        // filename
        $filename = pathinfo($filename_full, PATHINFO_FILENAME);
        //ext
        $extension = $request->file('bathmologia_file')->getClientOriginalExtension();


        $store_filename = $filename . '_' . auth()->user()->surname . '_' . time() . '.' . $extension;
        $path = $request->file('bathmologia_file')->storeAs('public/bathmologies_ergasiwn', $store_filename);


        $bathmologies_ergasiwn = [];
        $file = fopen(base_path().'\storage\app\public\bathmologies_ergasiwn\\'.$store_filename, 'r');
        while (($line = fgetcsv($file)) !== false) {
            $lesson = [];

            foreach ($line as $word) {
                $lesson[] = iconv("ISO-8859-7", "UTF-8", $word);
            }
            $bathmologies_ergasiwn[] = $lesson;
        }
        fclose($file);

        $ergasia = Ergasia::where('id', $ergasia_id)->first();

        $errors = 0;
        $error_mes = 'Η βαθμολογία καταχωρήθηκε! Δεν βρέθηκαν οι φοιτητές με τα ακόλουθα ΑΜ: ';

        foreach ($bathmologies_ergasiwn as $bathmologia) {
            $ypovoli  = $ergasia->submittions()->where('user_id', $bathmologia[0])->first();

            if ($ypovoli!==null) {
                $ypovoli->grade = $bathmologia[1];
                $ypovoli->save();
            } else {
                $errors++;
                $error_mes.= ','.$bathmologia[0];
            }
        }

        if ($errors == 0) {
            return redirect('lessons/'.$lesson_name.'/homework/'.$ergasia_id)->with('success', 'Η βαθμολογία καταχωρήθηκε επιτυχώς!');
        } else {
            return redirect('lessons/'.$lesson_name.'/homework/'.$ergasia_id)->with('error', $error_mes);
        }
    }
}
