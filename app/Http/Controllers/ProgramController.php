<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Program;
use App\Lesson;
use App\Aithousa;
use DateTime;
use Carbon\Carbon;

class ProgramController extends Controller
{
    protected $table = 'programs';

    /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_program()
    {
        $cur_program = Program::where('finished', false)->orderby('created_at', 'desc')->first();

        if ($cur_program == null) {
            return redirect('http://localhost:8000/admin/schedule/create/')->with('success', 'Δεν υπάρχει ενεργό πρόγραμμα!');
        }

        $hours=['9:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '17:00',
                    '18:00',
                    '19:00',
                    '20:00'];

        $cur_program = Program::where('finished', false)->orderby('created_at', 'desc')->get();

        $deutera = [];
        $triti = [];
        $tetarti =[];
        $pempti = [];
        $paraskeui= [];

        foreach ($cur_program as $lesson_day) {
            if ($lesson_day->day=='Δευτέρα') {
                $deutera[]=$lesson_day;
            } elseif ($lesson_day->day=='Τρίτη') {
                $triti[]=$lesson_day;
            } elseif ($lesson_day->day=='Τετάρτη') {
                $tetarti[]=$lesson_day;
            } elseif ($lesson_day->day=='Πέμπτη') {
                $pempti[]=$lesson_day;
            } elseif ($lesson_day->day=='Παρασκευή') {
                $paraskeui[]=$lesson_day;
            }
        }

        return view('admin.program_index')->with('data', ['hours'=>$hours,'deutera'=>$deutera,'triti'=>$triti,'tetarti'=>$tetarti,'pempti'=>$pempti,'paraskeui'=>$paraskeui]);
    }

    public function create_new_program()
    {
        if (!Input::has('periodos')) {
            $periodoi = array('Εαρινό','Χειμερινό');
            return view('admin.create_program')->with('data', ['periodoi'=>$periodoi,'cur_period'=>'select']);
        } else {
            if (Input::get('periodos')== 0) {
                $cur_period = 'Εαρινό';
            } else {
                $cur_period = 'Χειμερινό';
            }

            $lessons = Lesson::where('periodos', $cur_period)->pluck('name', 'id');
            $days=['Δευτέρα','Τρίτη','Τετάρτη','Πέμπτη','Παρασκευή'];
            $hours=['9:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '17:00',
                    '18:00',
                    '19:00',
                    '20:00'];

            $rooms = Aithousa::all()->pluck('name', 'id');

            return view('admin.create_program')->with('data', ['cur_period'=>$cur_period,'lessons'=>$lessons,'days'=>$days,'rooms'=>$rooms,'hours'=>$hours]);
        }
    }

    public function save_program(Request $request)
    {
        $days=['Δευτέρα','Τρίτη','Τετάρτη','Πέμπτη','Παρασκευή'];
        $hours=['9:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '17:00',
                    '18:00',
                    '19:00',
                    '20:00'];



        $program = new Program;
        $program->lesson_id =$request->lesson;
        $program->aithousa_id = $request->aithousa;
        $program->day = $days[(int)$request->day];
        $program->hour = $hours[(int)$request->hour];
        $program->periodos= $request->periodos;
        $program->title = 'εβδομαδιαίο πρόγραμμα '.$request->periodos;

        $check = Program::where('day', $program->day)
        ->where('aithousa_id', $program->aithousa_id)->where('periodos', $program->periodos)->first();

        if ($request->periodos == 'Εαρινό') {
            $cur_period = 0 ;
        } else {
            $cur_period =1;
        }



        if ($check == null) {
            $program->save();
            return redirect('http://localhost:8000/schedule')->with('success', 'Το πρόγραμμα ενημερώθηκε επιτυχώς!');
        } else {
            return redirect('http://localhost:8000/admin/schedule/create?periodos='. $cur_period)->with('error', 'Η αίθουσα που επιλέξατε δεν είναι διαθέσιμη');
        }
    }
}
