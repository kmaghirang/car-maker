<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $colors = Color::latest()->paginate(5);
            return view('color.index', compact('colors'))->with(request()->input('page'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('color.create');
        }else{
            return view('auth.login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            //validate the input
            $request->validate([
                'name' => 'required',
                'details' => 'required',
            ]);
            $request['created_by'] = $request->user()->email;
            $request['updated_by'] = '';

            //create a new product
            Color::create($request->all());

            //redirect the user
            return redirect()->route('color.index')->with('success','Created successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        if(Auth::check()){
            return view('color.edit', compact('color'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        if(Auth::check()){
            //validate the input
            $request->validate([
                'name' => 'required',
                'details' => 'required',
            ]);
            $request['updated_by'] = $request->user()->email;;

            //create a new product
            $color->update($request->all());

            //redirect the user
            return redirect()->route('color.index')->with('success','Updated successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if(Auth::check()){
            //delete the product
            $color->delete();
            //redirect the user
            return redirect()->route('color.index')->with('success','Deleted  successfully');
        }else{
            return view('auth.login');
        }
    }
}
