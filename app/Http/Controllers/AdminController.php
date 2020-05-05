<?php

namespace App\Http\Controllers;

use App\Psikiater;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $pages;

    public function _construct() {
        $this ->pages =array();

    }

    public function index(Request $request){
        $data['session'] = array(
            'id' => $request->session()->get('s_id'),
            'username' => $request->session()->get('s_username'),
            'telepon' => $request->session()->get('s_telepon'),
            'foto' => $request->session()->get('s_foto'),
            'role' => $request->session()->get('s_role'),
        );
        $data['title']= "Admin - PsychoCare";
        return view('admin_index', $data);
    }

    public function add_Psikiater(Request $request){
        if($request->method()=='POST'){
            $directory = 'assets/photo/psikiater';
            $file = $request->file('file');
            $file->move($directory, $file->getClientOriginalName());

            $user = new User();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->telepon = $request->telepon;
            $user->foto = $directory."/".$file->getClientOriginalName();
            $user->role_id = 3;
            if($user->save()){
                $psikiater = new Psikiater();
                $psikiater->tarif = $request->tarif;
                $user->psikiater()->save($psikiater);
            }
        }
        return redirect('/admin');
    }
    public function signOut(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}
