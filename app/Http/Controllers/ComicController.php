<?php

namespace App\Http\Controllers;

use App\comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = comic::paginate(8);
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:5|required',
            'series' => 'min:5|required',
            'thumb' => 'required|url',
            'price' => 'required|numeric|min:0',
            'sale_date' => 'date',
            'type' => 'min:5|required',
            'description' => 'min:50'
        ]);
       $formData = $request->all();
       $comic = comic::create($formData);

       // return redirect()->route('houses.index');
       return redirect()->route('comics.show', compact('comic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(comic $comic)
    {
        return view('details', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(comic $comic)
    {
        return view('edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comic $comic)
    {
        $request->validate([
            'title' => 'min:5|required',
            'series' => 'min:5|required',
            'thumb' => 'required|url',
            'price' => 'required|numeric|min:0',
            'sale_date' => 'date',
            'type' => 'min:5|required',
            'description' => 'min:50'
        ]);
        $data = $request->all();
        $comic->update($data);
        return redirect()->route('comics.show', compact('comic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
