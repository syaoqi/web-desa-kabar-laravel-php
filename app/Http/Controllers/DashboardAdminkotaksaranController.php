<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kotaksaran;

class DashboardAdminkotaksaranController extends Controller
{
    public function index()
    {
        return view('admin.kotaksaran', [
            'kotaksarans' => Kotaksaran::all()
        ]);
    }

    public function destroy(Kotaksaran $kotaksaran)
    {
        Kotaksaran::destroy($kotaksaran->id);

        return redirect('/kotaksaran')->with('success', 'Post has been deleted!');
    }
}
