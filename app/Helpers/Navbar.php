<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class navbar{
    public static function NavbarColor(){
        if(Auth::check())
        {
            if(Auth::user()->role == 'admin')
            {
                return 'navbar-light bg-white';
            }
            elseif(Auth::user()->role == 'User')
            {
                return 'navbar-light bg-success';
            }
            elseif(Auth::user()->role == 'Student')
            {
                return 'navbar-light bg-primary';
            }
        }
        else
        {
            return 'navbar-light bg-light';
        }
    }
}
