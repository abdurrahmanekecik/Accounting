<?php include 'database.php';
ob_start();
session_start();



/// MANAGER ///


if (isset($_POST['manager_login'])) {

$manager_name= $_POST['manager_name'];
$manager_password= $_POST['manager_password'];
$manager_control = $db-> prepare("SELECT * FROM managers WHERE manager_name=:manager_name and manager_password=:manager_pass and manager_authority=:auth");
$manager_control -> execute([

    'manager_name' => $manager_name,
    'manager_pass' => $manager_password,
    'auth' => 3
  ]);


echo $admin_control=$manager_control->rowCount();

	if ($admin_control==1) {


		$_SESSION['manager_name']= $manager_name;
			header("Location:../public/index.php");
			exit;
	} else {

		header("Location:../../login.php?situation=no");
		exit;

}

}




$managers_setting = $db->prepare("SELECT * FROM managers");
$managers_setting->execute();
$managers_take = $managers_setting->fetchAll(PDO::FETCH_ASSOC);



if (isset($_POST['manager_add'])) {

	
	$manager_add=$db->prepare("INSERT INTO managers SET
		manager_name=:manager_name,
		manager_surname=:manager_surname,
		manager_password=:manager_password,
		manager_time=:manager_time,
		manager_authority=:manager_authority,
		manager_last_login=:manager_last_login

		");
		


	$manageradd=$manager_add->execute([


		'manager_name' => $_POST['manager_name'],
		'manager_surname' => $_POST['manager_surname'],
		'manager_password' => $_POST['manager_password'],
		'manager_time' => $_POST['manager_time'],
		'manager_authority' => $_POST['manager_authority'],
		'manager_last_login' => $_POST['manager_last_login']


		 ]);




	if ($manageradd) {

		header("Location:../public/managers.php?situation=ok");

	} else {

	header("Location:../public/managers.php?situation=no");
	}


}






/// REVENUES ///
$revenues_setting = $db->prepare("SELECT * FROM revenues");
$revenues_setting->execute();
$revenues_take = $revenues_setting->fetchAll(PDO::FETCH_ASSOC);



$revenues_home_setting = $db->prepare("SELECT * FROM revenues order by revenues_id DESC limit 5");
$revenues_home_setting->execute();
$revenues_home_take = $revenues_home_setting->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['revenues_detail'])) {



	$revenues_id=$_POST['revenues_id'];
	$revenues_update=$db->prepare("UPDATE revenues SET
	
		customer_id=:customer_id,
		revenues_amount=:revenues_amount,
		revenues_despriction=:revenues_despriction,
		revenues_date=:revenues_date,
		revenues_situation=:revenues_situation


		
		WHERE revenues_id={$_POST['revenues_id']}");

	$revenues_update_control=$revenues_update->execute([ 

		'customer_id' => $_POST['customer_id'],
		'revenues_amount' => $_POST['revenues_amount'],
		'revenues_despriction' => $_POST['revenues_despriction'],
		'revenues_date' => $_POST['revenues_date'],
		'revenues_situation' => $_POST['revenues_situation']
	]);


	if ($revenues_update_control) {

		header("Location:../public/revenues.php?situation=ok");

	} else {

		header("Location:../public/revenues.php?situation=no");
	}


}



if (isset($_POST['revenues_add'])) {

	
	$revenues_add=$db->prepare("INSERT INTO revenues SET
		customer_id=:customer_id,
		revenues_amount=:revenues_amount,
		revenues_despriction=:revenues_despriction,
		revenues_date=:revenues_date,
		revenues_situation=:revenues_situation
		");
		


	$revenuesadd=$revenues_add->execute([


		'customer_id' => $_POST['customer_id'],
		'revenues_amount' => $_POST['revenues_amount'],
		'revenues_despriction' => $_POST['revenues_despriction'],
		'revenues_date' => $_POST['revenues_date'],
		'revenues_situation' => $_POST['revenues_situation']


		 ]);


	if ($revenuesadd) {

		header("Location:../public/revenues.php?situation=ok");

	} else {

	header("Location:../public/revenues.php?situation=no");
	}


}



if (isset($_GET['revenues_delete']) and $_GET['revenues_delete']=="ok") {


$revenues_delete_func=$db->prepare("DELETE FROM revenues WHERE revenues_id=:id");
$revenues_delete_control=$revenues_delete_func->execute([

	'id'=>$_GET['revenues_id']


 ]);

if ($revenues_delete_control) {

		header("Location:../public/revenues.php?situation=ok");

	} else {

		header("Location:.../public/revenues.php?situation=no");
	}


}









/// EXPENSE ///

$expenses_setting = $db->prepare("SELECT * FROM expenses");
$expenses_setting->execute();
$expenses_take = $expenses_setting->fetchAll(PDO::FETCH_ASSOC);

$expenses_home_setting = $db->prepare("SELECT * FROM expenses order by expense_id DESC limit 5");
$expenses_home_setting->execute();
$expenses_home_take = $expenses_home_setting->fetchAll(PDO::FETCH_ASSOC);




if (isset($_POST['expenses_detail'])) {



		$expense_id=$_POST['expense_id'];


	$expense_update=$db->prepare("UPDATE expenses SET
	
		expense_amount=:expense_amount,
		expense_despriction=:expense_despriction,
		expense_date=:expense_date,
		customer_id=:customer_id,
		expense_situation=:expense_situation


		
		WHERE expense_id={$_POST['expense_id']}");

	$expense_update_control=$expense_update->execute([ 
		'expense_amount' => $_POST['expense_amount'],
		'expense_despriction' => $_POST['expense_despriction'],
		'expense_date' => $_POST['expense_date'],
		'customer_id' => $_POST['customer_id'],
		'expense_situation' => $_POST['expense_situation']
	]);


	if ($expense_update_control) {

		header("Location:../public/expenses.php?situation=ok");

	} else {

		header("Location:../public/expenses.php?situation=no");
	}


}



if (isset($_POST['expenses_add'])) {

	
	$expense_add=$db->prepare("INSERT INTO expenses SET
		customer_id=:customer_id,
		expense_amount=:expense_amount,
		expense_despriction=:expense_despriction,
		expense_date=:expense_date,
		expense_situation=:expense_situation
		");
		


	$expenseadd=$expense_add->execute([


		'customer_id' => $_POST['customer_id'],
		'expense_amount' => $_POST['expense_amount'],
		'expense_despriction' => $_POST['expense_despriction'],
		'expense_date' => $_POST['expense_date'],
		'expense_situation' => $_POST['expense_situation']


		 ]);


	if ($expenseadd) {

		header("Location:../public/expenses.php?situation=ok");

	} else {

	
		header("Location:../public/expenses.php?situation=no");
	}


}



if (isset($_GET['expenses_delete']) and $_GET['expenses_delete']=="ok") {


$expenses_delete_func=$db->prepare("DELETE FROM expenses WHERE expense_id=:id");
$expenses_delete_control=$expenses_delete_func->execute([

	'id'=>$_GET['expenses_id']


 ]);

if ($expenses_delete_control) {

		header("Location:../public/expenses.php?situation=ok");

	} else {

		header("Location:../public/expenses.php?situation=no");
	}


}








/// CUSTOMER ///
$customer_setting_list = $db->prepare("SELECT * FROM customers");
$customer_setting_list->execute();
$customer_take_list = $customer_setting_list->fetchAll(PDO::FETCH_ASSOC);

$customer_home_take = $db->prepare("SELECT * FROM customers order by customer_id DESC limit 5");
$customer_home_take->execute();
$customer_home_take_list = $customer_home_take->fetchAll(PDO::FETCH_ASSOC);




if (isset($_POST['customer_detail'])) {

		$customer_id=$_POST['customer_id'];


	$customer_update=$db->prepare("UPDATE customers SET
	
		customer_name=:customer_name,
		customer_balance=:customer_balance,
		customer_despriction=:customer_despriction,
		customer_date=:customer_date

		
		WHERE customer_id={$_POST['customer_id']}");

	$customer_update_control=$customer_update->execute([ 
		'customer_name' => $_POST['customer_name'],
		'customer_balance' => $_POST['customer_balance'],
		'customer_despriction' => $_POST['customer_despriction'],
		'customer_date' => $_POST['customer_date']
	]);


	if ($customer_update_control) {

		header("Location:../public/customers.php?situation=ok");

	} else {

		header("Location:../public/customers.php?situation=no");
	}


}



if (isset($_POST['customer_add'])) {

	
	$customer_add=$db->prepare("INSERT INTO customers SET
		customer_name=:customer_name,
		customer_balance=:customer_balance,
		customer_despriction=:customer_despriction,
		customer_date=:customer_date
		");
		

	$customeradd=$customer_add->execute([
		'customer_name' => $_POST['customer_name'],
		'customer_balance' => $_POST['customer_balance'],
		'customer_despriction' => $_POST['customer_despriction'],
		'customer_date' => $_POST['customer_date']


		 ]);


	if ($customeradd) {

		header("Location:../public/customers.php?situation=ok");

	} else {

	header("Location:../public/customers.php?situation=no");
	}


}



if (isset($_GET['customer_delete']) and $_GET['customer_delete']=="ok") {


$customer_delete_func=$db->prepare("DELETE FROM customers WHERE customer_id=:id");
$customer_delete_control=$customer_delete_func->execute([

	'id'=>$_GET['customer_id']


 ]);

if ($customer_delete_control) {

		header("Location:../public/customers.php?situation=ok");

	} else {

		header("Location:.../public/customers.php?situation=no");
	}


}



$andate=date("Y-m-%%");

// total revenues

$total_revenues_set = $db->prepare("SELECT SUM(revenues_amount) AS total_revenues FROM revenues where revenues_date LIKE  '{$andate}' ");
$total_revenues_set->execute();
$total_revenues_take = $total_revenues_set->fetch(PDO::FETCH_ASSOC);


//total expenses

$total_expenses_set = $db->prepare("SELECT SUM(expense_amount) AS total_expenses FROM expenses where expense_date LIKE '{$andate}' ");
$total_expenses_set->execute();
$total_expenses_take = $total_expenses_set->fetch(PDO::FETCH_ASSOC);


//total customer

$total_customer_set = $db->prepare("SELECT count(*) FROM customers;");
$total_customer_set->execute();
$total_customer_take = $total_customer_set->fetch(PDO::FETCH_ASSOC);


//total profit-loss

$total_revenues = $total_revenues_take['total_revenues'];
$total_expenses = $total_expenses_take['total_expenses'];
$total_profit_loss = $total_revenues - $total_expenses;



?>
