@extends('admin.public.app')
@section('content')



 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expenses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12"><br>
            <a href="expense-add"><button class="btn btn-primary ">Expense Add</button> </a><br><br>

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Expenses Are Also Listed Below</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>İd</th>
                    <th>Customer Name</th>
                    <th>Amount</th>
                    <th>Despriction</th>
                    <th>Date</th>
                    <th>Customer Balance</th>
                    <th>Situation</th>
                     <th>Edit</th>
                    <th>Delete</th>
                   
                  </tr>
                  </thead>
                  <tbody>


                @foreach ($expcust as $expensesdata)
                  <tr>
                    <td>{{ $expensesdata->expense_id}}</td>
                    <td>{{ $expensesdata->customer->customer_name ?? "Not Found" }}</td>
                    <td>{{ $expensesdata->expense_amount}}</td>
                    <td>{{ $expensesdata->expense_despriction}}TL</td>
                    <td>{{ $expensesdata->expense_date}}</td>
                    <td>{{ $expensesdata->customer->customer_balance ?? "Not Found"}}</td>
                    
                   
                   
                    @if ($expensesdata->expense_situation == 1)
                     <td><button class="btn-success btn">Aktif </button></td>

                     @else

                    <td> <button class="btn btn-warning">Pasif </button> </td>

                     @endif

                    <td><a href="{{ route('expensedetail', $expensesdata->expense_id)}}"><button class="btn btn-primary" >Edit</button></a></td>
                     <td><a href="{{ route('expensedelete', $expensesdata->expense_id)}}"><button class="btn btn-danger">Delete</button></a></td>
                  
                  </tr>


@endforeach




                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>







@endsection
@section('js')
@endsection
@section('css')
