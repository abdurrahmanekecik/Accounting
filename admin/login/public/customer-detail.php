<?php include 'header.php'; 

$customer_detail_setting = $db-> prepare("SELECT * FROM customers where customer_id=:id");
$customer_detail_setting -> execute(['id'=> $_GET['customer_id']]);
$customer_detail_take = $customer_detail_setting ->fetch(PDO::FETCH_ASSOC);

?>

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
              <form action="../backend/functions.php" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_detail_take['customer_name'];?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Customer Amount</label>
                    <input type="text" class="form-control" name="customer_balance" value="<?php echo $customer_detail_take['customer_balance'] ?>" >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Customer Despriction</label>
                    <input type="text" name="customer_despriction" class="form-control" value="<?php echo $customer_detail_take['customer_despriction'];?>" placeholder="customer_id">
                  </div>
                  <div class="form-group">
                  <label>Customer Date</label>
                    <div class="input-group date">
                        <input name="customer_date" value="<?php echo $customer_detail_take['customer_date'];?>" type="date" class="form-control" />                        
                    </div>
                   </div>
                  <input type="hidden" name="customer_id" value="<?php echo $customer_detail_take['customer_id']; ?>">           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="customer_detail" class="btn btn-primary">Submit</button>
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
  

  <?php include 'footer.php'; ?>