<?php include'header.php'; 

 if (isset($_POST['profit_report'])) {

$profit_loss_start_time=$_POST['profit_loss_start_time'];
$profit_loss_finish_time=$_POST['profit_loss_finish_time'];

$profit_revenues_set = $db->prepare("SELECT SUM(revenues_amount) AS profit_revenues FROM revenues WHERE revenues_date BETWEEN '{$profit_loss_start_time}' and '{$profit_loss_finish_time}' ");
$profit_revenues_set->execute();
$profit_revenues_take = $profit_revenues_set->fetch(PDO::FETCH_ASSOC);


$profit_expenses_set = $db->prepare("SELECT SUM(expense_amount) AS profit_expenses FROM expenses WHERE expense_date BETWEEN '{$profit_loss_start_time}' and '{$profit_loss_finish_time}' ");
$profit_expenses_set->execute();
$profit_expenses_take = $profit_expenses_set->fetch(PDO::FETCH_ASSOC);

$profit_revenues = $profit_revenues_take['profit_revenues'];
$profit_expenses = $profit_expenses_take['profit_expenses'];
$profit_report_total = $profit_revenues - $profit_expenses;

}
else {}

?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profit-Loss</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profit-Loss</li>
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
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profit-Loss Are Also Listed Below</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
                  <label>Start </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="profit_loss_start_time" class="form-control"  >
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>Finish:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="profit_loss_finish_time" class="form-control"  >
                  </div>
                  <!-- /.input group -->
                </div>
                <button name="profit_report" class="btn btn-primary ">Report</button> </a>
              </form>
                <br>
            <h3> Revenues: <?php  if (!empty($profit_revenues))  { echo $profit_revenues_take['profit_revenues']; }  else { echo"0";} ?></h3>
            <br><br>
            <h3>Expenses: <?php  if (!empty($profit_expenses))  { echo  $profit_expenses_take['profit_expenses']; }  else { echo"0";}?></h3>
            <br><br>
            <h3>Profit-Loss: <?php if (!empty($profit_report_total))  { echo $profit_report_total; }  else { echo "0" ; }  ?> </h3>
          <div class="col-12"><br>
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Profit Totals Are Also Listed Below</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>Month</th>
                  	<th>Profit Total</th>
                  </tr>
                  </thead>
                  <tbody>               

<?php
 if (isset($_POST['month_report'])) {
$month_option=$_POST['month_option'];
$andate=date("Y-$month_option-%%");


$total_revenues_set = $db->prepare("SELECT SUM(revenues_amount) AS total_revenues FROM revenues where revenues_date LIKE  '{$andate}' ");

$total_revenues_set->execute();
$total_revenues_take = $total_revenues_set->fetch(PDO::FETCH_ASSOC);

$total_expenses_set = $db->prepare("SELECT SUM(expense_amount) AS total_expenses FROM expenses where expense_date LIKE '{$andate}' ");
$total_expenses_set->execute();
$total_expenses_take = $total_expenses_set->fetch(PDO::FETCH_ASSOC);

$total_revenues = $total_revenues_take['total_revenues'];
$total_expenses = $total_expenses_take['total_expenses'];
$total_profit_loss = $total_revenues - $total_expenses;

}

else { }
 ?>


<div class="col-md-6">
	  <div class="form-group">
	  	<form  method="post" action=""> 
      <td><select class="select2" multiple="multiple" name="month_option" style="width: 100%;">
  <option value="01">January</option>
  <option value="02">February</option>
  <option value="03">March</option>
  <option value="04">April</option>
  <option value="05">May</option>
  <option value="06">June</option>
  <option value="07">July</option>
  <option value="08">August</option>
  <option value="09">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select> </td>
<button type="submit" name="month_report" class="btn btn-primary" >View</button>
 </form>

<td><?php echo $total_profit_loss; ?></td>

</div>
</div>
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
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