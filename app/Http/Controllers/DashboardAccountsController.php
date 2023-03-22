<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardAccountsController extends Controller
{

    public function index()
    {
        return view('admin.accounts.index', [
            'users' => User::all()
        ]);
    }
}
