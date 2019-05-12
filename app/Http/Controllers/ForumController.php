<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Sizitisi;
use App\Anartisi;

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
        $sizitiseis = Sizitisi::where('lesson_id', $lesson->id)->get();

        $subtitle = "Forum";
        $title = $lesson_name;

        return view('forum.forum_page')->with('data', ['lesson' => $lesson , 'title' => $title ,'subtitle'=>$subtitle ,'sizitiseis' => $sizitiseis]);
    }

    public function show_sizitisi($lesson_name, $sizitisi_id)
    {
        $sizitisi= Sizitisi::where('id', $sizitisi_id)->first();
        $lesson = Lesson::where('name', $lesson_name)->first();

        $anartiseis = $sizitisi->anartiseis()->get();

        $subtitle = $sizitisi->title;
        $title = $lesson_name;

        return view('forum.sizitisi_index')->with('data', ['lesson' => $lesson,'title' => $title ,'subtitle'=>$subtitle,'sizitisi'=>$sizitisi,'anartiseis'=>$anartiseis]);
    }

    public function create_sizitisi($lesson_name)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $subtitle = "Forum";
        $title = $lesson_name;

        return view('forum.create_sizitisi')->with('data', ['lesson' => $lesson , 'title' => $title ,'subtitle'=>$subtitle]);
    }

    public function save_sizitisi($lesson_name, Request $request)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $sizitisi = new Sizitisi;
        $sizitisi->title = $request->title;
        $sizitisi->description = $request->description;
        $sizitisi->lesson_id = $lesson->id;
        $sizitisi->save();

        return $this->show_forum($lesson_name);
    }

    public function add_post($lesson_name, $sizitisi_id, $post_id)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();
        $sizitisi= Sizitisi::where('id', $sizitisi_id)->first();
        $subtitle = $sizitisi->title;
        $title = $lesson_name;

        if ($post_id == 0) {
            return view('forum.create_anartisi')->with('data', ['lesson' => $lesson , 'title' => $title ,'subtitle'=>$subtitle,'sizitisi'=>$sizitisi,'anartisi_id'=>0]);
        } else {
            $anartisi = Anartisi::where('id', $post_id)->first();

            return view('forum.create_anartisi')->with('data', ['lesson' => $lesson , 'title' => $title ,'subtitle'=>$subtitle,'sizitisi'=>$sizitisi,'anartisi'=>$anartisi,'anartisi_id'=>$anartisi->id]);
        }
    }

    public function create_post($lesson_name, $sizitisi_id, $post_id, Request $request)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();

        $anartisi = new Anartisi;
        $anartisi->title = $request->title;
        $anartisi->description = $request->description;
        $anartisi->lesson_id = $lesson->id;
        $anartisi->sizitisi_id = $sizitisi_id;
        if ($post_id!==0) {
            $anartisi->answer_to = $post_id;
        }
        $anartisi->user_id=auth()->user()->id;

        $anartisi->save();

        return $this->show_sizitisi($lesson_name, $sizitisi_id);
    }

    public function show_post($lesson_name, $sizitisi_id, $post_id)
    {
        $lesson = Lesson::where('name', $lesson_name)->first();
        $anartisi = Anartisi::where('id', $post_id)->first();
        $apantiseis = Anartisi::where('answer_to', $post_id)->get();


        $subtitle = $anartisi->title;
        $title = $lesson_name;

        return view('forum.post_page')->with('data', ['lesson' => $lesson , 'title' => $title ,'subtitle'=>$subtitle ,'anartisi' => $anartisi,'apantiseis'=>$apantiseis]);
    }
}
