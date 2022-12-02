<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Property extends Model
{
    use HasFactory;
    protected $fillable =['nature_id','property_type','size_of_property','appartment_no','price','location_id','created_at'];
   
    public function natures()
    {
        return $this->belongsTo(Nature::class,'nature_id','id');
    }
 
    public function locations()
    {
        return $this->belongsTo(Locations::class,'location_id','id');
    }

    public function sales()
    {
        return $this->belongsTo(Sale::class,'property_id','id');
    }
    public function installment()
    {
        return $this->hasMany(Installment::class,'property_id','id');
    }
 
}
