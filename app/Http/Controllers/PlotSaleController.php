<?php

namespace App\Http\Controllers;
use App\Models\Plot;
use App\Models\PlotSale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlotSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plotsales = PlotSale::all();
        return view('pms.sale_plot.view',compact('plotsales'));
    }
    public function store(Request $request,$id)
    {
        // dd($request);
        $created_at = Carbon::now();
        $request->merge(['created_at' => $created_at]);
        $plot = Plot::find($id);
        $plot->client_id = $request->client;
        $plot->save();

        $plotSale = new PlotSale();
        $plotSale->create($request->only($plotSale->getFillable()));

        return redirect()->route('plot.index');
    }
}
