<?php
include('./header.php'); 
include('db_connect.php');


?>

<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Security Prompt</h5>
      </div>
      <div class="modal-body">
      <input class="form-control" id="emp_id" placeholder="Enter Employee ID">
      </div>
      <div class="modal-footer">
        <button type="button" id="emp_id_btn" data-dismiss="modal" class="btn btn-primary">Continue</button>
      </div>
    </div>
  </div>
</div>
<?php

// if(!isset($_GET['task_id'])){
//     header('location:login.php');
// }

$task_id = $_GET['task_id'];

$task = $conn->query("SELECT * FROM tasks WHERE task_id= '".$task_id."'");
$task = $task->fetch_assoc();

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<div class="card" id="main_screen">
  <div class="card-header">
    <h4>Cielosky School Supplies</h4>
    Ticket ID: <?php echo("2023-".$task['id']); ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Task Title: <?php echo($task['task_title']); ?></h5>
    <p class="card-text">Task Information: <?php echo($task['task_information']); ?></p>
    <form id="remarks_form">
    <input type="hidden" name="id">
        <div class="form-group">
            <label class="control-label">Remarks: </label>
            <textarea name="remarks" id="" data-task_id="<?php echo($task['id']);?>" cols="30" rows="2" class="form-control"></textarea>
        </div>
        <button class="btn btn-sm btn-primary "> Mark as Done</button>
    </form>



  </div>
  <div class="card-footer">
        <div class="row">
            <div class="col-md-12">
                <p>Strictly for employees only.</p>
            </div>
        </div>
  </div>
</div>

<style>
    #main_screen{
        margin: 0 20%;
    }

    @media (max-width: 600px){
        #main_screen{
            margin:0 0;
            width: 100%;
            height: 100%;
        }
    }

</style>
<script>
     $("#ModalCenter").modal({backdrop: 'static', keyboard: false}) ;
     $("#emp_id_btn").click(function(){
        console.log($("#emp_id").val());

        const formData = new FormData();
        formData.append("employeeid", $("#emp_id").val());
        formData.append("task_id", <?php echo $_GET['task_id']; ?>)

        for (const pair of formData.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
        }
        $.ajax({
            url:'ajax.php?action=check_employee',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==0){
                    setTimeout(function(){
                        window.location.assign("expired_ticket.php")
                    },500)

                }else{
                    $('#ModalCenter').modal('hide')
                }
            }
        })
    });
    $('#remarks_form').submit(function(e){
        
        console.log("here")
        e.preventDefault()
        const formData = new FormData($(this)[0]);

        $('[name="id"]').val($('[name="remarks"]').attr('data-task_id'))
        formData.append("employeeid", $("#emp_id").val());
        formData.append("task_id", <?php echo $_GET['task_id'] ?>);
        $.ajax({
            url:'ajax.php?action=update_ticket',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                    setTimeout(function(){
                        window.location.assign("expired_ticket.php")
                    },500)

                }
            }
        })
    })

</script>