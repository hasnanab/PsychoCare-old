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
        $id = $request->session()->get('s_id');
        $data['user'] = User::where('id', $id)->get();
        $gambar = collect($data['user'])->flatMap(function ($photo) use ($id) {
            $foto = $photo->foto;
            $username = $photo->username;
            return User::where('id', $id)->get();
        })->all();
//       dd($gambar);
        $data['title']= "Pasien - PsychoCare";
        return view('admin_index', ['gambar'=>$gambar]);;
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

    public function profil(Request $request){
        $id = $request->session()->get('s_id');
        $data['admin'] = User::where('id', $id)->get();
        $data['title'] = "PROFIL";
        return view('profil_admin', $data);
    }

    public function formEdit(Request $request){
        $id = $request->session()->get('s_id');
        $admin = User::where('id', $id)->first();
        return view('form_edit_profil_admin', ['admin'=>$admin]);
    }

    public function editProfilSave(Request $request){
        $id = $request->session()->get('s_id');
        $directory = 'assets/photo/admin';
        $file = $request->file('file');
        $file->move($directory, $file->getClientOriginalName());
        $admin = User::where('id', $id)->first();
        $admin->id = $id;
        $admin->username = $request->username;
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        $admin->telepon = $request->telepon;
        $admin->foto = $directory."/".$file->getClientOriginalName();
        $admin->role_id = 1;
        $admin->save();
        return redirect('/admin/profil');
    }

    public function signOut(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}
