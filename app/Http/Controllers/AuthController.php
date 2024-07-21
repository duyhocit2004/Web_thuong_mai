<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     //login 
     public function ShowFormLogin(){
        return view('auth.login');
    }
    public function Login( Request $request){
        $user = $request ->validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string'],
        ]);
        // dd($user);
        //nó sẽ cố gắng xác thực người dùng dựa trên thông tin được cung cấp trong $userbiến
        //(có thể chứa thông tin đăng nhập như email và mật khẩu).
       if(Auth::attempt($user,$remember = false)){
        return redirect()->intended('/home');
       }
        
    return redirect()->back()->withErrors([
        'email' => 'lỗi thông tin không đúng',
        'password' => 'password sai'
    ]);
    }

    //register
    public function ShowFormRegister(){
       return view('auth.register');
    }
    public function Register(Request $request){
        // $data = $request->all();
        // $data;
        $data = $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        

        $user = User::query()->create($data);
        DB::connection()->getDatabaseName();
        // dd($user);
        Auth::login($user);
        return redirect()->intended('home');

    }
    public function Logout(Request $request){
        Auth::logout();
         return redirect()->intended('Login');;
    }
}
