<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function index(Request $request) {
        if($request->session()->exists('user')){
            return redirect('agendamentos/');
        }
        else{
            return view('login');
        }
    }

    public function login(LoginRequest $request)
    {
        $user = new User($request->all());

        $userfull = User::login($user);

        if($userfull != null){
            $request->session()->put('user', $userfull);
            //$user = $request->session()->get('user');
            //$request->session()->forget('user');
            return redirect("agendamentos/");
        }
        else{
            $errors = new MessageBag(['email' => ['Email ou senha inválidos.']]);
            return Redirect::back()->withErrors($errors)->withInput(Input::except('email'));
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget("user");
        return redirect("/");
    }

}
