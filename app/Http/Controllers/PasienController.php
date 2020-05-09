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
        $data['title'] = "Pasien - PsychoCare";
        return view('pasien_index', $data);
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


    public function signOut(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
