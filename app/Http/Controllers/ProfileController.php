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
use App\Fwtografia;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Hash;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('user.settings')->with('user', $user);
    }

    // update profile info
    public function profile_update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'profile_photo' => 'file|nullable|max:1999',
             'password' => '|same:password',
    'conf_password' => '|same:password',
        ]);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->save();


        if ($request->hasFile('profile_photo')) {
            // filename with the extension
            $filename_full = $request->file('profile_photo')->getClientOriginalName();
            // filename
            $filename = pathinfo($filename_full, PATHINFO_FILENAME);
            //ext
            $extension = $request->file('profile_photo')->getClientOriginalExtension();

            $store_filename = 'profile_photo_' . time() . '.' . $extension;
            $path = $request->file('profile_photo')->storeAs('public/profile_photos', $store_filename);

            $profile_photo = $user->profile_photo()->first();

            if ($profile_photo === null) {
                $profile_photo = new Fwtografia;
                $profile_photo->filepath = $store_filename;
                $profile_photo->user_id = auth()->user()->id;
            } else {
                $file_path = 'public/profile_photos/' .  $profile_photo->filepath;

                Storage::disk('local')->delete($file_path);
                $profile_photo->filepath = $store_filename;
            }

            $profile_photo->save();
        }



        return redirect()->action('ProfileController@profile_index');
    }


    //statistika foititi
    public function get_statistika_foititi($mode)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $bathmoi = $user->grades()->get();
        $perasmena = $user->grades()->where('grade', '>=', 5.0)->orderBy('grade', 'desc')->paginate(7);
        $xrostoumena = $user->grades()->where('grade', '=', 0.0)->orderBy('periodos')->paginate(7);

        if ($bathmoi->isEmpty()) {
            return view('user.connect_to_progress');
        }

        return view('user.student_statistics')->with('data', ['xrostoumena'=>$xrostoumena,'perasmena' =>$perasmena,'mode'=>$mode]);
        ;
    }

    // arxeio vathmologias foititi
    public function download_grades_file()
    {
        return $this->generate_grades_file();
    }

    public function generate_grades_file()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $grades = DB::table('users')
            ->join('bathmologies', 'users.id', '=', 'bathmologies.user_id')
            ->orderby('periodos')->orderby('eksamino')->orderby('grade')->get();


        // $file= $user->grades_file()->first();

        // $file_path = 'public/grades_files/' . $file->filepath;

        // if (!Storage::disk('local')->exists($file_path)) {
        //     $file_path = 'public/ypovoles_ergasiwn/' . $file_name;

        //     if (!Storage::disk('local')->exists($file_path)) {
        //         return redirect('http://localhost:8000/lessons/' . $lesson_name . '/homework')->with('error', 'Το αρχείο δεν βρέθηκε!');
        //     }
        // }

        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($grades, ['name'=>'Μάθημα','periodos'=>'Περίοδος','eksamino'=>'Εξάμηνο','grade'=>'Βαθμός'])
            ->download('grades_' . $user->surname . '_' . $user->id .'_'.Carbon::now(). '.csv');



        // return Storage::disk('local')->download($file_path);
    }



    // scrape progress grades
    public function scrape_progress(Request $request)
    {
        set_time_limit(1000);

        $this->validate($request, [
            'username' => 'required',
             'password' =>  'required',
        ]);


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

        // $grade_file = new Arxeio;
        // $grade_file->filepath = 'grades_'.auth()->user()->id.'_'.auth()->user()->surname.'.csv';
        // $grade_file->user_id = auth()->user()->id;
        // $grade_file->save();


        // Storage::disk('local')->move('public/grades_files/grades.csv', 'public/grades_files/grades_'.auth()->user()->surname.'_'.auth()->user()->id.'.csv');


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

        return redirect()->action('ProfileController@get_statistika_foititi',['general']);
    }
}
