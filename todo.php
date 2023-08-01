<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Task(s)</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $id = $_SESSION['login_username']; //employee no "2023-4797"
								$todo = $conn->query("SELECT u.username, e.employee_no, e.id as eid, t.employee_id, t.task_title, t.task_id, t.task_information FROM users AS u INNER JOIN employee AS e ON u.username=e.employee_no INNER JOIN tasks AS t ON t.employee_id=e.id WHERE e.employee_no= '".$id."'");

								$i=1;
								while($row=$todo->fetch_assoc()):
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++ ?></td>
                                            
                                            <td class="">
                                                <p>Task: <b><?php echo $row['task_title'] ?></b></p>
                                                <p class="truncate"><small>Information: <b><?php echo $row['task_information'] ?></b></small></p>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary view_task" type="button" data-id="<?php echo $row['task_id'] ?>">View Task</button>
                                            </td>
                                        </tr>
                                
                                <?php

								 endwhile; 
                                 
                                ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height:150px;
	}
</style>
<script>
	$('.view_task').click(function(){
		window.location.assign('view_task.php?task_id='+$(this).attr('data-id'));

	})
</script>