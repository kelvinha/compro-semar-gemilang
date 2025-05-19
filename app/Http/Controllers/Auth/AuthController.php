<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ToastrHelper;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginpage() {
        return view('auth.login');
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $req->get('email');
        $password = $req->get('password');

        $user = User::where('email', $email)->first();
        if ($user && \Hash::check($password, $user->password)) {
            // Cek role user dan redirect sesuai role
            $role = $user->role;

            auth()->guard('web')->login($user);
            session(["email" => $email]);
            ToastrHelper::success('Login successful');

            // Check if user has a role_id (new system) or role (old system)
            if (isset($user->role_id)) {
                // New role system
                if ($user->isSuperAdmin()) {
                    return redirect('/admin');
                } elseif ($user->isAdmin()) {
                    return redirect('/admin');
                } else {
                    return redirect('/admin');
                }
            } else {
                // Old role system
                switch($role) {
                    case 'Admin':
                        return redirect('/admin');
                    default:
                        return redirect('/admin');
                }
            }
        } else {
            ToastrHelper::error('Invalid email or password');
            return redirect('/auth-user');
        }
    }

    public function logout() {
        session()->flush();
        Auth::logout();
        ToastrHelper::success('Logout successful');
        return redirect('login');
    }
}

