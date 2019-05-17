<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Eksetasi;
use App\Aithousa;
use App\Eksetastiki_Periodos;
use App\Aithousa_Eksetasis;


use Illuminate\Database\Eloquent\Builder;

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
    }

    // public function show_exams_program()
    // {
    // }

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

    public function epilogi_aithouswn_eksetasis($exam_id)
    {
        $eksetasi = Eksetasi::find($exam_id);
        $epithimiti_imerominia = $eksetasi->imerominia_eksetasis;

        $rooms = Aithousa::whereDoesntHave('eksetaseis', function (Builder $query) use ($epithimiti_imerominia) {
            $query->whereRaw('`eksetaseis`.`imerominia_eksetasis` = \''.$epithimiti_imerominia.'\'');
        })->get();

        if ($rooms->isEmpty()) {
            return redirect('http://localhost:8000/')->with('error', 'Δεν υπάρχουν διαθέσιμες αίθουσες για: '.$epithimiti_imerominia);
        }

        $already_selected = "";

        foreach (Aithousa::whereHas('eksetaseis', function (Builder $query) use ($epithimiti_imerominia) {
            $query->whereRaw('`eksetaseis`.`imerominia_eksetasis` = \''.$epithimiti_imerominia.'\'');
        })->get() as $room) {
            $already_selected.=$room->name.',';
        }

        return view("exams.epilogi_aithousas")->with('data', ['eksetasi' => $eksetasi,'rooms'=>$rooms,'selected_rooms'=>$already_selected]);
    }

    public function save_aithouses_eksetastikis($exam_id, Request $request)
    {
        $eksetasi = Eksetasi::find($exam_id);

        foreach ($request->selected_rooms as $selected_room) {
            $room = Aithousa::find($selected_room);

            // foreach ($room->eksetaseis()->get() as $temp) {
            //     if ($temp->imerominia_eksetasis == $eksetasi->imerominia_eksetasis) {
            //         return 'piasmenis';
            //     }
            // }

            $aithousa_eksetasis = new Aithousa_Eksetasis;
            $aithousa_eksetasis->eksetasi_id = $eksetasi->id;
            $aithousa_eksetasis->aithousa_id = $selected_room;
            $aithousa_eksetasis->save();

            return redirect('http://localhost:8000/exams/'.$exam_id.'/rooms')->with('success', 'Η δήλωση του μαθήματος πραγματοποιήθηκε με επιτυχία!');
        }
    }
}
