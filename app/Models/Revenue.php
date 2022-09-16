<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;


class Revenue extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $table = "revenues";
     protected $primaryKey = "revenues_id";
     protected $fillable = ['customer_id','revenues_amount','revenues_despriction','revenues_date','revenues_situation'];



       public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id','customer_id');


    }
}
