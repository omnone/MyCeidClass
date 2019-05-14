<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Eksetasi;
use App\Aithousa;
use App\Eksetastiki_Periodos;
use App\Dilosi;

class ParticipationExamsController extends Controller
{
    //
    public function show_eksetastiki()
    {
        $eksetastiki = Eksetastiki_Periodos::where('finished', 0)->first();


        if ($eksetastiki === null) {
            return redirect('http://localhost:8000/')->with('error', 'Δεν υπάρχει ενεργή εξεταστική περίοδος!');
        }

        $eksetaseis = $eksetastiki->exams()->get();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $simmetoxes = $user->simmetoxi_se_eksetasi()->get();


        return view("exams.exams_index")->with('data', ['eksetaseis'=>$eksetaseis ,'eksetastiki' => $eksetastiki,'simmetoxes'=>$simmetoxes]);
    }

    public function apothikeuse_dilosi_eksetastiki(Request $request)
    {
        $user_id = auth()->user()->id;

        foreach ($request->lessons as $lesson) {
            $eksetasi = Eksetasi::find($lesson);
            $dilosi = Dilosi::where('eksetasi_id', $eksetasi->id)->where('user_id', $user_id)->first();

            if ($dilosi === null) {
                $dilosi = new Dilosi;
            }

            $dilosi->user_id = $user_id;
            $dilosi->eksetasi_id = $eksetasi->id;
            $dilosi->save();
        }

        return redirect('http://localhost:8000/')->with('success', 'H δήλωση καταχωρήθηκε επιτυχώς!');
    }
}
