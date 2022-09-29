<?php include'header.php'; ?>

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
            <a href="customer-add.php"><button class="btn btn-primary "> Customer Add</button> </a><br><br>
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

              <?php foreach ($customer_take_list as $customer_detail_take) { ?>

                  <tr>
                    <td><?php echo $customer_detail_take['customer_id']; ?></td>
                    <td><?php echo  $customer_detail_take['customer_name']; ?></td>
                    <td><?php echo  $customer_detail_take['customer_despriction']; ?></td>
                    <td><?php echo  $customer_detail_take['customer_balance']; ?>TL</td>
                    <td><a href="customer-detail.php?customer_id=<?php echo $customer_detail_take['customer_id']?>"><button class="btn btn-primary" >Edit</button></a></td>
                    <td><a href="../backend/functions.php?customer_id=<?php echo $customer_detail_take['customer_id']?>&customer_delete=ok"><button class="btn btn-danger">Delete</button></a></td>
                  
                  </tr>
                  <?php } ?>
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
 
<?php include'footer.php'; ?>