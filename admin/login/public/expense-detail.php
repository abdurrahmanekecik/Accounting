<?php include 'header.php';

$expense_detail_setting = $db-> prepare("SELECT * FROM expenses where expense_id=:id");
$expense_detail_setting -> execute(['id'=> $_GET['expense_id']]);
$expense_detail_take = $expense_detail_setting ->fetch(PDO::FETCH_ASSOC);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expense Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Expense</a></li>
              <li class="breadcrumb-item active">Expense Detail Edit</li>
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
                <h3 class="card-title">Expense Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../backend/functions.php" method="post">
                <div class="card-body">
                  <div class="form-group">
              <select id="heard" class="form-control" name="customer_id" required>
            <?php               
            $customer_setting = $db->prepare("SELECT * FROM customers WHERE customer_id=:customer_id");
            $customer_setting->execute(['customer_id'=> $expense_detail_take['customer_id']]);
            $customer_take = $customer_setting->fetchAll(PDO::FETCH_ASSOC);
                                        
            foreach ($customer_take as $customer_end) {  ?>
               <option value="<?php echo $customer_end['customer_id']; ?>" ><?php echo $customer_end['customer_name']; ?></option>
                  <?php } ?>
              </select>

              <input type="hidden" name="expense_id" value="<?php echo $expense_detail_take['expense_id'] ?>"> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Expense Amount</label>
                    <input type="text" class="form-control" name="expense_amount" value="<?php echo $expense_detail_take['expense_amount'];?>" placeholder="Expense_id">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Expense Despriction</label>
                    <input type="text" name="expense_despriction" class="form-control" value="<?php echo $expense_detail_take['expense_despriction'];?>" >
                  </div>
                  <div class="form-group">
                  <label>Expense Date</label>
                    <div class="input-group date">
                        <input name="expense_date" value="<?php echo $expense_detail_take['expense_date'];?>" type="date" class="form-control" />
                        
                    </div>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Expense Amount</label>
                   <select id="heard" class="form-control" name="expense_situation" required>
                  <option value="1" <?php echo $expense_detail_take['expense_situation'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                  <option value="0" <?php if ($expense_detail_take['expense_situation']==0) {  'selected=""'; } ?>>Pasif</option>
              </select>
               </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="expenses_detail" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <?php include 'footer.php'; ?>