<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admins.index',[
            'admins' => Admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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
            'nik' => 'required|min:16|max:16|unique:admins',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',

        ]);
        $validateData['user_id'] = auth()->user()->id;
        Admin::create($validateData);

        return redirect('/admins')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', [
            'admin' => $admin,
            'admins' => Admin::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
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
        if ($request->nik != $admin->nik) {
            $rules['nik'] = 'required|unique:admins';
        }

        $validateData = request()->validate($rules);
        $validateData['user_id'] = auth()->user()->id;
        Admin::where('id', $admin->id)->update($validateData);

        return redirect('/admins')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        Admin::destroy($admin->id);

        return redirect('/admins')->with('success', 'Post has been deleted!');
    }
}
