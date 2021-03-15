<?php

namespace App\Http\Controllers;

use Exception;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function auth(Request $request)
    {

        $data =
            [
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ];

        try {
            if (env('PASSWORD_HASH')) {
                Auth::attempt($data, false);
            } else {
                $user = User::where('email', $request->email)->first();
                if (!$user) {
                    throw new Exception("Email inválido");
                    return redirect()->back()->with(['message' => "Email inválido"]);
                }
                if ($user->password != $request->get('password')) {
                    throw new Exception("Senha inválida");
                }

                Auth::login($user);
                return redirect()->intended('admin/home');
            }
        } catch (Exception $e) {
            //throw $th;
            return redirect()->back()->with(['message' => $e->getMessage()]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showLoginForm');
    }
}
