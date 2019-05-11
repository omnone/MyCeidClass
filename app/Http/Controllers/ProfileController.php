<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


use Illuminate\Support\Facades\Storage;

use App\User;
use App\Lesson;
use App\Ergasia;
use App\Ypovoli;
use App\Bathmologia;
use App\Arxeio;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
    public function get_statistika_foititi()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $bathmoi = $user->grades()->get();
        $perasmena = $user->grades()->where('grade', '>', 5.0)->orderBy('periodos')->get();
        $xrostoumena = $user->grades()->where('grade', '=', 0.0)->orderBy('periodos')->get();


        if ($bathmoi->isEmpty()) {
            return view('user.connect_to_progress');
        }

        return view('user.student_statistics')->with('data', ['xrostoumena'=>$xrostoumena,'perasmena' =>$perasmena]);
        ;
    }

    public function download_grades_file()
    {
        return $this->generate_grades_file();
    }

    public function generate_grades_file()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $file= $user->grades_file()->first();

        $file_path = 'public/grades_files/' . $file->filepath;

        if (!Storage::disk('local')->exists($file_path)) {
            $file_path = 'public/ypovoles_ergasiwn/' . $file_name;

            if (!Storage::disk('local')->exists($file_path)) {
                return redirect('http://localhost:8000/lessons/' . $lesson_name . '/homework')->with('error', 'Το αρχείο δεν βρέθηκε!');
            }
        }


        return Storage::disk('local')->download($file_path);
    }



    // scrape progress grades
    public function scrape_progress(Request $request)
    {
        set_time_limit(10000);

        $username = $request->username;
        $password = $request->password;



        $cmd = 'python '.base_path().'\progress\progress-scraper.py '.$username.' '.$password.' 2>&1';
        $output = [];

        exec($cmd, $output);


        $all_lessons = [];
        $file = fopen(base_path().'\storage\app\public\grades_files\grades.csv', 'r');
        while (($line = fgetcsv($file)) !== false) {
            $lesson = [];

            foreach ($line as $word) {
                $lesson[] = iconv("ISO-8859-7", "UTF-8", $word);
            }
            $all_lessons[] = $lesson;
        }
        fclose($file);

        $grade_file = new Arxeio;
        $grade_file->filepath = 'grades_'.auth()->user()->id.'.csv';
        $grade_file->user_id = auth()->user()->id;
        $grade_file->save();


        Storage::disk('local')->move('public/grades_files/grades.csv', 'public/grades_files/grades_'.auth()->user()->id.'.csv');


        array_shift($all_lessons);

        foreach ($all_lessons as $lesson_t) {
            $bathmologia = new Bathmologia;
            $bathmologia->name = $lesson_t[0];
            $bathmologia->periodos = $lesson_t[1];
            $bathmologia->eksamino= $lesson_t[2];
            $bathmologia->grade = $lesson_t[3];
            $bathmologia->user_id = auth()->user()->id;
            $bathmologia->save();
        }

        return redirect()->action('ProfileController@get_statistika_foititi');
    }
}
