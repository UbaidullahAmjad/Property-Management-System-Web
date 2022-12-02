<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['total_amount','client_id','user_id','property_id','down_payment','arrear','no_of_installment','installment_amount','cash_cheaque','gap_in_installment'];

    public function property()
{
    return $this->belongsTo(Property::class,'property_id','id');
}
  public function users()
  {
      return $this->belongsTo(User::class,'user_id','id');
  }

}

