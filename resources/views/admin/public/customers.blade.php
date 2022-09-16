@extends('admin.public.app')
@section('tittle', 'Customers')
@section('content')





 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">
            <a href="customer-add"><button class="btn btn-primary "> Customer Add</button> </a><br><br>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers Are Also Listed Below</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>İd</th>
                    <th>Name</th>
                    <th>Despriction</th>
                    <th>Balance</th>
                   
                  </tr>
                  </thead>
                  <tbody>


                 
 
             
                  @foreach ($data as $customerdata)
                  <tr>
                
                    <td>{{ $customerdata->customer_id }}</td>
                    <td>{{ $customerdata->customer_name }}</td>
                    <td>{{ $customerdata->customer_despriction }}</td>
                    <td>{{ $customerdata->customer_balance }}TL</td>
                    <td><a href="{{ route('customerdetail', $customerdata->customer_id)}}"><button class="btn btn-primary" >Edit</button></a></td>
                    <td><a href="{{ route('customerdelete', $customerdata->customer_id)}}"><button class="btn btn-danger">Delete</button></a></td>
               
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

@endsection
