<?php

namespace App\Http\Controllers;

use App\Models\Nature;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nature = Nature::paginate(8);

        return view('pms.nature.index',compact('nature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pms.nature.create');
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
            'type' => 'required|min:3',
        ]);
        $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);
        $nature = new Nature();
        $nature->insert($request->only($nature->getFillable()));
        return redirect()->route('nature.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nature  $nature
     * @return \Illuminate\Http\Response
     */
    public function show(Nature $nature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nature  $nature
     * @return \Illuminate\Http\Response
     */
    public function edit(Nature $nature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nature  $nature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nature $nature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nature  $nature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Nature::find($id)->delete();
        return back()->with('status','Successfully Deleted');
    }

    public function editing(Request $request)
    {
        // dd($request);
        
        $nature = Nature::where('id', $request->id)->first();
        return response()->json($nature);
    }
     public function updated(Request $request)
     {
        //  dd($request);
        request()->validate([
            'type' => 'required|min:3',
        ]);
        $created_at = Carbon::now();
        $request->merge(['created_at'=> $created_at]);
        $nature = new Nature();
        $nature = $nature->where('id',$request->id)->update($request->only($nature->getFillable()));

        return back();
     }
}
