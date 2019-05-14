<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Eksetasi;
use App\Aithousa;
use App\Eksetastiki_Periodos;

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



    public function show_exetastiki_index()
    {
        $eksetastiki = Eksetastiki_Periodos::where('finished', 0)->first();
        $eksetaseis = $eksetastiki->exams()->get();

        return view("exams.exams_index_prof")->with('data', ['eksetaseis'=>$eksetaseis ,'eksetastiki' => $eksetastiki]);
        ;
    }

    public function create_new_exam()
    {
        // $available_rooms = Aithousa::all()->pluck('name', 'id');
        $eksetastiki = Eksetastiki_Periodos::where('finished', 0)->first();

        if ($eksetastiki->deadline_dilosis < date('Y-m-d H:i')) {
            return redirect('http://localhost:8000/exams/')->with('error', 'Η προθεσμία δήλωσης εξέτασης έχει παρέλθει! Επικοινωνήστε με τον διαχειριστή!');
        }


        $lessons = auth()->user()->teaching_lessons()->orderBy('eksamino')->get()->pluck('name', 'id');

        return view("exams.create_exam")->with('data', ['lessons' => $lessons ,'eksetastiki' => $eksetastiki]);
    }

    public function save_new_exam(Request $request)
    {
        $messages = [ 'required' => 'Παρακαλώ συμπληρώστε τα απαραίτητα πεδία.',];

        $validator = \Validator::make($request->all(), [
          'lesson_id'=> '|required',
          'date'=> '|required',
          'hour'=> '|required',
          'deadline_date'=> '|required',
          'deadline_hour'=> '|required',
        ], $messages)->validate();

        $exam = new Eksetasi ;

        $exam->lesson_id=$request->lesson_id;

        $time = $request->input('deadline_hour');
        $date = $request->input('deadline_date');

        $exam->prothesmia_dilosis = date('Y-m-d H:i', strtotime("$date $time"));

        $exam->ora_eksetasis = $request->input('hour');
        $exam->imerominia_eksetasis  = $request->input('date');

        $eksetastiki = Eksetastiki_Periodos::where('finished', 0)->first();
        $mathima = Lesson::where('id', $request->lesson_id)->first();

        $exam->lesson()->associate($mathima);
        $exam->eksetastiki()->associate($eksetastiki);

        $exam->save();

        return redirect('http://localhost:8000/exams/')->with('success', 'Η δήλωση του μαθήματος πραγματοποιήθηκε με επιτυχία!');
    }
}
