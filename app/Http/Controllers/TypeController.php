<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TypeController extends Controller
{


  public function index()
  {
    $types = Type::all();
    return view('pms.property_type.index', compact('types'));
  }

  public function create()
  {
    return view('pms.property_type.create');
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
    ]);

       
    $type = new Type();
    $types = $type->create($request->only($type->getFillable()));


    return redirect()->route('property-type.index')->with('status','Property Type added succesfully');
  }
 
  public function edit($id)
  {
    $type = Type::find($id);
    return view('pms.property_type.editData', compact('type'));
  }
 
  public function update(Request $request)
  {

    $created_at = Carbon::now();
    $request->merge(['created_at'=> $created_at]);
    $type = new Type();
   $type->where('id',$request->id)->update($request->only($type->getFillable()));

    return redirect()->route('property-type.index')->with('update','Property Type Update succesfully');

  }
  
  public function destroy($id)
  {
    $type = Type::find($id)->delete();
    return back()->with('type_deleted', 'Type deleted successfully');
  }
}
