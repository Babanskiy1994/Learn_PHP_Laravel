<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(LoginRequest $request)
    {
        $data = $request->except(['_token']);

        if (auth("web")->attempt($data)){
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route("home"));
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    public function register(RegistrationRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }

    public function forgot(ForgotRequest $request)
    {
        $data = $request->all();

        $user = User::where(["email" => $data["email"]])->first();

        $password = uniqid();
        $user->password = bcrypt($password);
        $user->save();
        Mail::to($user)->send(new ForgotPassword($password));
        return redirect(route("login"));
    }
}
