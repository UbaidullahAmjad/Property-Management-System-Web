<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotSale extends Model
{
    use HasFactory;
    protected $table = 'plotsales';
    protected $fillable = ['sector_no','plot_no','size_no','category','price','phase_no','plot_id'];

    public function plot()
{
    return $this->belongsTo(Plot::class,'plot_id','id');
}
 
}
