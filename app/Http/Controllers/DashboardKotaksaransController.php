<?php

namespace App\Http\Controllers;

use App\Models\Kotaksaran;
use Illuminate\Http\Request;
use App\Models\User;
use Kotaksarans;

class DashboardKotaksaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.kotaksarans.index', [
            'kotaksarans' => Kotaksaran::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guest.kotaksarans.create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'saran' => 'required',

        ]);

        $validateData['user_id'] = auth()->user()->id;


        Kotaksaran::create($validateData);

        return redirect('/kotaksarans')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kotaksaran  $kotaksaran
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kotaksaran  $kotaksaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kotaksaran $kotaksaran)
    {
        return view('guest.kotaksarans.edit', [
            'kotaksaran' => $kotaksaran,
            'kotaksarans' => Kotaksaran::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kotaksaran  $kotaksaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kotaksaran $kotaksaran)
    {
        $rules = [
            'saran' => 'required',
        ];


        $validateData = request()->validate($rules);

        $validateData['user_id'] = auth()->user()->id;


        Kotaksaran::where('id', $kotaksaran->id)->update($validateData);

        return redirect('/kotaksarans')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kotaksaran  $kotaksaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kotaksaran $kotaksaran)
    {
        Kotaksaran::destroy($kotaksaran->id);

        return redirect('/kotaksarans')->with('success', 'Post has been deleted!');
    }
}
