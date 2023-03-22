<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class GuestUnduhController extends Controller
{
    public function index()
    {
        return view('guest.unduh', [
            'downloads' => Download::paginate(4)
        ]);
    }
}
