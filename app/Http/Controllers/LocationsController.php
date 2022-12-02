<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('asdasd');
        $locations =Locations::paginate(8);
       return view('pms.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pms.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate([
            'name' => 'required|min:3',
        ]);
 
        $created_at = Carbon::now();
        $request->merge(['created_at',$created_at]);
        $locations = new Locations();
        $locations->create($request->only($locations->getFillable()));
        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Locations $locations)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Locations $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locations $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Locations::where('id',$id)->delete();

       return back()->with('status','Successfully Deleted');
    }

    public function editing(Request $request)
    {
        // dd($request);
        $locations = Locations::where('id', $request->id)->first();
        return response()->json($locations);
    }
     public function updated(Request $request)
     {
        request()->validate([
            'name' => 'required|min:3',
        ]);
        //  dd($request->id);
        $created_at = Carbon::now();
        $request->merge(['created_at'=> $created_at]);
        $locations = new Locations();
        $locations = $locations->where('id',$request->id)->update($request->only($locations->getFillable()));

        return back();
     }
    
}
