<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
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

    public function adminProfile()
    {
        $user = Auth::user();
        return view('backend.pages.auth.profile', compact('user'));
    }

    public function adminUserList()
    {
        $users = User::all();
        return view('backend.pages.auth.user_list', compact('users'));
    }

    public function adminUserCreateorUpdate($id = null)
    {
        $user = $id ? User::findOrFail($id) : null;
        if ($user) {
            return view('backend.pages.auth.user_create_or_update', compact('user'));
        } else {
            return view('backend.pages.auth.user_create_or_update');
        }
    }
    public function adminUserSave(Request $request, $id = null)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email' . ($id ? ",$id" : ''),
                'role' => 'required|in:1,2',
            ];
            if (!$id || $request->filled('password')) {
                $rules['password'] = 'required';
            }
    
            $validatedData = $request->validate($rules);
    
            $user = $id ? User::findOrFail($id) : new User;
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->role = $validatedData['role'];
            
            if ($request->filled('password')) {
                $user->password = Hash::make($validatedData['password']);
            }
            
            $user->save();
    
            return redirect()->route('adminUserList')->with('success', 'User ' . ($id ? 'updated' : 'created') . ' successfully.');
            
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('adminUserList')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function adminProfileSave(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'old_password' => 'nullable',
                'password' => 'nullable',
            ]);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->filled('old_password') && $request->filled('password')) {
                if (Hash::check($request->input('old_password'), $user->password)) {
                    $user->password = Hash::make($request->input('password'));
                } else {
                    return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
                }
            }
            $user->save();
            return redirect()->route('adminProfile')->with('success', 'Profile updated successfully.');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
