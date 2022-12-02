<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable =['due_amount','installment_no','client_id','due_date','paid','paid_on','paid_on'
                           ,'user_id','property_id','out_stand','cash_cheaque','status'];

    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
}
