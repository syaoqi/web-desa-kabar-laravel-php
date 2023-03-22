<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class DashboardPenduduksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.penduduks.index', [
            'penduduks' => Penduduk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penduduks.create',[
            'penduduks' => Penduduk::all()
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
            'name' => 'required',
            'nik' => 'required|min:16|max:16|unique:penduduks',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',

        ]);
        $validateData['user_id'] = auth()->user()->id;
        Penduduk::create($validateData);

        return redirect('/penduduks')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        return view('admin.penduduks.edit', [
            'penduduk' => $penduduk,
            'penduduks' => Penduduk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $rules = [
            'name' => 'required',
            'nik' => 'required|min:16|max:16',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
        ];
        if ($request->nik != $penduduk->nik) {
            $rules['nik'] = 'required|unique:penduduks';
        }
        $validateData = request()->validate($rules);
        $validateData['user_id'] = auth()->user()->id;
        Penduduk::where('id', $penduduk->id)->update($validateData);

        return redirect('/penduduks')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->id);

        return redirect('/penduduks')->with('success', 'Post has been deleted!');
    }
}
