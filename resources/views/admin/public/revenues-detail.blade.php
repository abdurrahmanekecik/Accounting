@extends('admin.public.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Revenues Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Revenues</a></li>
              <li class="breadcrumb-item active">Revenues Detail Edit</li>
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
                <h3 class="card-title">Revenues Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('revenuesupdate', $revenue->revenues_id) }}" method="post">
                <div class="card-body">
                  <div class="form-group">

                      @csrf

              <select id="heard" class="form-control" name="customer_id" required>
                   @foreach ($data as $customerdata)
                  <option value="{{ $customerdata->customer_id }}" >{{ $customerdata->customer_name }}</option>
                  @endforeach

              </select>



              <input type="hidden" name="revenues_id" value="{{ $revenue->revenues_id }}"> 






                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Revenues Amount</label>
                    <input type="text" class="form-control" name="revenues_amount" value="{{ $revenue->revenues_amount }}" placeholder="revenues_id">
                  </div>




                   <div class="form-group">
                    <label for="exampleInputPassword1">Revenues Despriction</label>
                    <input type="text" name="revenues_despriction" class="form-control" value="{{ $revenue->revenues_amount }}" placeholder="revenues_id">
                  </div>


                





                  <div class="form-group">
                  <label>Revenues Date</label>
                    <div class="input-group date">
                        <input name="revenues_date" value="{{ $revenue->revenues_date }}" type="date" class="form-control" />
                        
                    </div>
                   </div>


                   <div class="form-group">
                    <label for="exampleInputPassword1">Revenues Situation</label>
                   <select id="heard" class="form-control" name="revenues_situation" required>
                  <option value="1" >Active</option>
                  <option value="0" >Passive</option>
                  
              </select>
               </div>




                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  class="btn btn-primary">Submit</button>
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