<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nature extends Model
{
    use HasFactory;

    protected $fillable=['type','created_at'];
    
    public function properties()
    {
        return $this->hasMany(Property::class,'nature_id','id');
    }
 
}
