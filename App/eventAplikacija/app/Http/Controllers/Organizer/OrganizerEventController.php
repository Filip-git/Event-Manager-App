<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;
use App\Models\Location;
use App\Models\Category;

class OrganizerEventController extends Controller
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

        if(Gate::allows('is-organizer')){
            return view('organizer.events.index',
            [
                'events' => Event::orderBy('created_at', 'DESC')->get(),
                'categories' => Category::all()
            ]);
        }

        dd('you need to be organizer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parameters = [
            'events' => Event::all(),
            'locations' => Location::all(),
            'categories' => Category::all(),
            ];
        return view('organizer.events.create')->with($parameters);
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',

           ]);

        $request->file('image')->store('public/event_images');

        $path = "/storage/event_images/" . $request->image->hashName();

        $event = Event::create(array_merge($request->except('image'), [
            'organizer_id' =>  auth()->user()->id,
            'image' => $path
        ]));

        $event->categories()->sync($request->categories);

        $request->session()->flash('success', 'Uspješno ste kreirali novi događaj.');

        return redirect(route('organizer.events.index'));
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
        return view('organizer.events.edit',
        [
            'event' => Event::find($id),
            'locations' => Location::all(),
            'categories' => Category::all(),
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
            $request->session()->flash('error', 'Ne možete urediti podatke o ovom događaju.');
            return redirect(route('organizer.events.index'));
        }

        if($request->hasFile('image')){
            unlink(public_path(). '/'. $event->image);
            $request->file('image')->store('public/event_images');
            $path = "/storage/event_images/" . $request->image->hashName();
            $event->image = $path;
        }

        $event->update($request->except(['_token', 'categories', 'image']));

        $event->categories()->sync($request->categories);

        $request->session()->flash('success', 'Uspješno ste uredili podatke o događaju.');

        return redirect(route('organizer.events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        unlink(public_path(). '/'. Event::find($id)->image);

        Event::destroy($id);

        $request->session()->flash('success', 'Uspješno ste obrisali događaj.');

        return redirect(route('organizer.events.index'));
    }
}
