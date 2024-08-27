<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Penggunas;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class LoginPageController extends Controller
{
    //
    public function index()
    {
        //$products = Product::latest()->paginate(5);
        //$berita = Berita::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $judulconten = "Halaman Login";
        $header = false;
        
        return view('login.signin', compact('judulconten','header'));
    }

   //Saiful

    // public function actionlogin(Request $request)
    // {
    //     $data = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ];

    //     if (Auth::Attempt($data)) {
    //         return redirect('/dashboard');
    //     }else{
    //         Session::flash('error', 'Email atau Password Salah');
    //         return redirect('/login');
    //     }
    // }

    public function authenticate(Request $request)
    {

        
        // $this->validate($request,[
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);
        
        
        $admin = Penggunas::where('username', $request->username)->where('password', $request->password)->first();
        
        if ($admin) {
            $admin->remember_token  = 1;
            $admin->statuslogin     = 1;
            $admin->cobalogin       = 0;
            $admin->save();

            
            
            session(['berhasil_login_pengguna'  => true]);
            session(['namalengkap'              => $admin->namalengkap]);
            session(['statuslogin'              => $admin->statuslogin]);
            session(['kodecustomer'             => $admin->kodecustomer]);

            return redirect('/');
            
        } else {
            $cobalogin = 1;
            Penggunas::where('username', $request->username)->update(['remember_token' => 0, 'cobalogin' => DB::raw('cobalogin + 1'), 'statuslogin' => 7]);
            return redirect('/login')->with('error', 'Terdapat Kesalahan Data, Silahkan Login Kembali');
        }
    }

    public function actionlogout()
    {
        session()->forget('berhasil_login_pengguna');
        session()->forget('namalengkap');
        session()->forget('statuslogin');
        session()->forget('kodecustomer');

        $kodecustomer = session('kodecustomer');
        Penggunas::where('kodecustomer', $kodecustomer)->update(['remember_token' => 0]);
        session()->flush();
        return redirect('/login');
    }


    public function register()
    {
        return view('login/signup');
    }
    
    public function aactionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => 1
        ]);

        // Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        // return redirect('/register');
        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
    }


    // Login MASTER

    public function loginmaster()
    {
        //$products = Product::latest()->paginate(5);
        //$berita = Berita::latest()->paginate(5);
        //$kegiatan = Kegiatan::latest()->paginate(5);
        $judulconten = "Halaman Login Master";
        $header = false;
        
        return view('login.signin-master', compact('judulconten','header'));
    }

    public function authenticatemaster(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Users::where('email', $request->email)->where('password', $request->password)->first();
        if ($admin) {
            $admin->remember_token = 1;
            $admin->save();
            
            session(['master_berhasil_login'    => true]);
            session(['email'                    => $request->email]);
            session(['namapengguna'             => $admin->name]);
            return redirect('/dashboard');
        } else {
            Users::where('email', $request->email)->update(['remember_token' => 0]);
            return redirect('master-login')->with('error','Terdapat Kesalahan Data, Silahkan Login Kembali');
        }
    }

    public function actionlogoutmaster()
    {
        session()->forget('master_berhasil_login');
        $email = session('email');
        User::where('email', $email)->update(['remember_token' => 0]);
        session()->flush();
        return redirect('/master-login');
    }

    //Daftar Pengguna
    public function daftarPengguna(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            'namalengkap' => 'required',
            'no_hp' => 'nullable',
            'jeniskelamin' => 'required',
            'tahunlahir' => 'nullable',
            'alamat' => 'nullable'
        ]);

        $kodecustomer = Str::random(10);

        Penggunas::create([
            'username'          => $request->username,
            'password'          => $request->password,
            'namalengkap'       => $request->namalengkap,
            'no_hp'             => $request->no_hp,
            'jeniskelamin'      => $request->jeniskelamin,
            'tahunlahir'        => $request->tahunlahir,
            'alamat'            => '',
            'remember_token'    => 0,
            'statuslogin'       => 0,
            'kodecustomer'      => $kodecustomer
        ]);

        $namalengkap = $request->namalengkap;

        $admin = Penggunas::where('username', $request->username)->where('password', $request->password)->first();
        
        $admin->remember_token  = 1;
        $admin->statuslogin     = 1;
        $admin->cobalogin       = 0;
        $admin->save();
        
        session(['berhasil_login_pengguna'  => true]);
        session(['namalengkap'              => $namalengkap]);
        session(['statuslogin'              => $admin->statuslogin]);
        session(['kodecustomer'             => $admin->kodecustomer]);

        $kodeorder = session('kodeorder');
        if($kodeorder != ""){
            return redirect('/cart');
         }else{
            return redirect('/');
        }


        //return redirect('/daftar')->with('success','Data Pengguna Berhasil Disimpan');
    }
}