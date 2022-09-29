<?php include'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <h3><?php if ($total_revenues_take['total_revenues'] > 0) {
                  echo $total_revenues_take['total_revenues'];
                } else { echo "0"; }?></h3>

                <p>Montly Revenues</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="revenues.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                 <h3><?php if ($total_expenses_take['total_expenses'] > 0) {
                  echo $total_expenses_take['total_expenses'];
                } else { echo "0"; }?></h3>
                

                <p>Montly Expenses</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="expenses.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                
                 <h3><?php if ($total_customer_take['count(*)'] > 0) {
                  echo $total_customer_take['count(*)'];
                } else { echo "0"; }?></h3>

                <p>Montly Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="customers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total_profit_loss; ?></h3>
            

                <p>Montly Total Profit-Loss</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="profit-Loss.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

   <div class="col-12">

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
                  
                   
                  </tr>
                  </thead>
                  <tbody>


              <?php foreach ($revenues_home_take as $revenues_home_detail_take) {
                                
            $customer_setting = $db->prepare("SELECT * FROM customers WHERE customer_id=:customer_id");
            $customer_setting->execute(['customer_id'=> $revenues_home_detail_take['customer_id']]);
            $customer_take = $customer_setting->fetchAll(PDO::FETCH_ASSOC);                                      
            foreach ($customer_take as $customer_end) { ?>
                  <tr>
                    <td><?php echo $revenues_home_detail_take['revenues_id']; ?></td>
                    <td><?php echo  $customer_end['customer_name']; ?></td>
                     <td><?php echo  $revenues_home_detail_take['revenues_amount']; ?>TL</td>
                    <td><?php echo  $revenues_home_detail_take['revenues_despriction']; ?></td>
                     <td><?php echo $revenues_home_detail_take['revenues_date']; ?></td>
                     <td><?php echo $customer_end['customer_balance']; ?></td>
                     <td> <?php if ($revenues_home_detail_take['revenues_situation']==1) {?>    
                      <button class="btn-success btn">Active </button></td>
        <?php }  else { ?> 
          <button class="btn btn-warning">Passive </button>  <?php  } ?></tr>

      <?php    } } ?>
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
     <div class="card col-12">

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
                  </tr>
                  </thead>
                  <tbody>
              <?php foreach ($expenses_home_take as $expenses_home_detail_take) {

            $customer_setting = $db->prepare("SELECT * FROM customers WHERE customer_id=:customer_id");
            $customer_setting->execute(['customer_id'=> $expenses_home_detail_take['customer_id']]);
            $customer_take = $customer_setting->fetchAll(PDO::FETCH_ASSOC);                                            
             foreach ($customer_take as $customer_end) { ?>
                  <tr>
                    <td><?php echo $expenses_home_detail_take['expense_id']; ?></td>
                    <td><?php echo  $customer_end['customer_name']; ?></td>
                     <td><?php echo  $expenses_home_detail_take['expense_amount']; ?>TL</td>
                    <td><?php echo  $expenses_home_detail_take['expense_despriction']; ?></td>
                     <td><?php echo $expenses_home_detail_take['expense_date']; ?></td>
                     <td><?php echo $customer_end['customer_balance']; ?></td> 
                     <td> <?php if ($expenses_home_detail_take['expense_situation']==1) {?>    
                    <button class="btn-success btn">Active </button></td> <?php }  else { ?> 

                 <button class="btn btn-warning">Passive </button>  <?php  } ?></tr>
<?php    } } ?>

            </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <div class="col-12">
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
              <?php foreach ($customer_home_take_list as $customer_home_detail) { ?>
                  <tr>
                    <td><?php echo $customer_home_detail['customer_id']; ?></td>
                    <td><?php echo  $customer_home_detail['customer_name']; ?></td>
                    <td><?php echo  $customer_home_detail['customer_despriction']; ?></td>
                    <td><?php echo  $customer_home_detail['customer_balance']; ?>TL</td>
                  </tr><?php  } ?>
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->          
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include'footer.php'; ?>