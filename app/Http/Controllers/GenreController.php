<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Genre::orderBy('id', 'desc')->get();
        return view('admin.genre.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->back()->with('success', 'Thêm thể loại thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::find($id);
        $list = Genre::orderBy('id', 'desc')->get();
        return view('admin.genre.form', compact('list', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $genre = Genre::where('id', $id)->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return redirect()->back()->with('success', 'Cập nhật thể loại thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id)->delete();
        return redirect()->back()->with('error', 'Xóa thể loại thành công !');
    }
}
