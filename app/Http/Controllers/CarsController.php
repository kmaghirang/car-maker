<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            // $cars = Cars::latest()->paginate(5);
            $cars = Cars::join('manufacturers', 'cars.manufacturer', 'manufacturers.id')
                    ->join('types', 'cars.type', 'types.id')
                    ->join('colors', 'cars.color', 'colors.id')
                    ->select(
                        'cars.id as id',
                        'cars.name as name',
                        'cars.details as details',
                        'cars.created_by as created_by',
                        'colors.name as color',
                        'manufacturers.name as manufacturer',
                        'types.name as cartype',
                    )
                    ->paginate(5);
            return view('cars.index', compact('cars'))->with(request()->input('page'));
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
            $manufacturers = Manufacturer::get();
            $colors = Color::get();
            $types = Type::get();
            // dd($manufacturers);
            return view('cars.create',compact(['manufacturers','colors','types']));
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
                'type' => 'required',
                'manufacturer' => 'required',
                'color' => 'required'
            ]);
            $request['created_by'] = $request->user()->email;
            $request['updated_by'] = '';

            //create a new product
            Cars::create($request->all());

            //redirect the user
            return redirect()->route('cars.index')->with('success','Created successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(Cars $car)
    {
        if(Auth::check()){
            $manufacturers = Manufacturer::get();
            $colors = Color::get();
            $types = Type::get();
            return view('cars.edit', compact(['car','manufacturers','colors','types']));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cars $car)
    {
        if(Auth::check()){
            //validate the input
            $request->validate([
                'name' => 'required',
                'details' => 'required',
                'type' => 'required',
                'manufacturer' => 'required',
                'color' => 'required'
            ]);
            $request['updated_by'] = $request->user()->email;;

            //create a new product
            $car->update($request->all());

            //redirect the user
            return redirect()->route('cars.index')->with('success','Updated successfully');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $car)
    {
        if(Auth::check()){
            //delete the product
            $car->delete();
            //redirect the user
            return redirect()->route('cars.index')->with('success','Deleted  successfully');
        }else{
            return view('auth.login');
        }
    }
}
