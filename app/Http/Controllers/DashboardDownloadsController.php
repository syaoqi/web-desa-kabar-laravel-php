<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardDownloadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.downloads.index', [
            'downloads' => Download::all()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.downloads.create', [
            'downloads' => Download::all()
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
            'title' => 'required|max:255|unique:downloads',
            'slug' => 'required|unique:downloads',
            'document' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:2048',
        ]);

        if ($request->file('document')) {
            $validateData['document'] = $request->file('document')->store('post-document');
        }

        $validateData['user_id'] = auth()->user()->id;

        Download::create($validateData);

        return redirect('/downloads')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        return view('admin.downloads.edit', [
            'download' => $download,
            'downloads' => Download::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download)
    {
        $rules = [
            'title' => 'required|max:255',
            'document' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:2048',
        ];

        if ($request->slug != $download->slug) {
            $rules['slug'] = 'required|unique:downloads';
        }

        $validateData = request()->validate($rules);

        if ($request->file('document')) {
            if ($request->oldDocument) {
                Storage::delete($request->oldDocument);
            }
            $validateData['document'] = $request->file('document')->store('post-document');
        }
        $validateData['user_id'] = auth()->user()->id;


        Download::where('id', $download->id)->update($validateData);

        return redirect('/downloads')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        if ($download->document) {
            Storage::delete($download->document);
        }
        Download::destroy($download->id);

        return redirect('/downloads')->with('success', 'Post has been deleted!');
    }
    public function checkSLug(Request $request)
    {
        $slug = SlugService::createSlug(Download::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
