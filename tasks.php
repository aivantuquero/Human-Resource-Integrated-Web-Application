<?php include('db_connect.php');


?>



<!-- modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Task Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div>
			<label for="task_id">Task ID: </label>
			<input type="text" readonly class="form-control-plaintext" id="task_id" value="2023-XXX">
			<br>
			<label for="task_title">Task title: </label>
			<input type="text" readonly class="form-control-plaintext" id="task_title" value="tasktitleheere.com">
			<br>
			<label for="task_info">Task information: </label>
			<input type="text" readonly class="form-control-plaintext" id="task_info" value="info here">
			<br>
			<label for="task_start">Startdate: </label>
			<input type="text" readonly class="form-control-plaintext" id="task_start" value="info here">
			<br>
			<label for="task_end">Endate: </label>
			<input type="text" readonly class="form-control-plaintext" id="task_end" value="info here">
			<label for="task_comment">Comments: </label>
			<input type="text" class="form-control" id="task_comment" value="">
			<button class="add_comment">Add Comment</button>
		</div>
		<div>
		<?php
				$tsk = $conn->query("SELECT * FROM comments");
				while($row=$tsk->fetch_assoc()):
				?>
			<p><?php echo $row['comment'] ?></p>
		<?php endwhile; ?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- modal -->

<!-- modal end -->

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="create-ticket-form">
				<div class="card">
					<div class="card-header">
						  Create a Ticket
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Task title test</label>
								<select id="select-beast" name="title" placeholder="Select a title...">
									<option value="">Select a task...</option>
									<?php
										$tsk = $conn->query("SELECT * FROM tasks group by task_id");
										while($row=$tsk->fetch_assoc()):
										?>
									<option value="<?php echo $row['task_title'] ?>"><?php echo $row['task_title'] ?></option>
								<?php endwhile; ?>
								</select>				
							</div>
							<div class="form-group">
								<label class="control-label">Task Information</label>
								<textarea name="information" id="" cols="30" rows="2" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Employee</label>
								<select class="custom-select browser-default select2" id="select_employee" name="selected_employee[]" multiple="multiple">
									
								<?php
								$emp = $conn->query("SELECT * from employee order by firstname asc");
								while($row=$emp->fetch_assoc()):
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'].' '.$row['lastname'] ?></option>
								<?php endwhile; ?>
								</select>								
							</div>
							<div class="form-group">
								<canvas id="qrcode" style="display:none;"></canvas>
							</div>
							<div class="button-container">
								<button class="btn btn-dark btn-sm" type="button" onclick="selectAll()">Select All</button>
								<button class="btn btn-light btn-sm"  type="button" onclick="deselectAll()">Deselect All</button>
							</div>

							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Generate</button>
								<button class="btn btn-sm btn-danger col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table id="task-table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">Status</th>
									<th class="text-center">Ticket No.</th>
									<th class="text-center">Assigned Employee</th>
									<th class="text-center">Task title</th>
									<th class="text-center">Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$tasks = $conn->query("SELECT t.*, e.*, t.id as eid  FROM tasks AS t INNER JOIN employee AS e ON t.employee_id = e.id;");

								while($row=$tasks->fetch_assoc()):

								?>
								<tr>
									<td class="text-center" class="statuscolor"><?php echo (isset($row['remarks']))?"Complete":"Ongoing" ?></td>
									<td class="text-center">2023-<?php echo $row['eid'] ?></td>
									<td class="text-center"><?php echo($row['firstname']." ".$row['lastname'])  ?></td>
									
									<td class="">
										 <p> <b><?php echo $row['task_title'] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary view_more" data-toggle="modal" data-target="#exampleModalCenter" type="button" data-id="<?php echo $row['eid']?>" data-title="<?php echo $row['task_title']?>" data-information="<?php echo $row['task_title']?>" data-start="<?php echo $row['start_date']?>" data-end="<?php echo $row['end_date']?>"><i class="fas fa-eye"></i></i></button>
										<button class="btn btn-sm btn-danger delete_ticket" type="button" data-id="<?php echo $row['eid'] ?>"><i class="fas fa-trash-alt"></i></button>
									</td>
									
								</tr>
								<?php endwhile; ?>
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
<link
  rel="stylesheet"
  href="cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"
