<?php

require_once'assets/php/admin-header.php';



?>
<div class="row" style="width: 69rem;">
	
		<div class="col-lg-12">
			<div class="card my-2 border-success">
				<div class="card-header bg-success text-white">
					
					<h4 class="m-2">Total Registred Users</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive" id="showAllUsers">
						<p class="text-center align-self-center lead">please wait..</p>

					</div>
				</div>
			</div>
		</div>
	</div>





<!-- footer Area -->
</div>
</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(document).ready(function(){

		//fetch All users Ajax
		
		fetchAllUsers();
		function fetchAllUsers(){
$.ajax({
	url:'assets/php/admin-action.php',
	method:'post',
	data:{action: 'fetchAllUsers'},
	success:function(response){
	$("#showAllUsers").html(response);
	$("table").DataTable({
		order:[0,'desc']
	});
	}
});
		
		}


		//Delete user ajax
		$("body").on("click",".deleteUserIcon", function(e){

			e.preventDefault();
			del_id=$(this).attr('id');

			Swal.fire({

				title:"Are you sure?",
				text:"You won't be able to revert this!",
				type:'warning',
				showCancelButton:true,
				confirmButtonColor:'#3085d6',
				cancelButtonColor:'#d33',
				ConfirmButtonText:'Yes delete it!'

			}).then((result)=>{
				if (result.value){
					$.ajax({
						url:'assets/php/admin-action.php',
						method:'post',
						data:{
							del_id: del_id
						},
						success:function(response) {Swal.fire(
							'deleted!',
							'Not deleted successfully!',
							'success')
						fetchAllUsers();
						}
					});
				}
			})
		});

	});
	
</script>
</body>
</html>