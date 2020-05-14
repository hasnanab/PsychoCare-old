<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function __construct() {}

    public function login() {
        $data['title'] = "Sign In - PsychoCare";
        return view('login_page', $data);
    }

    public function loginAction(Request $request) {
        $method = $request->method();
        if($method == "POST") {
            $result = DB::selectOne("SELECT u.id, u.nama, u.telepon, u.foto, r.nama_role AS role FROM user AS u RIGHT JOIN role AS r ON u.role_id = r.id WHERE u.email=? AND u.password=?", [
                $request->input('email'),
                $request->input('password')
            ]);
            if($result->role == "Admin"){
                $request->session()->put('s_id', $result->id);
                $request->session()->put('s_username', $result->nama);
                $request->session()->put('s_telepon', $result->telepon);
                $request->session()->put('s_foto', $result->foto);
                $request->session()->put('s_role', $result->role);

                return redirect('/admin');

            }else if($result->role == "Psikiater") {
                $request->session()->put('s_id', $result->id);
                $request->session()->put('s_username', $result->nama);
                $request->session()->put('s_telepon', $result->telepon);
                $request->session()->put('s_foto', $result->foto);
                $request->session()->put('s_role', $result->role);

                return redirect('/psikiater');
            }else if($result->role == "Pasien") {
                $request->session()->put('s_id', $result->id);
                $request->session()->put('s_username', $result->nama);
                $request->session()->put('s_telepon', $result->telepon);
                $request->session()->put('s_foto', $result->foto);
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
        $data['role'] = Role::all();
        return view('signup_page', $data);
    }

    public function signupAction(Request $request) {
        if($request->method() == "POST") {
            $directory = 'assets/photo/pasien';
            $file = $request->file('file');
            $file->move($directory, $file->getClientOriginalName());

            $user = new User();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->email =$request->email;
            $user->password = $request->pass;
            $user->telepon = $request->telepon;
            $user->foto = $directory . "/" . $file->getClientOriginalName();
            $user->role_id = 2;
            $user->save();
            return redirect('/login');
        } else {
            return redirect('/signup');
        }
    }

    public function prosesInputEmail(Request $request)
    {
        if ($request->method() == "POST") {
            $reset = User::where('email', $request->email)->first();
            $reset->password = $request->password;
            $reset->save();
            return redirect('/login');
        }else{
            redirect('/reset/password');
        }
    }
}