/>

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<script>
	const makeQR = (your_data, fileName) => {
      let qrcodeContainer = document.getElementById("qrcode");
        qrcodeContainer.innerHTML = "";
        new QRious({
          element: qrcodeContainer,
          value: your_data,
          size: 600,
          padding:50,
        }); // generate QR code in canvas
        downloadQR(fileName); // function to download the image
    }
	function downloadQR(fileName) {
			var link = document.createElement('a');
			link.download = fileName+'.png';
			link.href = document.getElementById('qrcode').toDataURL()
			link.click();
		} 

	
	// Jquery dom functions starts here


	function _reset(){
		$('[name="id"]').val('');
		$('#create-ticket-form').get(0).reset();
		$('.select2').val('').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
	}
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:"100%"
	})

	function selectAll() {
		$("#select_employee > option").prop("selected", true);
		$("#select_employee").trigger("change");
	}

	function deselectAll() {
		$("#select_employee > option").prop("selected", false);
		$("#select_employee").trigger("change");
	}
	$('#select-beast').selectize({
		create: true,
		sortField: 'text',
		searchField: 'item',
		create: function(input) {
			return {
				value: input,
				text: input
			}
		}
    });

	

	$('#create-ticket-form').submit(function(e){
		e.preventDefault()	

		// for update
		if($('#create-ticket-form').find("[name='id']").val()){
			// case: it runs on local host and might not work on mobile phones if it outputs local host
			//  for deployment: ://$_SERVER[HTTP_HOST]/view_task.php?task_id=
			makeQR("<?php echo((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://192.168.137.1/cielosky/view_task.php?task_id=");?>"+$('#create-ticket-form').find("[name='id']").val(),'ticket_2023-'+$('#create-ticket-form').find("[name='id']").val());
			makeQR("<?php echo((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://192.168.137.1/cielosky/view_task.php?task_id=");?>"+$('#create-ticket-form').find("[name='id']").val(),'ticket_2023-'+$('#create-ticket-form').find("[name='id']").val());
			console.log('on update')
		}else{
			// get the last id from task table then increment its id
			<?php 
				$lastTask = $conn->query("SELECT * FROM tasks order by id DESC LIMIT 1");
				$row=$lastTask->fetch_assoc();
				$id = $row['task_id']+1;

			?>
			console.log('on create')
			makeQR("<?php echo((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://192.168.137.1/cielosky/view_task.php?task_id=$id");?>","<?php echo('ticket_2023-'.$id)?>");

		}
		var x = new FormData($(this)[0]);
		console.log(x);
		for (const pair of x.entries()) {
		console.log(`${pair[0]}, ${pair[1]}`);
		}
		start_load()
		$.ajax({
			url:'ajax.php?action=save_ticket',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				console.log('here')
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_ticket').click(function(){
		start_load()
		var ticket_form = $('#create-ticket-form')
		ticket_form.get(0).reset()
		ticket_form.find("[name='id']").val($(this).attr('data-id'))
		ticket_form.find("[name='title']").val($(this).attr('data-task_title'))
		ticket_form.find("[name='information']").val($(this).attr('data-task_information'))


		$('[name="selected_employee[]"]').val(JSON.parse($(this).attr('data-employee_id'))).select2({
			width:"100%"
		})
		$('[name="selected_employee"]').trigger('change');
		end_load()
	})
	$('.delete_ticket').click(function(){
		_conf("Are you sure to delete this task?","delete_ticket",[$(this).attr('data-id')])
	})

	$('.view_more').click(function(){

		var x = $(this).attr('data-id')

		$('#task_id').val('2023-'+$(this).attr('data-id'))
		$('#task_title').val($(this).attr('data-title'))
		$('#task_info').val($(this).attr('data-title'))
		$('#task_start').val($(this).attr('data-start'))
		$('#task_end').val($(this).attr('data-end'))

		$('#exampleModalCenter').modal('show');

		$('.add_comment').click(function(){
		$('#task_comment').val();
		const formData = new FormData();

		
		formData.append("comment",$('#task_comment').val());
		formData.append("task_id",x);
		$.ajax({
			url:'ajax.php?action=comment',
			data: formData,
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				console.log('here')
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
		

	})

	let table = new DataTable('#task-table');


	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	function delete_ticket($id){
		console.log("delte id is ", $id)
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_ticket',
			method:'POST',
			data:{task_id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	</script>