<?php

require_once("db/db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ParagonIE\ConstantTime\Encoding;
use ParagonIE\ConstantTime\Base64UrlSafe;

require 'vendor/autoload.php';

class UserModel{

	private $db;

	public function __construct(){
		$this->db=Connection::createConnection();
	}

	public function getIdByLogin($login){
		try{
			$statement = $this->db->prepare('SELECT id FROM user WHERE username=:login OR email=:login');
			$statement->execute(array(
				':login'=>$login
			));
			$resultado = $statement->fetch();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function getEmailById($id){
		try{
			$statement = $this->db->prepare('SELECT email FROM user WHERE id=:id');
			$statement->execute(array(
				':id'=>$id
			));
			$resultado = $statement->fetch();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function getSelectorById($id){
		try{
			$statement = $this->db->prepare('SELECT selector FROM user WHERE id=:id');
			$statement->execute(array(
				':id'=>$id
			));
			$resultado = $statement->fetch();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}
	public function getSelectorByEmail($email){
		try{
			$statement = $this->db->prepare('SELECT selector FROM user WHERE email=:email');
			$statement->execute(array(
				':email'=>$email
			));
			$resultado = $statement->fetch();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function blockUserById($id){
		try{
			$statement = $this->db->prepare('UPDATE user SET active=:active WHERE id=:id');
			$statement->execute(array(
				':active'=>0,
				':id'=> $id
			));
		}catch(Exception $e){
			echo $e;
		}
	}

	public function userExists($user){
		try {
			$statement = $this->db->prepare('SELECT * FROM user WHERE username = :username'); 
			$statement->execute(array(
				':username' => $user
			));
			$result = $statement->fetch();
			return $result;
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function getAllUsers(){
		try{
			$statement = $this->db->prepare('SELECT username FROM USER');
			$statement->execute();
			$resultado = $statement->fetchAll();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function getNonAdminUsers(){
		try{
			$statement = $this->db->prepare('SELECT username FROM user WHERE admin=:admin and active=:active');
			$statement->execute(array(
				':admin' => 0,
				':active'=>1
			));
			//$resultado = $statement->fetchAll();
			return $statement;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function addUser($username,$passwd,$email,$firstName,$lastName,$selector){
		try{
			$statement = $this->db->prepare('INSERT INTO user (username,passwd,email,firstName,lastName,active,admin,selector) VALUES (:username, :passwd, :email, :firstName,:lastName,0,0,:selector);');
			$statement->execute(array(
				':username' => $username,
				':passwd' => $passwd,
				':email' => $email, 
				':firstName' => $firstName,
				':lastName' => $lastName,
				':selector' => $selector
			));
		}catch (Exception $e) {
			echo $e;
		}
	}

	public function verifyUser($selector){
		try{
			$statement = $this->db->prepare('UPDATE user SET active=1 WHERE selector=:selector');
			$statement->execute(array(
				':selector' => $selector
			));
		}catch (Exception $e) {
			echo $e;
		}
	}
	
	public function emailExists($email){
		try {
			$statement = $this->db->prepare('SELECT * FROM user WHERE email = :email'); 
			$statement->execute(array(
				':email' => $email
			));
			$resultado = $statement->fetch();
			return $resultado;
		} catch (Exception $e) {
			$x = $e->getMessage();
			header("Location: error.php?error=$x");
		}
	
	}

	public function setNewPassword($selector, $password){
		try{
			$statement = $this->db->prepare('UPDATE user SET passwd=:password WHERE selector=:selector');
			$statement->execute(array(
				':selector' => $selector,
				':password' => password_hash($password, PASSWORD_DEFAULT)
			));
		}catch (Exception $e) {
			echo $e;
		}
	}
	
	public function isAdmin($user){
		try {
			$statement = $this->db->prepare('SELECT * FROM user WHERE username = :username'); 
			$statement->execute(array(
				':username' => $user
			));
			$resultado = $statement->fetch();
			return $resultado['admin'];
		} catch (Exception $e) {
			echo $e;
		}
		
	}

	
	public function getEmailByUsername($username){
		try{
			$statement = $this->db->prepare('SELECT email FROM user WHERE username=:username');
			$statement->execute(array(
				':username'=>$username
			));
			$resultado = $statement->fetch();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function getFullNameByUsername($username){
		try{
			$statement = $this->db->prepare('SELECT firstName, lastName FROM user WHERE username=:username');
			$statement->execute(array(
				':username'=>$username
			));
			$resultado = $statement->fetch();
			return $resultado;
		}catch(Exception $e){
			echo $e;
		}
	}
}