<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table="customers"; 

    protected $primaryKey = "customer_id";

    protected $fillable = ['customer_name','customer_balance','customer_despriction','customer_date'];


  public function expenses(){
        return $this->hasMany(Expense::class,'customer_id','customer_id');
    }

  public function customers(){
        return $this->hasMany(Customer::class,'customer_id','customer_id');
    }

     
  
        
}
