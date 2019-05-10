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

        if ($bathmoi->isEmpty()) {
            return view('user.connect_to_progress');
        }

        return view('user.student_statistics')->with('data', ['xrostoumena'=>$bathmoi]);;
    }

    public function scrape_progress(Request $request)
    {
        set_time_limit(10000);

        // $cmd = 'python '.base_path().'\progress\progress-scraper.py 2>&1';
        // $output = [];

        // exec($cmd, $output);

        // return $output;

        $all_lessons = [];
        $file = fopen(base_path().'\progress\grades.csv', 'r');
        while (($line = fgetcsv($file)) !== false) {
            $lesson = [];

            foreach ($line as $word) {
                $lesson[] = iconv("ISO-8859-7", "UTF-8", $word);
            }
            $all_lessons[] = $lesson;
        }
        fclose($file);

        array_shift($all_lessons);

        foreach ($all_lessons as $lesson_t) {
            $bathmologia = new Bathmologia;
            $bathmologia->name = $lesson_t[0];
            $bathmologia->periodos = $lesson_t[1];
            $bathmologia->eksamino= $lesson_t[2];
            $bathmologia->grade = 0;
            $bathmologia->user_id = auth()->user()->id;
            $bathmologia->save();
        }

        return redirect()->action('ProfileController@get_statistika_foititi');

    }
}
