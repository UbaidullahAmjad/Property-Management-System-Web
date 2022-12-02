<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\User;

class PlotController extends Controller
{

    public function index()
    {
        $plots = Plot::all();
        return view('pms.plot.index', compact('plots'))->with('no', 1);
    }

    public function create()
    {
        return view('pms.plot.create');
    }
    public function store(Request $request)
    {
        $request->validate([

            'sector_no' => 'required',
            'plot_no' => 'required',
            'street_no' => 'required',
            'category' => 'required',
            'price' => 'required',
            'phase_no' => 'required',
            'phase_no' => 'required',
            'status' => 'required',

        ]);

        $plot = new Plot();
        $plot->create($request->only($plot->getFillable()));
        return redirect()->route('plot.index')->with('plot-added', 'Plot added succesfully');
    }
    public function show($id)
    {
        $plot = Plot::findOrFail($id);
        $users = User::where('type', 'client')->get();
        return view('pms.sale_plot.index', compact('plot', 'users'));
    }

    public function edit($id)
    {
        $plot = Plot::find($id);
        return view('pms.plot.editPlot', compact('plot'));
    }

    public function update(Request $request)
    {

        $plot = new Plot();
        $plot->where('id',$request->id)->update($request->only($plot->getFillable()));
        return redirect()->route('plot.index')->with('plot-updated', 'Plot updated succesfully');
      
    }

    public function destroy($id)
    {
        $plot = Plot::find($id)->delete();
       
        return back()->with('plot_deleted', 'Plot deleted successfully');
    }
}
