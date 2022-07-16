<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('logged-in')){
            dd('no access allowed');
        }

        if(Gate::allows('is-admin')){
            return view('admin.categories.index', ['categories' => Category::paginate(10)]);
        }

        dd('you need to be admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg',

           ]);

        $request->file('icon')->store('public/category_icons');

        $path = "/storage/category_icons/" . $request->icon->hashName();

        $category = Category::create(array_merge($request->except('icon'), [
            'icon' => $path
        ]));

        $request->session()->flash('success', 'Uspješno ste kreirali novu kategoriju');

        return redirect(route('admin.categories.index'));
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
        return view('admin.categories.edit', ['category' => Category::find($id)]);
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
        $category = Category::find($id);

        if(!$category) {
            $request->session()->flash('error', 'Ne možete urediti podatke ove kategorije');
            return redirect(route('admin.categories.index'));
        }

        if($request->hasFile('icon')){
            unlink(public_path(). '/'. $category->icon);
            $request->file('icon')->store('public/category_icons');
            $path = "/storage/category_icons/" . $request->icon->hashName();
            $category->icon = $path;
        }

        $category->update($request->except(['_token', 'icon']));

        $request->session()->flash('success', 'Uspješno ste uredili podatke o kategoriji');

        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        unlink(public_path(). '/'. Category::find($id)->icon);

        Category::destroy($id);

        $request->session()->flash('success', 'Uspješno ste obrisali događaj');

        return redirect(route('admin.categories.index'));
    }
}
