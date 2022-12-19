<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $types = Type::latest()->paginate(5);
            return view('type.index', compact('types'))->with(request()->input('page'));
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
            return view('type.create');
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
            Type::create($request->all());
    
            //redirect the user
            return redirect()->route('type.index')->with('success','Created successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        if(Auth::check()){
            return view('type.edit', compact('type'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        if(Auth::check()){
            //validate the input
            $request->validate([
                'name' => 'required',
                'details' => 'required',
            ]);
            $request['updated_by'] = $request->user()->email;;

            //create a new product
            $type->update($request->all());

            //redirect the user
            return redirect()->route('type.index')->with('success','Updated successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if(Auth::check()){
            //delete the product
            $type->delete();
            //redirect the user
            return redirect()->route('type.index')->with('success','Deleted  successfully');
        }else{
            return view('auth.login');
        }
    }
}
