<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $manufacturers = Manufacturer::latest()->paginate(5);
            return view('manufacturer.index', compact('manufacturers'))->with(request()->input('page'));
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
            return view('manufacturer.create');
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
            $request['created_by'] = 'user';
            $request['updated_by'] = '';

            //create a new product
            Manufacturer::create($request->all());

            //redirect the user
            return redirect()->route('manufacturer.index')->with('success','Created successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        if(Auth::check()){
            return view('manufacturer.edit', compact('manufacturer'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        if(Auth::check()){
            //validate the input
            $request->validate([
                'name' => 'required',
                'details' => 'required',
            ]);
            $request['updated_by'] = $request->user()->email;;

            //create a new product
            $manufacturer->update($request->all());

            //redirect the user
            return redirect()->route('manufacturer.index')->with('success','Updated successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        if(Auth::check()){
            //delete the product
            $manufacturer->delete();
            //redirect the user
            return redirect()->route('manufacturer.index')->with('success','Deleted  successfully');
        }else{
            return view('auth.login');
        }
    }
}
