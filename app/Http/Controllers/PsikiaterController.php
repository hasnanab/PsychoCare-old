<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PsikiaterController extends Controller
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
        $id = $request->session()->get('s_id');
        $data['user'] = User::where('id', $id)->get();
        $gambar = collect($data['user'])->flatMap(function ($photo) use ($id) {
            $foto = $photo->foto;
            $username = $photo->username;
            return User::where('id', $id)->get();
        })->all();
//       dd($gambar);
        $data['title']= "Psikiater - PsychoCare";
        return view('psikiater_index', ['gambar'=>$gambar]);
    }

    public function profil(Request $request){
        $id = $request->session()->get('s_id');
        $data['psikiater'] = User::where('id', $id)->get();
        $data['title'] = "PROFIL";
        return view('profil_psikiater', $data);
    }

    public function formEdit(Request $request){
        $id = $request->session()->get('s_id');
        $psikiater = User::where('id', $id)->first();
        return view('form_edit_profil_psikiater', ['psikiater'=>$psikiater]);
    }

    public function editProfilSave(Request $request){
        $id = $request->session()->get('s_id');
        $directory = 'assets/photo/psikiater';
        $file = $request->file('file');
        $file->move($directory, $file->getClientOriginalName());

        $psikiater = User::where('id', $id)->first();
        $psikiater->id = $id;
        $psikiater->username = $request->username;
        $psikiater->nama = $request->nama;
        $psikiater->email = $request->email;
        $psikiater->telepon = $request->telepon;
        $psikiater->foto = $directory."/".$file->getClientOriginalName();
        $psikiater->role_id = 3;
        $psikiater->save();
        return redirect('/psikiater/profil');
    }


    public function signOut(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}
