<?php include 'db_connect.php' ?>

<?php
	$payroll=$conn->query("SELECT p.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as ename,e.employee_no FROM payroll_items p inner join employee e on e.id = p.employee_id  where p.id=".$_GET['id']);
	foreach ($payroll->fetch_array() as $key => $value) {
		$$key = $value;
	}
	$pay = $conn->query("SELECT * FROM payroll where id = ".$payroll_id)->fetch_array();
	$pt = array(1=>"Monhtly",2=>"Semi-Monthly");



  
?>

<style>
table{
    width:100%;
    border-collapse:collapse;
}
tr,td,th{
    border:1px solid black
}
.text-center{
    text-align:center;
}
.text-right{
    text-align:right;
}
</style>
<div>
    <br>
    <h2 class="text-center" style="padding:0; margin:0">Cielosky School Supplies</h2>
    <h5 class="text-center">1018 Soler St, Recto Ave., Binondo, Manila, 1006 Metro Manila</h5>
    <br>
    <div style="display: flex; justify-content:space-between;">
      <h4>Name: <?php echo ucwords($ename) ?></h3>
      <h4>Employee ID: <?php echo $employee_no ?></h4>
    </div>
    <div style="display: flex; justify-content:space-between;">
        <h4>Pay period: <?php echo date("M d, Y",strtotime($pay['date_from'])). " - ".date("M d, Y",strtotime($pay['date_to'])) ?></h3>
        <h4>Date: <?php echo $cDate = date('m/d/Y', time()) ?></h4>
    </div>

    

<hr>
</div>

<table style="width:100%">
  <tr>
    <th>Basic Wage (per month)</th>
    <td>Php <?php echo $salary ?></td>
    <td></td>
  </tr>
  <tr>
    <th style="padding:20px">Gross Salary</th>
    <td></td>
    <td>Php<?php echo number_format($gross_salary,2) ?> </td>
  </tr>
  <tr>
    <th>Less: </th>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>SSS Contribution</th>
    <td>Php <?php echo $sss ?></td>
    <td></td>
  </tr>
  <tr>
    <th>PhilHealth Contribution</th>
    <td>Php <?php echo $philhealth ?></td>
    <td></td>
  </tr>
  <tr>
    <th>Pag-IBIG Contribution</th>
    <td>Php <?php echo $pagibig ?></td>
    <td></td>
  </tr>
  <tr>
    <th>-</th>
    <td>-</td>
    <td>-</td>
  </tr>
  <tr>
    <th>Total Deductions(C.A & Loan)</th>
    <td></td>
    <td>Php <?php echo $deduction_amount ?></td>
  </tr>
  <tr>
    <th>-</th>
    <td>-</td>
    <td>-</td>
  </tr>
  <tr>
    <th>Total Net Pay</th>
    <td></td>
    <td>Php<?php echo number_format($net,2) ?> </td>
  </tr>
</table>

