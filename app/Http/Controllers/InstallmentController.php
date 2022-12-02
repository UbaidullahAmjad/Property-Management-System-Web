<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\Property;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $property = Property::where('id',$id)->first();
        $sale = Sale::where('property_id',$id)->first();
        // $downpayment = Sale::where('property_id',$id)->first();
        $installments = Installment::where('property_id',$id)->get();
        $installmentsTotall = Installment::where('property_id',$id)->get()->sum('due_amount');
    //    dd($installmentsTotall);
          $dates = array();
          $startdate = Carbon::parse($sale->created_at);

          for($i=0; $i<=$sale->no_of_installment;$i++){
             $dates[]= $startdate->addMonth($sale->gap_in_installment)->toDateString();

          }     
        //    dd($dates);
        return view('pms.installment.index',compact('property','sale','installments','installmentsTotall','dates'));
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
    public function store(Request $request)
    {
        // dd($request);
        $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);

        if ($request->cash_cheaque == 'cheaque') {
           

            $cheaque = ($request->cash_cheaque.'/'.$request->cheaque);
            $request->merge(['cash_cheaque'=> $cheaque]);
            Installment::create($request->all());
           
        }
        else {
           
            Installment::create($request->all());
           
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function show(Installment $installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Installment $installment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installment $installment)
    {
        //
    }
}
