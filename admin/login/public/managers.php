<?php include'header.php';?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Managers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Managers</li>
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
            <a href="manager-add.php"><button class="btn btn-primary ">Manager Add</button> </a><br><br>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Managers Are Also Listed Below</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>İd</th>
                    <th>Managers Name</th>
                    <th>Managers Surname</th>
                    <th>Managers Last Login</th>
                    <th>Manager Start Time</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php foreach ($managers_take as $managers_detail_take) { ?>
                  <tr>
                  <td><?php echo $managers_detail_take['manager_id']; ?></td>
                  <td><?php echo  $managers_detail_take['manager_name']; ?></td>
                  <td><?php echo  $managers_detail_take['manager_surname']; ?></td>
                  <td><?php echo $managers_detail_take['manager_last_login']; ?></td>
                  <td><?php echo $managers_detail_take['manager_time']; ?></td>
                  </tr>
                <?php    }  ?>
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