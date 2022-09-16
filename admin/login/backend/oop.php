
<?php

class RevenuesRepository
{

	private $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

	public function add($customer_id,$amount,$despriction,$date,$situation)
	{
		$revenues_add=$this->db->prepare("INSERT INTO revenues SET
		customer_id=:customer_id,
		revenues_amount=:revenues_amount,
		revenues_despriction=:revenues_despriction,
		revenues_date=:revenues_date,
		revenues_situation=:revenues_situation
		");
		

		$revenuesadd=$revenues_add->execute([

		'customer_id' => $customer_id,
		'revenues_amount' => $amount,
		'revenues_despriction' => $despriction,
		'revenues_date' => $date,
		'revenues_situation' => $situation

		 ]);

		return $revenuesadd;
	}

	public function update($revenues_id,$customer_id,$amount,$despriction,$date,$situation)
	{

		$revenues_edit=$this->db->prepare("UPDATE revenues SET
		customer_id=:customer_id,
		revenues_amount=:revenues_amount,
		revenues_despriction=:revenues_despriction,
		revenues_date=:revenues_date,
		revenues_situation=:revenues_situation WHERE revenues_id={$revenues_id}");
		

		$revenuesdetail=$revenues_edit->execute([


		'customer_id' => $customer_id,
		'revenues_amount' => $amount,
		'revenues_despriction' => $despriction,
		'revenues_date' => $date,
		'revenues_situation' => $situation


		 ]);

		return $revenuesdetail;	
	}



	public function delete($revenues_id)
	{
		$revenues_delete=$this->db->prepare("DELETE FROM revenues WHERE revenues_id=:id");
		$revenuesdelete=$revenues_delete->execute(['id'=>$_GET['revenues_id']]);

		return $revenuesdelete;
	}

	public function monthlyTotal()
	{

		$andate=date("Y-m-%%");
	$total_revenues_set = $this->db->prepare("SELECT SUM(revenues_amount) AS total_revenues FROM revenues where revenues_date LIKE  '{$andate}' ");
		$total_revenues_set->execute();
		$total_revenues_take = $total_revenues_set->fetch(PDO::FETCH_ASSOC);
		 $total_revenues= $total_revenues_take['total_revenues'];
		return $total_revenues;

	}

		public function list()
	{

		$revenues_list = $this->db->prepare("SELECT * FROM revenues");
		$revenues_list->execute();
		$revenues_take = $revenues_list->fetchAll(PDO::FETCH_ASSOC);
		return $revenues_take;

	}

}






class ExpensesRepository
{

	private $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

	public function add($customer_id,$amount,$despriction,$date,$situation)
	{
		$expenses_add=$this->db->prepare("INSERT INTO expenses SET
		customer_id=:customer_id,
		expense_amount=:expense_amount,
		expense_despriction=:expense_despriction,
		expense_date=:expense_date,
		expense_situation=:expense_situation
		");
		

		$expenseadd=$expenses_add->execute([
		'customer_id' => $customer_id,
		'expense_amount' => $amount,
		'expense_despriction' => $despriction,
		'expense_date' => $date,
		'expense_situation' => $situation


		 ]);

		return $expenseadd;
	}

	public function update($expenses_id,$customer_id,$amount,$despriction,$date,$situation)
	{

		$expenses_edit=$this->db->prepare("UPDATE expenses SET
		customer_id=:customer_id,
		expense_amount=:expense_amount,
		expense_despriction=:expense_despriction,
		expense_date=:expense_date,
		expense_situation=:expense_situation  WHERE  expense_id={$_POST['expense_id']}
		");
		

		$expensedetail=$expenses_edit->execute([
		'customer_id' => $customer_id,
		'expense_amount' => $amount,
		'expense_despriction' => $description,
		'expense_date' => $date,
		'expense_situation' => $situation


		 ]);

		return $expensedetail;
	
		
	}

	public function delete($expense_id)
	{
		$expense=$this->db->prepare("DELETE FROM expenses WHERE expense_id=:id");
		$expensedelete=$expense->execute(['id'=>$_GET['expense_id']]);
		return $expensedelete;
	}

	public function monthlyTotal()
	{

	$andate=date("Y-m-%%");
	$total_expenses_set = $this->db->prepare("SELECT SUM(expense_amount) AS total_expenses FROM expenses where expense_date LIKE  '{$andate}' ");
		$total_expenses_set->execute();
		$total_expenses_take = $total_expenses_set->fetch(PDO::FETCH_ASSOC);
		 $total_expenses= $total_expenses_take['total_expenses'];
		return $total_expenses;
	}


		public function list()
	{

		$expense_list = $this->db->prepare("SELECT * FROM expenses");
		$expense_list->execute();
		$expense_take = $expense_list->fetchAll(PDO::FETCH_ASSOC);
		return $expense_take;

	}

}






class CustomersRepository
{

	private $db;
	
	function __construct($db){
		$this->db = $db;
	}

	public function add($name,$balance,$despriction,$date){
		$customer_add=$this->db->prepare("INSERT INTO customers SET
		customer_name=:customer_name,
		customer_balance=:customer_balance,
		customer_despriction=:customer_despriction,
		customer_date=:customer_date
		");
		

		$customeradd=$customer_add->execute([
		'customer_name' => $name,
		'customer_balance' => $balance,
		'customer_despriction' => $despriction,
		'customer_date' => $date


		 ]);

		return $customeradd;
	}

	public function update($customer_id,$name,$balance,$despriction,$date){
		$customers_edit=$this->db->prepare("UPDATE customers SET
		customer_name=:customer_name,
		customer_balance=:customer_balance,
		customer_despriction=:customer_despriction,
		customer_date=:customer_date
		WHERE  customer_id={$customer_id}");
		

		$customerdetail=$customers_edit->execute([
		'customer_name' => $name,
		'customer_balance' => $balance,
		'customer_despriction' => $despriction,
		'customer_date' => $date

		 ]);

		return $customerdetail;		
	}




	public function delete($customer_id){
		$customer=$this->db->prepare("DELETE FROM customers WHERE customer_id=:id");
		$customerdelete=$customer->execute(['id'=>$_GET['customer_id']]);

		return $customerdelete;
	}


	public function monthlyTotal()
	{


$total_customer_set = $this->db->prepare("SELECT count(*) FROM customers;");
$total_customer_set->execute();
$total_customer_take = $total_customer_set->fetch(PDO::FETCH_ASSOC);
$total_customer=$total_customer_take['count(*)'];
		return $total_customer;
		

	}

	public function list()
	{

		$customer_list = $this->db->prepare("SELECT * FROM customers");
		$customer_list->execute();
		$customer_take = $customer_list->fetchAll(PDO::FETCH_ASSOC);
		return $customer_take;

	}


}





class ManagersRepository
{

	private $db;
	
	function __construct($db){
		$this->db = $db;
	}

	public function add($name,$surname,$password,$time,$auth){
		$managers_add=$this->db->prepare("INSERT INTO managers SET
		manager_name=:manager_name,
		manager_surname=:manager_surname,
		manager_password=:manager_password,
		manager_time=:manager_time,
		manager_authority=:manager_authority,
		manager_last_login=:manager_last_login

		");
		

		$managersadd=$managers_add->execute([

		'manager_name' => $name,
		'manager_surname' => $surname,
		'manager_password' => $password,
		'manager_time' => $time,
		'manager_authority' => $auth,
		'manager_last_login' => date("Y-m-d H:i:s")

		 ]);

		return $managersadd;
	}

 
	public function login($name,$password){
		$manager_control=$this->db->prepare("SELECT * FROM managers WHERE manager_name=:manager_name and manager_password=:manager_pass and manager_authority=:auth");
		
 
		$manager_control->execute([
    	'manager_name' => $name,
    	'manager_pass' => $password,
    	'auth' => 3
    	 ]);


	$admin_control=$manager_control->rowCount();

		return $admin_control;

		
	$managers_update=$this->db->prepare("UPDATE managers SET manager_last_login=:manager_last_login WHERE manager_id={$manager['manager_id']}");

	$control=$managers_update->execute(['manager_last_login' => date("Y-m-d H:i:s")]);

	if ($manager) {

		$_SESSION['managers']= $manager;
	
			header("Location:../public/index.php");
		

	} else {

		error_reporting(E_ALL); ini_set("display_errors", 1); 

	} 






}




	public function list()
	{

		$managers_setting = $this->db->prepare("SELECT * FROM managers");
		$managers_setting->execute();
		$managers_take = $managers_setting->fetchAll(PDO::FETCH_ASSOC);
		return $managers_take;

	}

}