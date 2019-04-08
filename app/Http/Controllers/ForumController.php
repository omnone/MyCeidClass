<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;


class ForumController extends Controller
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

    public function show_forum($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $subtitle = "Forum";
        $title = $lesson_name;



        $innerHTML = <<<'EOT'
         <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light ">
                <tr>
                    <th class="has-text-centered">Συζήτηση</th>
                    <th class="has-text-centered">Θέματα</th>
                    <th class="has-text-centered">Αποστολές</th>
                    <th class="has-text-centered">Τελευταία ανάρτηση</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="has-text-centered"><a href="">
                                                                    <b>Απορίες για το μάθημα</b>
                                                                    </a>
                        <div class="smaller"></div>
                        <div class="smaller"></div>
                    </td>
                    <td class="text-center">9</td>
                    <td class="text-center">20</td>
                    <td class="text-center"><span class="smaller">Ξοε Δοε&nbsp;<a href=""><span class="fa fa-comment-o" title="" data-toggle="tooltip" data-original-title="Τελευταία ανάρτηση"></span></a><br>08/04/2019
                        - 13:05</span>
                    </td>

                </tr>
            </tbody>
        </table>
EOT;


        return view('lessons.lessons_main')->with('data', ['lesson' => $lesson , 'table' => $innerHTML ,'title' => $title ,'subtitle'=>$subtitle]);
    }
}
