<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;
    protected $fillable = [
        'sector_no',
        'plot_no',
        'street_no',
        'size_no',
        'category',
        'price',
        'client_id',
        'phase_no',
        'status',
    ];
    public function plot_sale()
    {
    return $this->belongsTo(PlotSale::class,'plot_id','id');
    }

}
