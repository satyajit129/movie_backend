<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AdminAuthController extends Controller
{
    public function adminAuth()
    {
        return view('backend.pages.auth.login');
    }

    public function adminLoginRequest(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $remember = $request->has('remember');
            if (Auth::attempt($credentials, $remember)) {
                $user = Auth::user();
                if ($user->role == UserRoleEnum::ADMIN) {
                    return redirect()->route('adminDashboard');
                } else {
                    return redirect()->back()->with('error', 'You are not authorized to access the Dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } catch (Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('adminAuth');
    }

}
