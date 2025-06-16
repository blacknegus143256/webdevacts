<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;

class ManagerAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.manager-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('manager')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/students');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('manager')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/manager/login');
    }
}
