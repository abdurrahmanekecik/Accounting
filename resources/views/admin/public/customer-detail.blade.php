@extends('admin.public.app')
@section('content')

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Customer</a></li>
              <li class="breadcrumb-item active">Customer Detail Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customer Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('customerupdate', $customer->customer_id) }} " method="post">
                <div class="card-body">
                  @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" value=" {{ $customer->customer_name }}" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Customer Balance</label>
                    <input type="text" class="form-control" name="customer_balance" value="{{ $customer->customer_balance }}" >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Customer Despriction</label>
                    <input type="text" name="customer_despriction" class="form-control" value="{{ $customer->customer_despriction }}" >
                  </div>

                    <div class="form-group">
                  <label>Customer Date</label>
                    <div class="input-group date">
                        <input name="customer_date" value="{{ $customer->customer_date }}" type="date" class="form-control" />
                        
                    </div>
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

@endsection
@section('js')
@endsection
@section('css')

