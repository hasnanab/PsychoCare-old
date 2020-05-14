<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    private $pages;

    public function _construct()
    {
        $this->pages = array();

    }

    public function index(Request $request)
    {
        $data['session'] = array(
            'id' => $request->session()->get('s_id'),
            'username' => $request->session()->get('s_username'),
            'telepon' => $request->session()->get('s_telepon'),
            'foto' => $request->session()->get('s_foto'),
            'role' => $request->session()->get('s_role'),
        );
        $id = $request->session()->get('s_id');
        $data['user'] = User::where('id', $id)->first();
        $foto =  $data['user']['foto'];
        $data['title']= "Pasien - PsychoCare";
        return view('pasien_index', $data, ['foto'=>$foto]);
    }

    public function cariPsikiater()
    {
        $user = User::join('psikiater', 'user.id', '=', 'user_id')
            ->select('user.id','nama', 'email', 'tarif', 'foto')
            ->where('role_id', 3)
            ->get();
        return view('cari_psikiater', ['user' => $user]);
    }

    public function search(Request $request)
    {
//        $users = User::join('psikiater', 'user.id', '=', 'user_id')
//            ->select('nama', 'email', 'tarif', 'foto')
//            ->where('role_id', 3)
//            ->get();
//
//        $user = collect($users)->filter(function ($value) use ($request) {
//            return strpos(strtolower($value->nama), strtolower($request->search)) !== false;
//        });
//
//        return $user;
    }

    public function profil(Request $request){
        $id = $request->session()->get('s_id');
        $data['pasien'] = User::where('id', $id)->get();
        $data['title'] = "PROFIL";
        return view('profil', $data);
    }

    public function formEdit(Request $request){
        $id = $request->session()->get('s_id');
        $pasien = User::where('id', $id)->first();
        return view('form_edit_profil', ['pasien'=>$pasien]);
    }

    public function editProfilSave(Request $request){
        $id = $request->session()->get('s_id');
        $directory = 'assets/photo/pasien';
        $file = $request->file('file');
        $file->move($directory, $file->getClientOriginalName());
        $pasien = User::where('id', $id)->first();
        $pasien->id = $id;
        $pasien->username = $request->username;
        $pasien->nama = $request->nama;
        $pasien->email = $request->email;
        $pasien->telepon = $request->telepon;
        $pasien->foto = $directory."/".$file->getClientOriginalName();
        $pasien->role_id = 2;
        $pasien->save();
        return redirect('/pasien/profil');
    }

    public function pasienProfil(Request $request){
        $id = $request->session()->get('s_id');
        $data['pasien'] = User::where('id', $id)->get();
        $data['title'] = "PROFIL";
        return view('profil', $data);
    }

    public function formEditPasien(Request $request){
        $id = $request->session()->get('s_id');
        $pasien = User::where('id', $id)->first();
        return view('form_edit_profil', ['pasien'=>$pasien]);
    }

    public function editPasienProfilSave(Request $request){
        $id = $request->session()->get('s_id');
        $directory = 'assets/photo/pasien';
        $file = $request->file('file');
        $file->move($directory, $file->getClientOriginalName());

        $pasien = User::where('id', $id)->first();
        $pasien->id = $id;
        $pasien->username = $request->username;
        $pasien->nama = $request->nama;
        $pasien->email = $request->email;
        $pasien->telepon = $request->telepon;
        $pasien->foto = $directory."/".$file->getClientOriginalName();
        $pasien->role_id = 2;
        $pasien->save();
        return redirect('/pasien/profil');
    }

    public function signOut(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
