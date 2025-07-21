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
        $profile = [
            'name' => 'John Doe',
            'slogan' => 't2Q9G@example.com',
            'address' => '1234567890',
            'contacts' => ['1234567890','1234567890'],
            'socials' => [ 
                    [  'name' => 'Facebook', 'url' => 'www.facebook.com', 'iconPreview' => 'facebook.jpg' ],
                    [  'name' => 'Facebook', 'url' => 'www.facebook.com', 'iconPreview' => 'facebook.jpg' ]
                ]
        ];
         return Inertia::render('Admin/Profile',compact('profile'));
    }
     
    public function updateProfile()
    {
         return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    


}
