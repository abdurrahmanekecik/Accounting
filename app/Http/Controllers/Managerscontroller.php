<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class Managerscontroller extends Controller
{
    public function list(){ 


    $managersdata=Manager::all();

    return view('admin.public.managers',  ['managers' => $managersdata ]);
}



  public function add(){ 

    return view('admin.public.manager-add');
}











}