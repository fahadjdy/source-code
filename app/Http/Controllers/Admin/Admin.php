<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;


class Admin extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard');
    } 
    public function profile()
    {
         return Inertia::render('Admin/Profile');
    }    
}
