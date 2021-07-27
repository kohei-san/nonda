<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $photos = Storage::get('public/storage');

        return view('family.image.index', compact('images','photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('family.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Image $image)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'message' => 'nullable|max:1000',
            'image' => 'required|file',
            'image_title' => 'nullable|max:50', 
        ]);

        $imageFile = $request->image;
        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName. '.'. $extension;

        if(!is_null($imageFile) && $imageFile->isValid()){
            Storage::putFileAs('public/storage',$imageFile, $fileNameToStore);
        }
        $file_path = Storage::path($imageFile);

        $image->title = $request->title;
        $image->message = $request->message;
        $image->image = $fileNameToStore;
        $image->family_id = $request->user()->id;
        $image->save();

        return redirect()->route('family.image.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('family.image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $image->title = $request->title;
        $image->message = $request->message;
        $image->image_title = $request->image_title;

        $image->save();

        return redirect()->route('family.image.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::findOrFail($id)->delete();
        return redirect()->route('family.image.index');
    }
}
