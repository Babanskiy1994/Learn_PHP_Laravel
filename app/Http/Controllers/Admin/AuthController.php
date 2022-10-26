<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view("admin.auth.login");
    }

    public function login(LoginRequest $request)
    {
        $data = $request->except(['_token']);

        if (auth("admin")->attempt($data)){
            return redirect(route("admin.posts.index"));
        }

        return redirect(route("admin.login"))->withErrors(["email" => "Пользователь не найден либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect(route("home"));
    }
}
