<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminEventController extends Controller
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
            return view('admin.events.index', [
                'events' => Event::paginate(10),
                'categories' => Category::all(),
                'organizers' => User::all(),
                'locations' => Location::all()
            ]);
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
        return view('admin.events.create',
        [
            'categories' => Category::all(),
            'organizers' => User::all(),
            'locations' => Location::all()
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
        $event =  Event::create($request->all());

        $event->categories()->sync($request->categories);

        $request->session()->flash('success', 'Uspješno ste kreirali novi događaj');

        return redirect(route('admin.events.index'));
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
        return view('admin.events.edit',
        [
            'categories' => Category::all(),
            'organizers' => User::all(),
            'locations' => Location::all(),
            'event' => Event::find($id)
        ]);
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
        $event = Event::find($id);

        if(!$event) {
            $request->session()->flash('error', 'Ne možete urediti podatke ovog događaja');
            return redirect(route('admin.events.index'));
        }

        $event->update($request->except(['_token', 'categories']));
        $event->categories()->sync($request->categories);

        $request->session()->flash('success', 'Uspješno ste uredili podatke o događaju');

        return redirect(route('admin.events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Event::destroy($id);

        $request->session()->flash('success', 'Uspješno ste obrisali događaj');

        return redirect(route('admin.events.index'));
    }
}
