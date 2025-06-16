<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
class ManagerAuthController extends Controller
{
    public function showRegisterForm()
{
    return view('Managers.Register');
}

    public function showLogin()
    {
        return view('Managers.Login');
    }
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:managers,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $manager = Manager::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::guard('manager')->login($manager);

    return redirect()->route('students.index'); // Change to your actual route
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
