<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use App\Models\Nature;
use App\Models\User;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property =Property::with('locations')->get();
      
        return view('pms.property.index',compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $natures = Nature::all();
        $locations = Locations::where('active',1)->get();
       

        return view('pms.property.create',compact('locations','natures'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        request()->validate([
            'property_type' => 'required',
            'size_of_property' => 'required|min:3',
            'appartment_no' => 'required',
            'price' => 'required',
        ]);
        $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);
        $property = new Property();
        $property->nature_id=$request->nature;
        $property->property_type =$request->property_type;
        $property->size_of_property = $request->size_of_property;
        $property->appartment_no = $request->appartment_no;
        $property->price= $request->price;
        $property->location_id= $request->location;
        $property->save();
        return redirect()->route('property.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $locations = Locations::all();
        $natures = Nature::all();
        return view('pms.property.edit',compact('property','locations','natures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'property_type' => 'required',
            'size_of_property' => 'required',
            'appartment_no' => 'required',
            'price' => 'required',
        ]);
        $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);
        $property =  Property::where('id',$id)->first();
        $property->nature_id=$request->nature;
        $property->property_type =$request->property_type;
        $property->size_of_property = $request->size_of_property;
        $property->appartment_no = $request->appartment_no;
        $property->price= $request->price;
        $property->location_id= $request->location;
        $property->update();
        return redirect()->route('property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::where('id',$id)->delete();
        return back()->with('status','Succesfully Deleted');
    }

    public function propertySale($id)
    {
        $property =Property::findOrFail($id);
        $users = User::where('type','client')->get();
        return view('pms.sales.index',compact('property','users'));
    }

 
}
