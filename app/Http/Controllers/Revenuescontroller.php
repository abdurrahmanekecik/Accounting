<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenue;
use App\Models\Customer;

class Revenuescontroller extends Controller
{
     public function list(){ 

    $revcustdata = Revenue::all();
    return view('admin.public.revenues', ['revcust' => $revcustdata ]);


}




public function index(){ 

     $customerdata = Customer::all();

   return view('admin.public.revenues-add', ['data' => $customerdata ]);

   
}




 public function edit($id) {

    $customerdata = Customer::all();
    $revenuedata = Revenue::where("revenues_id",$id)->first();

    return view('admin.public.revenues-detail', ['revenue' => $revenuedata ], ['data' => $customerdata ]);

    }



 
public function create(Request $request)
    {

      $customer_id=$request->customer_id;
      $revenues_amount=$request->revenues_amount;
      $revenues_despriction=$request->revenues_despriction;
      $revenues_date=$request->revenues_date;
      $revenues_situation=$request->revenues_situation;

      Revenue::create([

      "customer_id" => $customer_id,
      "revenues_amount" => $revenues_amount,
      "revenues_despriction" => $revenues_despriction,
      "revenues_date" => $revenues_date,
      "revenues_situation" => $revenues_situation]);

         return redirect('/revenues');

 }
 

 public function update($id,Request $request) {

    $revenuesdata= Revenue::where("revenues_id",$id)->first();
    $revenuesdata->customer_id = $request->customer_id;
    $revenuesdata->revenues_amount = $request->revenues_amount;
    $revenuesdata->revenues_despriction = $request->revenues_despriction;
    $revenuesdata->revenues_date = $request->revenues_date;
    $revenuesdata->revenues_situation = $request->revenues_situation;
    $revenuesdata->save();
    $revcustdata = Revenue::all();
    return view('admin.public.revenues', ['revcust' => $revcustdata ]);

    }





 public function delete(Revenue $revenues, $id){ 

    $revenue = Revenue::find($id);
    $revenue->delete();        
    return redirect('/revenues');

 }
 










}
