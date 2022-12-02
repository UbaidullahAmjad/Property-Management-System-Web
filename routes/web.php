<?php

use App\Http\Controllers\LocationsController;
use App\Http\Controllers\NatureController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\PlotSaleController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(!auth()->user()){
        return redirect()->route('login');
    }
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']],function()
	{
//Location
Route::resource('location', LocationsController::class);
Route::post('location/editing',[LocationsController::class,'editing'])->name('location.editing');
Route::post('location/updated',[LocationsController::class,'updated'])->name('location.updated');

//nature
Route::resource('nature', NatureController::class);
Route::post('nature/editing',[NatureController::class,'editing'])->name('nature.editing');
Route::post('nature/updated',[NatureController::class,'updated'])->name('nature.updated');

//user/client
Route::resource('user', UserController::class);
Route::post('user/editing',[UserController::class,'editing'])->name('user.editing');
Route::post('user/updated',[UserController::class,'updated'])->name('user.updated');


//property
Route::resource('property', PropertyController::class);
Route::get('property-sale/{id}',[PropertyController::class,'propertySale'])->name('property.sale');

///for plot invoice
// Route::get('plot-sale/{id}',[PlotController::class,'plotSale'])->name('plot.sale');
// Route::get('plot-invoice/{id}',[PlotController::class,'invoiceView'])->name('plot.view');

//sale plot
Route::resource('plot-sale', PlotSaleController::class);
Route::post('plot-sale/{id}',[PlotSaleController::class,'store'])->name('plot-sale.store');
// Route::get('plotsale',[PlotSaleController::class,'indexPlot'])->name('plotsale.index');

//sale
Route::resource('sale', SaleController::class);
Route::post('sale/{id}',[SaleController::class,'store'])->name('sale.store');
Route::get('sale',[SaleController::class,'index'])->name('sale.index');
Route::post('sale/editing',[SaleController::class,'editing'])->name('sale.editing');

//installment
Route::get('installment/{id}',[InstallmentController::class,'index'])->name('installment.index');
Route::post('installment/store/{id}',[InstallmentController::class,'store'])->name('installment.store');

//Property Type
Route::resource('property-type', TypeController::class);

//plot
  Route::resource('plot', PlotController::class);

    });




//invoice data

Route::group(['namespace' => 'Invoice'], function() {
    Route::get('/invoice',[InvoiceController::class,'viewInvoice']);
    Route::get('/plotinvoice',[InvoiceController::class,'plotInvoice']);

    Route::get('/invoice',[InvoiceController::class,'']);

    // Route::get('invoice/create/{id}',[InvoiceController::class,'viewInvoice']);
    Route::get('create/{id}',[InvoiceController::class,'invoiceData'])->name('invoice.create');
    Route::get('plot_invoice/{id}',[InvoiceController::class,'invoicePlot'])->name('invoice.plot_invoice');
  
   });

      
    // Route::group(['namespace' => 'property_type'], function() {

//         Route::get('/type',[TypeController::class,'index'])->name('type.index');
      
//     Route::get('/property-type/create',[TypeController::class,'create']);
//    // add data
//     Route::post('/property-type/store',[TypeController::class,'store'])->name('type.store');
//    //display data

//     //edit data
//     Route::get('property-type/{id}/ed',[TypeController::class,'editType']);
//     //update data
//     Route::post('/updateType',[TypeController::class,'updateType'])->name('type.update');
//     //delete post
//     Route:: get('delete-type/{id}',[TypeController::class,'deleteType']); 
//    });

   //plots data
//     Route::group(['namespace' => 'plots'], function() {

//     Route::get('property_plot',[PlotController::class,'plotCreate']);
//    // add data
//     Route::post('/add-plot',[PlotController::class,'storePlot'])->name('plot.store');
//    //display data
//    Route::get('plot/{id}',[PlotController::class,'storePlot'])->name('plot.index');

//     Route::get('/allplots',[PlotController::class,'allplots']);
//     //edit data
//     Route::get('editPlot/{id}',[PlotController::class,'editPlot']);
//     //update data
//     Route::post('/updatePlot',[PlotController::class,'updatePlot'])->name('plot.update');
//     //delete post
//     Route:: get('delete-plot/{id}',[PlotController::class,'deletePlot']); 
//    });

require __DIR__.'/auth.php';



Route::get('admin/123',function(){
         
   User::insert([
    'name' => 'CplusSoft',
    'email' => 'Cplusoft@gmail.com',
    'password' => bcrypt('123456789'),
    'type'   => 'admin',
     'cnic' => '6823423483',
     'phone' => '2347928734',
   ]);

   return back();

});
