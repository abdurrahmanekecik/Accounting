<?php include 'header.php'; 
$revenues_detail = $db-> prepare("SELECT * FROM revenues where revenues_id=:id");
$revenues_detail -> execute(['id'=> $_GET['revenues_id']]);
$revenues_detail_take = $revenues_detail ->fetch(PDO::FETCH_ASSOC); ?>

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
              <form action="../backend/functions.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                <input type="hidden" name="revenues_id" value="<?php echo $revenues_detail_take['revenues_id'] ?>"> 
              <select id="heard" class="form-control" name="customer_id" required>
                    <?php                                 
            $customer_setting = $db->prepare("SELECT * FROM customers WHERE customer_id=:customer_id");
            $customer_setting->execute(['customer_id'=> $revenues_detail_take['customer_id']]);
            $customer_take = $customer_setting->fetchAll(PDO::FETCH_ASSOC);                                        
            foreach ($customer_take as $customer_end) {  ?>
                  <option value="<?php echo $customer_end['customer_id']; ?>" ><?php echo $customer_end['customer_name']; ?>                
                  </option>              
                  <?php } ?>
              </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Revenues Amount</label>
                    <input type="text" class="form-control" name="revenues_amount" value="<?php echo $revenues_detail_take['revenues_amount'];?>" placeholder="revenues_id">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Revenues Despriction</label>
                    <input type="text" name="revenues_despriction" class="form-control" value="<?php echo $revenues_detail_take['revenues_despriction'];?>" placeholder="revenues_id">
                  </div>
                  <div class="form-group">
                  <label>Revenues Date</label>
                    <div class="input-group">
                        <input name="revenues_date" value="<?php echo $revenues_detail_take['revenues_date'];?>" type="date" class="form-control" />
                        
                    </div>
                   </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Revenues Amount</label>
                   <select id="heard" class="form-control" name="revenues_situation" required>
                  <option value="1" <?php echo $revenues_detail_take['revenues_situation'] == '1' ? 'selected=""' : ''; ?>>Active</option>
                  <option value="0" <?php if ($revenues_detail_take['revenues_situation']==0) {  'selected=""'; } ?>>Passive</option>
              </select>
               </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="revenues_detail" class="btn btn-primary">Submit</button>
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