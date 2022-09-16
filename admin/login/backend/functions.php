<?php
ob_start();
session_start();
include 'database.php';
include 'oop.php';

function returnResponse($control,$location){

	if ($control) {

		header("Location:../public/$location.php?situation=ok");

	} else {

		header("Location:../public/$location.php?situation=no");
	}
 

}

	 


function managerResponse($admin_control){

	if ($admin_control==1) {

		

		header("Location:../public/index.php?situation=ok");

	} else { 
		
		header("Location:../public/index.php?situation=no");
	}


}



/// MANAGERS ///

if (isset($_POST['manager_add'])) {

$ManagersRepository = new ManagersRepository($db);
$managersadd = $ManagersRepository->add($_POST['manager_name'],$_POST['manager_surname'],$_POST['manager_password'],$_POST['manager_authority'],$_POST['manager_time'],$_POST['manager_authority'],$_POST['manager_last_login']);
	returnResponse($control,"managers");	
}


if (isset($_POST['manager_login'])) {

$ManagersRepository = new ManagersRepository($db);
$managercontrol = $ManagersRepository->login($_POST['manager_name'],$_POST['manager_password']);
	managerResponse($admin_control);	
}


$ManagersRepository = new ManagersRepository($db);
$managers_take = $ManagersRepository->list();





/// REVENUES ///

if (isset($_POST['revenues_add'])) {

$RevenuesRepository = new RevenuesRepository($db);
$revenuesadd = $RevenuesRepository->add($_POST['customer_id'],$_POST['revenues_amount'],$_POST['revenues_despriction'],$_POST['revenues_date'],$_POST['revenues_situation']);
	returnResponse($control,"revenues");	
}
 

if (isset($_POST['revenues_detail'])) {

$RevenuesRepository = new RevenuesRepository($db);
$revenuesdetail = $RevenuesRepository->update($_POST['revenues_id'],$_POST['customer_id'],$_POST['revenues_amount'],$_POST['revenues_despriction'],$_POST['revenues_date'],$_POST['revenues_situation']);
	returnResponse($control,"revenues");
}


if (isset($_GET['revenues_delete']) and $_GET['revenues_delete']=="ok") {

$RevenuesRepository = new RevenuesRepository($db);
$revenuesdelete = $RevenuesRepository->delete($_GET['revenues_id']);
returnResponse($control,"revenues");

}


$RevenuesRepository = new RevenuesRepository($db);
$total_revenues = $RevenuesRepository->monthlyTotal();

$RevenuesRepository = new RevenuesRepository($db);
$revenues_take = $RevenuesRepository->list();






/// EXPENSES ///

if (isset($_POST['expenses_add'])) {



$ExpensesRepository = new ExpensesRepository($db);
$expenseadd = $ExpensesRepository->add($_POST['customer_id'],$_POST['expense_amount'],$_POST['expense_despriction'],$_POST['expense_date'],$_POST['expense_situation']);
	returnResponse($control,"expenses");	
}


if (isset($_POST['expenses_detail'])) {

$ExpensesRepository = new ExpensesRepository($db);
$expensedetail = $ExpensesRepository->update($_POST['expense_id'],$_POST['customer_id'],$_POST['expense_amount'],$_POST['expense_despriction'],$_POST['expense_date'],$_POST['expense_situation']);
	returnResponse($control,"expenses");
}


if (isset($_GET['expense_delete']) and $_GET['expense_delete']=="ok") {

$ExpensesRepository = new ExpensesRepository($db);
$expensedelete = $ExpensesRepository->delete($_GET['expense_id']);
returnResponse($control,"expenses");

}


$ExpensesRepository = new ExpensesRepository($db);
$total_expenses = $ExpensesRepository->monthlyTotal();

$ExpensesRepository = new ExpensesRepository($db);
$expense_take = $ExpensesRepository->list();








/// CUSTOMERS ///

$customer_setting_list = $db->prepare("SELECT * FROM customers");
$customer_setting_list->execute();
$customer_take_list = $customer_setting_list->fetchAll(PDO::FETCH_ASSOC);



if (isset($_POST['customer_add'])) {

$CustomersRepository = new CustomersRepository($db);
$customeradd = $CustomersRepository->add($_POST['customer_name'],$_POST['customer_balance'],$_POST['customer_despriction'],$_POST['customer_date']);
	returnResponse($control,"customers");	
}


if (isset($_POST['customer_detail'])) {

$CustomersRepository = new CustomersRepository($db);
$customerdetail = $CustomersRepository->update($_POST['customer_id'],$_POST['customer_name'],$_POST['customer_balance'],$_POST['customer_despriction'],$_POST['customer_date']);
	returnResponse($control,"customers");
}


if (isset($_GET['customer_delete']) and $_GET['customer_delete']=="ok") {

$CustomersRepository = new CustomersRepository($db);
$customerdelete = $CustomersRepository->delete($_GET['customer_id']);
returnResponse($control,"customers");

}

$CustomersRepository = new CustomersRepository($db);
$total_customer = $CustomersRepository->monthlyTotal();


$CustomersRepository = new CustomersRepository($db);
$customer_take = $CustomersRepository->list();


$total_profit_loss = $total_revenues - $total_expenses;