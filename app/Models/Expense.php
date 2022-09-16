<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;


class Expense extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "expenses";
    protected $primaryKey = "expense_id";
    protected $fillable = ['customer_id','expense_amount','expense_despriction','expense_date','expense_situation'];

       public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id','customer_id');


    }
}
