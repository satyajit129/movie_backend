<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function adminDashboard(){
        $total_movies = Movie::count();
        $total_users = User::count();
        return view('backend.pages.dashboard.admin-dashboard',compact('total_movies','total_users'));
    }
}
