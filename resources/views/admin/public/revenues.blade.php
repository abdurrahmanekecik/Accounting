@extends('admin.public.app')
@section('content') 



 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Revenues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Revenues</li>
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
            <a href="revenues-add"><button class="btn btn-primary "> Revenues Add</button> </a><br><br>

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Revenuess Are Also Listed Below</h3>
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


                 



                   @foreach ($revcust as $revenuesdata)
                  <tr>
                    <td>{{ $revenuesdata->revenues_id }}</td>
                    <td>{{ $revenuesdata->customer->customer_name ?? "Not Found" }}</td>
                    <td>{{ $revenuesdata->revenues_amount }}</td>
                    <td>{{ $revenuesdata->revenues_despriction }}</td>
                    <td>{{ $revenuesdata->revenues_date }}</td>
                    <td>{{ $revenuesdata->customer->customer_balance ?? "Not Found" }}</td>
                  @if ($revenuesdata->revenues_situation == 1)
                    <td> 
                      <button class="btn-success btn">Active </button></td>
                  @else
                    <td><button class="btn btn-warning">Passive </button>  </td>
                    @endif
                    <td><a href="{{ route('revenuesdetail', $revenuesdata->revenues_id)}}"><button class="btn btn-primary" >Edit</button></a></td>
                    <td><a href="{{ route('revenuesdelete', $revenuesdata->revenues_id)}}"><button class="btn btn-danger">Delete</button></a></td>
                  
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





