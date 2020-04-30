<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function __construct() {}

    public function login() {
        $data['title'] = "Sign In - PsychoCare";
        return view('login_page', $data);
    }

    public function loginAction(Request $request) {
        $method = $request->method();
        if($method == "POST") {
            $result = DB::selectOne("SELECT u.id, u.nama, u.telepon, r.nama_role AS role FROM user AS u RIGHT JOIN role AS r ON u.role_id = r.id WHERE u.email=? AND u.password=?", [
                $request->input('email'),
                $request->input('password')
            ]);
            if($result->role == "Psikiater") {
                $request->session()->put('s_id', $result->id);
                $request->session()->put('s_username', $result->nama);
                $request->session()->put('s_telepon', $result->telepon);
                $request->session()->put('s_role', $result->role);

                return redirect('/psikiater');
            }else if($result->role == "Pasien") {
                $request->session()->put('s_id', $result->id);
                $request->session()->put('s_username', $result->nama);
                $request->session()->put('s_telepon', $result->telepon);
                $request->session()->put('s_role', $result->role);

                return redirect('/pasien');
            }else {
                return redirect('/login');
            }
        }else {
            return redirect('/login');
        }
    }

    public function signup() {
        $data['title'] = "Sign Up - PsychoCare";
        return view('signup_page', $data);
    }

    public function signupAction(Request $request) {
        $method = $request->method();
        if($method == "POST") {
            DB::insert("INSERT INTO user (id, nama, email, password, telepon, role_id) VALUES (?, ?, ?, ?, ?, ?)", [
                $request->input('id'),
                $request->input('nama'),
                $request->input('email'),
                $request->input('password'),
                $request->input('telepon'),
                $request->input('role_id')
            ]);
            return redirect('/login');
        }else {
            return redirect('/signup');
        }
    }
}