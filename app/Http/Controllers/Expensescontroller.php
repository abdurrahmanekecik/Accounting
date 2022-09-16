<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Customer;


class Expensescontroller extends Controller
{
    public function list()


    {

        $expcustdata = Expense::all();


        return view('admin.public.expenses', ['expcust' => $expcustdata]);


    }

 public function show(){

    return view('admin.public.expense-add');


}


public function index(){

   $customerdata = Customer::all();

   return view('admin.public.expense-add', ['data' => $customerdata ]);


}






public function create(Request $request){



      $customer_id=$request->customer_id;
      $expense_amount=$request->expense_amount;
      $expense_despriction=$request->expense_despriction;
      $expense_date=$request->expense_date;
      $expense_situation=$request->expense_situation;

      Expense::create([

      "customer_id" => $customer_id,
      "expense_amount" => $expense_amount,
      "expense_despriction" => $expense_despriction,
      "expense_date" => $expense_date,
      "expense_situation" => $expense_situation]);

         return redirect('/expenses');







}












 public function edit($id) {

    $customerdata = Customer::all();
    $expensesdata = Expense::where("expense_id",$id)->first();

    return view('admin.public.expense-detail', ['expenses' => $expensesdata ], ['data' => $customerdata ]);

    }



 public function update($id,Request $request) {

    $expensesdata= Expense::where("expense_id",$id)->first();
    $expensesdata->customer_id = $request->customer_id;
    $expensesdata->expense_amount = $request->expense_amount;
    $expensesdata->expense_despriction = $request->expense_despriction;
    $expensesdata->expense_date = $request->expense_date;
    $expensesdata->expense_situation = $request->expense_situation;
    $expensesdata->save();
    $expcustdata = Expense::all();
    return view('admin.public.expenses', ['expcust' => $expcustdata ]);

    }










public function delete(Expense $revenues, $id){

      $expense = Expense::find($id);
    $expense->delete();
    return redirect('/expenses');

}








}
