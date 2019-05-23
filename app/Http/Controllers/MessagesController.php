<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

use App\User;
use App\Message;
use App\Arxeio;

class MessagesController extends Controller
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


    // dikse ola ta minimata
    public function show_messages($mode)
    {
        $user = User::find(auth()->user()->id);
        $send_messages = $user->send_messages()->orderBy('created_at', 'desc')->paginate(5);
        $inbox_messages = $user->inbox_messages()->orderBy('created_at', 'desc')->paginate(5);

        return view("messages.messages_index")->with('data', ['send_messages'=>$send_messages,'inbox_messages'=>$inbox_messages,'mode'=>$mode]);
    }

    // dimiourgia neou minimatos
    public function create_new_message()
    {
        return view("messages.create_message");
    }

    // autcomplete gia tin euresi xristi
    public function find_user(Request $request)
    {
        $term = $request->term;
        $users = User::where('name', 'LIKE', '%'.$term.'%')->orWhere('surname', 'LIKE', '%'.$term.'%')->get();

        if (count($users)==0) {
            $searchResult[]='Δεν Βρέθηκε Χρήστης';
        } else {
            foreach ($users as $key => $value) {
                $searchResult[] = $value->name.' '.$value->surname.'['.$value->id.']';
            }
        }

        return $searchResult;
    }

    public function send_message(Request $request)
    {
        $messages = [ 'required' => 'Παρακαλώ συμπληρώστε τα απαραίτητα πεδία.','required_without'=>'Παρακαλώ επιλέξτε παραλήπτη!'];

        $validator = \Validator::make($request->all(), [
          'title' => '|required',
          'recipients'=>'required_without:receiver'
        ], $messages)->validate();

        if ($request->receiver!=null) {
            $receiver_details =  str_replace("]", "", explode("[", $request->receiver));

            $receiver_id = $receiver_details[1];

            $mes = new Message;
            $mes->title = $request->title;
            $mes->content = Crypt::encryptString($request->content);
            $mes->sender_id = auth()->user()->id;
            $mes->receiver_id = $receiver_id;

            if ($request->hasFile('file')) {
                // filename with the extension
                $filename_full = $request->file('file')->getClientOriginalName();
                // filename
                $filename = pathinfo($filename_full, PATHINFO_FILENAME);
                //ext
                $extension = $request->file('file')->getClientOriginalExtension();

                $store_filename =  $filename . time() . '.' . $extension;
                $path = $request->file('file')->storeAs('public/messages_files', $store_filename);

                $message_file = new Arxeio;
                $message_file->filepath =  $store_filename;
                $message_file->user_id = auth()->user()->id;
                $message_file->save();

                $mes->file_id = $message_file->id;
            }

            $mes->save();
            return redirect('http://localhost:8000/messages/send')->with('success', 'Το μήνυμα στον χρήστη: '.$receiver_details[0].' εστάλη επιτυχώς!');
        } elseif ($request->recipients == 'all_profs') {
            $all_profs = User::where('role', 'prof')->get();

            if ($request->hasFile('file')) {
                // filename with the extension
                $filename_full = $request->file('file')->getClientOriginalName();
                // filename
                $filename = pathinfo($filename_full, PATHINFO_FILENAME);
                //ext
                $extension = $request->file('file')->getClientOriginalExtension();

                $store_filename =  $filename . time() . '.' . $extension;
                $path = $request->file('file')->storeAs('public/messages_files', $store_filename);

                $message_file = new Arxeio;
                $message_file->filepath =  $store_filename;
                $message_file->user_id = auth()->user()->id;
                $message_file->save();
            }

            foreach ($all_profs as $prof) {
                $mes = new Message;
                $mes->title = $request->title;
                $mes->content = $request->content;
                $mes->sender_id = auth()->user()->id;
                $mes->receiver_id = $prof->id;
                if ($request->hasFile('file')) {
                    $mes->file_id = $message_file->id;
                }
                $mes->save();
            }

            return redirect('http://localhost:8000/messages/send')->with('success', 'Το μήνυμα προς όλους τους καθηγητές εστάλη επιτυχώς!');
        } else {
            $all_studs = User::where('role', 'student')->get();

            if ($request->hasFile('file')) {
                // filename with the extension
                $filename_full = $request->file('file')->getClientOriginalName();
                // filename
                $filename = pathinfo($filename_full, PATHINFO_FILENAME);
                //ext
                $extension = $request->file('file')->getClientOriginalExtension();

                $store_filename =  $filename . time() . '.' . $extension;
                $path = $request->file('file')->storeAs('public/messages_files', $store_filename);

                $message_file = new Arxeio;
                $message_file->filepath =  $store_filename;
                $message_file->user_id = auth()->user()->id;
                $message_file->save();
            }

            foreach ($all_studs as $stud) {
                $mes = new Message;
                $mes->title = $request->title;
                $mes->content = $request->content;
                $mes->sender_id = auth()->user()->id;
                $mes->receiver_id = $stud->id;
                if ($request->hasFile('file')) {
                    $mes->file_id = $message_file->id;
                }
                $mes->save();
            }

            return redirect('http://localhost:8000/messages/send')->with('success', 'Το μήνυμα προς όλους τους φοιτητές εστάλη επιτυχώς!');
        }
    }


    public function read_message($mode, $message_id)
    {
        $message = Message::find($message_id);
        $message->seen = true;
        $message->save();
        return view("messages.message_index")->with('data', ['message'=>$message,'mode'=>$mode]);
    }

    // katevasma arxeiwn ergasiwn
    public function download_file($mode, $mes_id, $file_name)
    {
        $file_path = 'public/messages_files/' . $file_name;

        if (!Storage::disk('local')->exists($file_path)) {
            return redirect('http://localhost:8000/messages/inbox/' . $mes_id)->with('error', 'Το αρχείο δεν βρέθηκε!');
        }

        return Storage::disk('local')->download($file_path);
    }
}
