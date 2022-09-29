<?php include'header.php'; ?>




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
            <a href="expense-add.php"><button class="btn btn-primary "> Expense Add</button> </a><br><br>

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


              <?php foreach ($expenses_take as $expenses_detail_take) {
                     
            $customer_setting = $db->prepare("SELECT * FROM customers WHERE customer_id=:customer_id");
            $customer_setting->execute([  

            'customer_id'=> $expenses_detail_take['customer_id']]);
            $customer_take = $customer_setting->fetchAll(PDO::FETCH_ASSOC);
                                                      
				      foreach ($customer_take as $customer_end) { ?>
                  <tr>
                    <td><?php echo $expenses_detail_take['expense_id']; ?></td>
                    <td><?php echo  $customer_end['customer_name']; ?></td>
                     <td><?php echo  $expenses_detail_take['expense_amount']; ?>TL</td>
                    <td><?php echo  $expenses_detail_take['expense_despriction']; ?></td>
                     <td><?php echo $expenses_detail_take['expense_date']; ?></td>
                     <td><?php echo $customer_end['customer_balance']; ?></td>

                     <td> <?php if ($expenses_detail_take['expense_situation']==1) {?>    
                                <button class="btn-success btn">Active </button></td>

        <?php }  else { ?> 

        	   <button class="btn btn-warning">Passive </button>  <?php  } ?>

                    <td><a href="expense-detail.php?expense_id=<?php echo $expenses_detail_take['expense_id']?>"><button class="btn btn-primary" >Edit</button></a></td>
                     <td><a href="../backend/functions.php?expenses_id=<?php echo $expenses_detail_take['expense_id']?>&expenses_delete=ok"><button class="btn btn-danger">Delete</button></a></td>
                  
                  </tr>
<?php    } } ?>
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