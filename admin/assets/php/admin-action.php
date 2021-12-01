<?php 
require_once'admin-db.php';
$admin=new Admin();
session_start();

//Handle Admin login ajax request
if(isset($_POST['action'])&&$_POST['action']=='adminLogin'){
	$username=$admin->test_input($_POST['username']);
	$password=$admin->test_input($_POST['password']);

	$hpassword=sha1($password);
	$loggedInAdmin =$admin->admin_login($username,$hpassword);
	if($loggedInAdmin != null){

		echo'admin_login';
		$_SESSION['username']=$username;

	}
	else{
		echo $admin->showMessage('danger',"Username or Password is Incorrect!");
	}
	
}
//handle fetch all users ajax request
if(isset($_POST['action'])&& $_POST['action']=='fetchAllUsers'){
$output='';
$data=$admin->fetchAllUsers(0);

if($data){
	$output.='<table class="table table-striped table-bordered text-center">
	          <thead>
	          <tr>
	          <th>#</th>
	          <th>Name</th>
	          <th>E-Mail</th>
	          <th>Action</th>
	       </tr>

	          </thead>
	          <tbody>';
foreach ($data as $row) {
	$output.='<tr>
	         <td>'.$row['id'].'</td>

	         <td>'.$row['name'].'</td>
	         <td>'.$row['email'].'</td>
	         <td>
	         <a href="#" id="'.$row['id'].'"title="view Details"
	         class="text-primary userDetailsIcon"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
	         <a href="#" id="'.$row['id'].'"title="Delete User"
	         class="text-danger deleteUserIcon"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;

	         </td>

	         </tr>';
	     }
	         $output.='</tbody>
	         </table>';
	         echo $output;



}
else{
	echo '<h3 class="text-center text-secondary"> No any user registred yet</h3>';
}

}
//Handle Delete an user Ajax
if (isset($_POST['del_id'])){
	$id=$_POST['del_id'];
	$admin->userAction($id,0);
}

//Handel Fetch all Deleted users request
if(isset($_POST['action'])&& $_POST['action']=='fetchAllDeletedUsers'){
$output='';
$data=$admin->fetchAllUsers(1);

if($data){
	$output.='<table class="table table-striped table-bordered text-center">
	          <thead>
	          <tr>
	          <th>#</th>
	          <th>Name</th>
	          <th>E-Mail</th>
	          <th>Action</th>
	       </tr>

	          </thead>
	          <tbody>';
foreach ($data as $row) {
	$output.='<tr>
	         <td>'.$row['id'].'</td>

	         <td>'.$row['name'].'</td>
	         <td>'.$row['email'].'</td>
	         <td>
	         
	         <a href="#" id="'.$row['id'].'"title="Restore User"
	         class="text-white restoreUserIcon badge badge-dark p-2">Restore</a>

	         </td>

	         </tr>';
	     }
	         $output.='</tbody>
	         </table>';
	         echo $output;



}
else{
	echo '<h3 class="text-center text-secondary"> No any user deleted yet</h3>';
}

}

//Handle Restore deleted user Ajax Request
if (isset($_POST['res_id'])) {
	$id= $_POST['res_id'];
	$admin->userAction($id,1);
}

?>