<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


use Illuminate\Support\Facades\Storage;

use App\User;
use App\Lesson;
use App\Ergasia;
use App\Ypovoli;
use App\Omada;

class OmadesController extends Controller
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


    public function show_groups($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();
        $title = $lesson_name;
        $subtitle = "Ομάδες Χρηστών";
        $teams = $lesson->teams()->paginate(6);


        return view('teams.teams_index')->with('data', [ 'title' =>  $title, 'subtitle' =>  $subtitle,'lesson'=>$lesson,'teams'=>$teams]);
        ;
    }

    public function create_new_group($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();
        $title = $lesson_name;
        $subtitle = "Δημιουργία Ομάδας Χρηστών";
        $students = $lesson->subscribers()->where('role', 'student')->get()->pluck("full_name", "id");



        return view('teams.create_team')->with('data', [ 'title' =>  $title, 'subtitle' =>  $subtitle,'lesson'=>$lesson,'students'=>$students]);
    }

    public function save_new_group($lesson_name, Request $request)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $messages = [ 'required' => 'Παρακαλώ συμπληρώστε τα απαραίτητα πεδία.',];



        $validator = \Validator::make($request->all(), [
          'title' => '|required',
          ''
        ], $messages)->validate();

        $group = new Omada;
        $group->name = $request->title;
        $group->description = $request->description;
        $group->lesson_id = $lesson->id;
        $group->members_limit = $request->limit;
        if ($request->perm == 1) {
            $group->is_locked = false;
        } else {
            $group->is_locked = true;
        }
        $group->save();

        foreach ($request->selected_studs as $member) {
            $user = User::where('id', $member)->first();
            $group->members()->save($user);
        }


        return $this->show_groups($lesson_name);
    }

    public function show_group($lesson_name, $group_id)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();
        $title = $lesson_name;
        $subtitle = "Ομάδες Χρηστών";
        $group = Omada::where('id', $group_id)->first();

        return view('teams.team_page')->with('data', [ 'title' =>  $title, 'subtitle' =>  $subtitle,'lesson'=>$lesson,'group'=>$group]);
        ;
    }

    public function subscribe_to_group($lesson_name, $group_id,Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $group = Omada::where('id', $group_id)->first();

        // grapse ton xristi stin omada
        if ($request->input('mode') == 'subscribe') {
            $user->subscribed_teams()->attach($group_id);
            return redirect('lessons/'.$lesson_name.'/groups')->with('success', 'Εγγραφήκατε επιτυχώς στην ομάδα: '.$group->name);
        } else {//aliws ksegrapse ton
            $user->subscribed_teams()->detach($group_id);
            return redirect('lessons/'.$lesson_name.'/groups')->with('success', 'Απεγγραφήκατε επιτυχώς από ομάδα: '.$group->name);
        }
    }
}
