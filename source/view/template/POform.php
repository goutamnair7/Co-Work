<form action="purchase_order.php" method="post">
	To name<input type="text" name="name"></input><br>
	To designation<input type="text" name="desig"></input><br>
	To company<input type="text" name="company"></input><br>
	To address<input type="text" name="add"></input><br>
	Purchase Order<input type="text" name="purchaseorder"></input><br>
	Check To<input type="text" name="checkto"></input><br>
	<hr>
	<strong>Invoice Information</strong><br>
	Description <input type='textbox' name="description"></input><br>
	No of units <input type='number' name='noofunits'></input><br>
	Rate per unit(Rs) <input type='number' name='rate'></input><br>
	<input type="submit" value="GENERATE PDF">
</form>