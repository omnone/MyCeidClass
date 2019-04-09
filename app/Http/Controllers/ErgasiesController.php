<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;

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
        //girna oles tis energes ergasies tou foititi gia ola ta mathimata
        if ($lesson_name=="all") {
            $title = "Μαθήματα";
            $subtitle = "Οι εργασίες μου";
            $ergasia_id = "1o σετ ασκήσεων";



            $innerHTML = <<<EOD
           <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Μάθημα</th>
                    <th class="">Τίτλος</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Έχει Αποσταλεί</th>
                    <th class="">Βαθμός</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Τεχνολογία Λογισμικού</td>
                    <td class=""><a href="lessons/$lesson_name/homework/$ergasia_id">1o σετ ασκήσεων</a></td>
                    <td class="">19-03-2018 12:00:00<br> (<small><span class="text-danger">έχει λήξει</span></small>)</td>
                    <td class=""><i class="fa fa-square-o"></i><br></td>
                    <td width="30" align="center"></td>
                </tr>

            </tbody>
        </table>
EOD;

            return view('lessons.lessons_main')->with('data', [ 'table' => $innerHTML , 'title' => $title , 'subtitle' => $subtitle]);
        } else {//girna tis ergasies gia to sigkekrimeno mathima

            $lesson = Lesson::where('name', $lesson_name)->first();

            $title = $lesson_name;
            $subtitle = "Εργασίες";
            $ergasia_id = "1o σετ ασκήσεων";


            $innerHTML = <<<EOD
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
                <tr>
                    <td class=""><a href="homework/$ergasia_id">1o σετ ασκήσεων</a>
                    </td>
                    <td class="">19-03-2018 12:00:00<br> (<small><span class="text-danger">έχει λήξει</span></small>)</td>
                    <td class=""><i class="fa fa-square-o"></i><br></td>
                    <td width="30" align="center"></td>
                </tr>

            </tbody>
        </table>
EOD;


            return view('lessons.lessons_main')->with('data', ['lesson' => $lesson , 'table' => $innerHTML , 'title' => $title, 'subtitle' => $subtitle]);
        }
    }

    // emfanisi selida ergasias
    public function show_ergasia($lesson_name, $ergasia_id)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $title = $lesson_name;
        $subtitle = "Εργασίες: "."\"".$ergasia_id."\"";
        $ergasia_id = "1o σετ ασκήσεων";

        return view("lessons.ergasia_page")->with('data', ['lesson' => $lesson  , 'title' => $title, 'subtitle' => $subtitle]);
        ;
    }
}
