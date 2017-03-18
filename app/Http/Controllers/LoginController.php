<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\Guru;
use App\Models\siswa;

use Auth;

class LoginController extends Controller
{
    public function index()
    {
    	return view('index');
    }
    public function postLogin(Request $request)
    {
    	$this->validate($request,[
    		'username' => 'required',
    		'password' => 'required'
    	]);
    	if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
    		if (Auth::user()->level == 1) {
    			$guru = Guru::where('no_induk_guru','=',Auth::user()->no_induk)->first();
    			return 'Selamat Datang Guru ' . $guru->nama_guru;
    		}elseif (Auth::user()->level == 2) {
    			$siswa = siswa::where('no_induk_siswa','=',Auth::user()->no_induk)->first();
    			return 'Selamat Datang Siswa ' . $siswa->nama_siswa;
    		}elseif (Auth::user()->level == 3) {
    			return 'Selamat Datang Admin ' . Auth::user()->username;
    		}
    		/*$row = User::where([
    			['username','=',$request->input('username')],
    			['password','=',bcrypt($request->user()->password)]
    		])->get();
    		if($request->user()->id_level ==  "1"){
    			Session::put('id_user', $request->user()->id);
    			Session::put('username', $request->user()->username);
    			Session::put('id_level', $request->user()->id_level);
    			return redirect()->route('admin');
    		}elseif($request->user()->id_level == "2"){
    			$kasir = Kasir::where([
    				['username_kasir','=',$request->input('username')],
    				['password_kasir','=',md5($request->input('password'))]
    			])->first();
    			if ($kasir->akses_kasir == 'Y') {
    				Session::put('id_user', $kasir->id_kasir);
    				Session::put('username', $request->user()->username);
    				Session::put('id_level', $request->user()->id_level);
    				return redirect()->route('kasir');
    			}
    		echo "<script type='text/javascript'>
    				alert('User anda tidak memiliki izin');  
    				window.location.href = '../';
    			</script>";
    		}*/
    	}else{
    		return redirect()->back();
    	}
    }
}
