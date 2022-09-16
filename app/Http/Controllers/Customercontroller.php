<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\Customer;



class Customercontroller extends Controller
{


    public function index()
    {


   $customerdata = Customer::all();

   return view('admin.public.customers', ['data' => $customerdata ]);

    }


 public function show(){

    return view('admin.public.customer-add');
}


public function create(Request $request)
    {

      $customer_name=$request->customer_name;
      $customer_balance=$request->customer_balance;
      $customer_despriction=$request->customer_despriction;
      $customer_date=$request->customer_date;

      Customer::create([

      "customer_name" => $customer_name,
      "customer_balance" => $customer_balance,
      "customer_despriction" => $customer_despriction,
      "customer_date" => $customer_date]);

         return redirect('/customers');

 }







 public function delete(Customer $customers, $id){

    $customer = Customer::find($id);
    $customer->delete();
    return redirect('/customers');

 }










 public function edit($id) {

    $customerdata= Customer::where("customer_id",$id)->first();
    return view('admin.public.customer-detail', ['customer' => $customerdata ]);

    }




     public function update($id,Request $request) {

    $customerdata= Customer::where("customer_id",$id)->first();
    $customerdata->customer_name = $request->customer_name;
    $customerdata->customer_balance = $request->customer_balance;
    $customerdata->customer_despriction = $request->customer_despriction;
    $customerdata->customer_date = $request->customer_date;
    $customerdata->save();
    return view('admin.public.customer-detail', ['customer' => $customerdata ]);

    }







}
