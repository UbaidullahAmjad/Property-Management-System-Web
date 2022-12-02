<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;
    
    protected $fillable =['name','active'];

    public function properties()
    {
        return $this->hasMany(Property::class,'location_id','id');
    }
 
}
