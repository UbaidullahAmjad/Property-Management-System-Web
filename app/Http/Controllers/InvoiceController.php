<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;
use App\Models\Property;
use App\Models\Locations;
use App\Models\Installment;
use App\Models\Plot;

class InvoiceController extends Controller
{
    public function invoiceData($id){
       $total =0;
       $installment= Installment::find($id);
       // dd($installment);
       $installmentpaids= Installment::where('property_id',$installment->property_id)->get();
      
       $downpay= Sale::where('property_id',$installment->property_id)->first();
       // dd($downpay);

       foreach($installmentpaids as $installmentpaid)
      
        $tota = $total+$installmentpaid->paid;
        $total = $tota + $downpay->down_payment;
            // dd($total);
        $property= Property::find($installment->property_id); 
            // dd($property);
        $locations= Locations::find($property->location_id);
            // dd($locations);
        $user= User::find($installment->user_id); 
        $client= User::find($installment->client_id); 

    return view('invoice.create',compact('user','total','downpay','property','locations','installment','client'));
}


public function viewInvoice(){
    return view("invoice.create");
}


public function invoicePlot($id){

    $plot = Plot::find($id);
    // $user = User::where('type','client')->get();
    $client= User::find($plot->client_id);

    return view('invoice.plot_invoice',compact('plot','client'));
}

public function plotInvoice(){
    return view("invoice.plot_invoice");
}
}
