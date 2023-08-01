<?php include 'db_connect.php' ?>
<style>
	.chart-container{
		height: 400px;
		width: 50%;
		margin-left: 10%;
	}
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <?php echo "Welcome back ". $_SESSION['login_name']."!"  ?>
                                        
                    </div>
                    
                </div>
            </div>
	</div>
	<div class="chart-container">
  		<canvas id="myChart"></canvas>
	</div>
	<div class="container">
	<div class="row">
	<div class="col-sm">
	<div class="card">
		<div class="card-body">
			<h5>Best in Attendance:</h5>
			<?php $row = $conn->query("SELECT attendance.employee_id, COUNT(attendance.employee_id) AS `value_occurrence`, employee.firstname, employee.lastname  FROM attendance INNER JOIN employee ON employee.id=attendance.employee_id group by employee_id order by `value_occurrence` DESC LIMIT 1;"); 
				$row = $row->fetch_assoc();
				echo($row['firstname']." ".$row['lastname']);
			?>

		</div>
	</div>
	</div>
	<div class="col-sm">
	<div class="card">
		<div class="card-body">
			<h5>Hardworking Employee:</h5>
			Nelson Nolia
		</div>
	</div>
	</div>
	<div class="col-sm">
	<div class="card">
		<div class="card-body">
			<h5>Employee with most missed tasks:</h5>
			Tricia Borcelis
		</div>
	</div>
	</div>
	</div>
	</div>



</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	var label = [];
	var data = [];
	
	<?php
	$highest_salary = $conn->query("SELECT * FROM employee order by salary ASC LIMIT 6");

		while($row=$highest_salary->fetch_assoc()){
			?>
			console.log('here');
			label.push("<?php echo($row['lastname']);?>")
			data.push(<?php echo($row['salary']); ?>)
			<?php
		}
	?>

	console.log(label);
	console.log(data);

	
	const ctx = document.getElementById('myChart');

	new Chart(ctx, {
	type: 'bar',
	data: {
		labels: label,
		datasets: [{
		label: 'Employees with the highest salary',
		data: data,
		borderWidth: 1
		}]
	},
	options: {
		scales: {
		y: {
			beginAtZero: true
		}
		}
	}
	});
</script>