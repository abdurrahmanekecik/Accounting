@extends('admin.public.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>manager Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">manager </a></li>
              <li class="breadcrumb-item active">manager Detail Edit</li>
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
                <h3 class="card-title">manager Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../backend/functions.php" method="post">
                <div class="card-body">



                	<div class="form-group">
                    <label for="exampleInputPassword1">manager Name</label>
                    <input type="text" class="form-control" name="manager_name" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">manager Surname</label>
                    <input type="text" class="form-control" name="manager_surname" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">manager Password</label>
                    <input type="password" class="form-control" name="manager_password" >
                  </div>

                   
                    <input type="hidden" value="3" class="form-control" name="manager_authority" >
                    <input type="hidden" value="" class="form-control" name="manager_last_login" >
                 
               
               
                  



                  <div class="form-group">
                  <label>manager Date</label>
                    <div class="input-group date">
                        <input name="manager_time"  type="date" class="form-control" />
                        
                    </div>
                   </div>


   

                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="manager_add" class="btn btn-primary">Submit</button>
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
