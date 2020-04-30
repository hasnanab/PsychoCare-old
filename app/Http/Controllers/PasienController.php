<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
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
            'role' => $request->session()->get('s_role'),
        );
        $data['title']= "Pasien - PsychoCare";
        return view('pasien_index', $data);
    }

    public function signOut(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }
}