<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expense Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Expense</a></li>
              <li class="breadcrumb-item active">Expense Add</li>
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
                <h3 class="card-title">Expense Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../backend/functions.php" method="post">
                <div class="card-body">
                  <div class="form-group">

              <select id="heard" class="form-control" name="customer_id" required>
                    <?php 
                                
          
                                                      
        foreach ($customer_take_list as $customer_take) {  ?>
                  <option value="<?php echo $customer_take['customer_id']; ?>" ><?php echo $customer_take['customer_name']; ?></option>
                  

                  <?php } ?>
              </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Expense Amount</label>
                    <input type="text" class="form-control" name="expense_amount" >
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Expense Despriction</label>
                    <input type="text" name="expense_despriction" class="form-control"  >
                  </div>

                  <div class="form-group">
                  <label>Expense Date</label>
                    <div class="input-group date">
                        <input name="expense_date"  type="date" class="form-control" />
                        
                    </div>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Expense Situation</label>
                   <select id="heard" class="form-control" name="expense_situation" required>
                  <option value="1" >Active</option>
                  <option value="0" >Passive</option>
              </select>
               </div>
             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="expenses_add" class="btn btn-primary">Submit</button>
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