<?php

namespace App\Http\Controllers;

use App\ChatMapping;
use App\Events\FormSubmitted;
use App\Pesan;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $psikiater_id)
    {
        $user_id = $request->session()->get('s_id');
        $data['room'] = ChatMapping::firstOrCreate(['pasien_id' => $user_id, 'psikiater_id' => (int)$psikiater_id]);
        $room_id = $data['room']->id;
        $data['pesan'] = Pesan::where('room_chat', $room_id)->get();
        $data['psikiater'] = User::where('id', $psikiater_id)->first();
        $data['to'] = User::where('id', $psikiater_id)->first();
        $data['id'] = $user_id;
        return view('sender', $data);
    }

    public function historyChat(Request $request, $to_id)
    {
        $user_id = $request->session()->get('s_id');
        $data['room'] = ChatMapping::where('psikiater_id', $user_id)
            ->where('pasien_id', $to_id)
            ->orWhere(function ($query) use ($to_id, $user_id){
                return $query->where('psikiater_id', $to_id)->where('pasien_id', $user_id);
            })->first();
        $data['to'] = User::where('id', $to_id)->first();
        $data['pesan'] = Pesan::where('room_chat', $data['room']->id)->get();
        $data['id'] = $user_id;
        return view('sender', $data);
    }

    public function sendMessage(Request $request)
    {
        $id = $request->session()->get('s_id');
        $chat = $request->chat;
        $room_id = $request->room_id;
        $chat_mapping = ChatMapping::where('id', $room_id)->first();
        $pesan = new Pesan();
        $pesan->from = $id;
        $pesan->to = $chat_mapping->pasien_id == $id ? $chat_mapping->psikiater_id : $chat_mapping->pasien_id;
        $pesan->pesan = $chat;
        $pesan->is_read = false;
        $pesan->room_chat = $room_id;
        $pesan->save();
        event(new FormSubmitted($pesan));
        return $pesan;
    }

//    public function mappingChat(Request $request)
//    {
//        $id = $request->session()->get('s_id');
//        $chat = ChatMapping::where('pasien_id', $id)->get();
//        $riwayat = collect($chat)->flatMap(function ($psikiater) use ($id) {
//            $psikiater_id = $psikiater->psikiater_id;
//            return User::where('id', $psikiater_id)->get();
//        })->all();
//        return view('riwayat', ['riwayat' => $riwayat]);
//    }
}
