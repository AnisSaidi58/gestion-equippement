<?php
require_once 'config.php';
class Admin extends Database{
	//Admin Login
	public function admin_login($username,$password){
	$sql="SELECT username, password FROM admin WHERE username = :username AND password=:password";
	$stmt = $this->conn->prepare($sql);
	$stmt-> execute(['username'=>$username,'password'=>$password]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;


	}
//fetch all registered users
	public function fetchAllUsers($val){
		$sql="SELECT * FROM users WHERE deleted != $val";
		$stmt= $this->conn->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;


	}


//delete an user

	public function userAction($id,$val){
		$sql= "UPDATE users SET deleted = $val WHERE  id = :id";
		$stmt=$this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		return true;
	}


}



?>