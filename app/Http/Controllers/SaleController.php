<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate(8);
        return view('pms.sales.view',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
       
        $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);
        $property = Property::find($id);
        $property->status = 1;
        
        $property->save(); 
        
    
        if ($request->cash_cheaque == 'cheaque') {
             
            $cheaque = ($request->cash_cheaque.'/'.$request->cheaque);
            $request->merge(['cash_cheaque'=> $cheaque]);
            Sale::create($request->all());
           
        }
        else {
           
            Sale::create($request->all());
        }
  
        
        return  redirect()->route('property.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $sale = Sale::where('id',$id)->first();
        // $property = Property::all();

        // return view('pms.sales.edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Sale::where('id',$id)->delete();
       return back();
    }
    
}
