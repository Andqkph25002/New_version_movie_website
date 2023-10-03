<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
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
        $list = Country::orderBy('position', 'asc')->get();
        return view('admin.country.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->back()->with('message', 'Thêm quốc gia thành công !');
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
        $country = Country::find($id);
        $list = Country::orderBy('position', 'asc')->get();
        return view('admin.country.form', compact('list', 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $country = Country::where('id', $id)->update([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        return redirect()->back()->with('success', 'Cập nhật quốc gia thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        return redirect()->back()->with('error', 'Xóa quốc gia thành công !');
    }

    public function resorting_country(Request $request)
    {
        $data = $request->all();
        foreach ($data['array_id'] as $key => $value) {
            $category = Country::find($value);
            $category->position = $key;
            $category->save();
        }
    }
}
