<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Revenue;
use App\Models\Customer;
use App\Models\Expense;


class HomeController extends Controller
{

     public function login()
    {
        return view('admin.login');
    }
    
  



    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }













public function index() {


$revenuesum = Revenue::sum('revenues_amount');
$expensesum = Expense::sum('expense_amount');
$customercount = DB::table('customers')->count();
$profitloss= $revenuesum - $expensesum;


return view('admin.public.index', ['revenue' => $revenuesum ], ['expense' => $expensesum ], ['customer' => $customercount ],
    ['profitloss' => $profitloss ] );


}
}
