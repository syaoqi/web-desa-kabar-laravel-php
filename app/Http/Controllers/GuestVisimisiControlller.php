<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestVisimisiControlller extends Controller
{
    public function index(){
        return view("guest.visimisi");
    }
}
