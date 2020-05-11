<?php

namespace App\Http\Controllers;

use App\ChatMapping;
use App\Events\MessageSent;
use App\Pesan;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $psikiater_id){
        $id= $request->session()->get('s_id');
        $map = new ChatMapping();
        $map->pasien_id = $id;
        $map->psikiater_id = (integer) $psikiater_id;
        $map->save;
        return view('chat', ['map'=>$map]);
    }

    public function sendMessage(Request $request)
    {
        if($request->method()=='POST') {
            $user_id= $request->session()->get('s_id');

            $user = User::where('id', $user_id);

            $message = Pesan::create([
                'from'=> 2,
                'to'=> 3,
                'pesan' => $request->input('message'),
                'is_read'=> false
            ]);
            broadcast(new MessageSent($message))->toOthers();
            return ['status' => 'Message Sent!'];
        }
    }

    public function mappingChat(Request $request){
        $id = $request->session()->get('s_id');
        $chat = ChatMapping::where('pasien_id', $id)->get();
        $riwayat = collect($chat)->flatMap(function ($psikiater) use ($id){
            $psikiater_id = $psikiater->psikiater_id;
            return User::where('id', $psikiater_id)->get();
        })->all();
        return view('riwayat', ['riwayat'=>$riwayat]);
    }
}
