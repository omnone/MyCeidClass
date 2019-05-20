<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use App\Eksetasi;
use App\Aithousa;
use App\Eksetastiki_Periodos;
use App\Message;

class AdminController extends Controller
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

    public function admin_index()
    {
        return view("admin.admin_index");
    }

    public function eksetastiki_index()
    {
        $eksetastiki = Eksetastiki_Periodos::where('finished', 0)->first();

        if ($eksetastiki == null) {
            return redirect('http://localhost:8000/admin/exetastiki/create')->with('success', 'Δεν υπάρχει ενεργή εξεταστική περίοδος!');
        }
        $eksetaseis = $eksetastiki->exams()->paginate(6);

        return view("admin.eksetastiki_index")->with('data', ['eksetaseis' => $eksetaseis, 'eksetastiki' => $eksetastiki]);
    }

    public function create_eksetastiki()
    {
        return view("admin.create_eksetastiki");
    }

    public function update_eksetastiki(Request $request)
    {
        $eksetasi = Eksetasi::where('lesson_id', $request->lesson_id)->where('confirmed', 0)->first();
        $eksetasi->confirmed = true;
        $eksetasi->imerominia_eksetasis = $request->imerominia_eksetasis;
        $eksetasi->ora_eksetasis = $request->ora_eksetasis;
        $eksetasi->save();

        return redirect('http://localhost:8000/admin/exetastiki/')->with('success', 'Η εξέταση οριστικοποιήθηκε!');
    }

    public function save_eksetastiki(Request $request)
    {
        $eksetastiki_prev = Eksetastiki_Periodos::orderby('created_at', 'desc')->first();
        if ($eksetastiki_prev != null) {
            $eksetastiki_prev->finished = true;
            $eksetastiki_prev->save();
        }

        $eksetastiki = new Eksetastiki_Periodos;
        $eksetastiki->name = $request->name;
        $time = $request->input('deadline_hour');
        $date = $request->input('deadline_date');

        $eksetastiki->deadline_dilosis = date('Y-m-d H:i', strtotime("$date $time"));
        $eksetastiki->save();

        return $this->notify_professors($eksetastiki->name, $eksetastiki->deadline_dilosis);
    }

    public function notify_professors($eksetastiki_name, $deadline)
    {
        $all_profs = User::where('role', 'prof')->get();

        foreach ($all_profs as $prof) {
            $mes = new Message;
            $mes->title = 'Έναρξη Δηλώσεων Μαθημάτων για: ' . $eksetastiki_name;
            $mes->content = 'Αγαπητοί συνάδερφοι , η περίοδος δήλωσης μαθημάτων προς εξέταση για την ' . $eksetastiki_name .
                ' έχει ανοίξει. Παρακαλώ όποιος επιθυμεί να δήλωσει κάποιο μάθημα για εξέταση να προβεί σε δήλωση μέχρι '
                . $deadline . '. Ευχαριστώ εκ των προτέρων.';
            $mes->sender_id = auth()->user()->id;
            $mes->receiver_id = $prof->id;

            $mes->save();
        }

        return redirect('http://localhost:8000/admin/exetastiki')->with('success', 'Η εξεταστική περίοδος "' . $eksetastiki_name . '" δημιουργήθηκε επιτυχώς');
    }
}
