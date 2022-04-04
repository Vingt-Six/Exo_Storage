<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index() {
        $archived = Image::where('archived', true)->get();
        return view('pages.corbeille', compact('archived'));
    }

    public function create() {
        return view('pages.admin');
    }

    public function store(Request $request) {
        $store = new Image();
        $store->src = $request->file('src')->hashName();
        Storage::put('public/', $request->file('src'));
        $store->save();
        return redirect('/');
    }

    public function edit($id) {
        $edit = Image::find($id);
        return view('pages.edit', compact('edit'));
    }

    public function update($id, Request $request) {
        $update = Image::find($id);
        Storage::delete('public/'. $update->src);
        $update -> src = $request->file('src')->hashName();
        Storage::put('public/', $request->file('src'));
        $update -> save();
        return redirect('/');
    }

    public function destroy($id) {
        $delete = Image::find($id);
        Storage::delete('public/'. $delete->src);
        $delete -> delete();
        return redirect('/');
    }

    public function archive($id) {
        $archive = Image::find($id);
        $archive -> archived = !$archive->archived;
        $archive -> save();
        return redirect('/');
    }
}
