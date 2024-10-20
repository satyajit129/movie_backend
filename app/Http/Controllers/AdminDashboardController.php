<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function adminDashboard(){
        return view('backend.pages.dashboard.admin-dashboard');
    }
}
