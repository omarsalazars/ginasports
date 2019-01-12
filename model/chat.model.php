<?php

require_once('db/db.php');

class ChatModel
{
	
	private $db;

	public function __construct(){
		$this->db=Connection::createConnection();
	}

	public function getUserChat($username){
		try{	
			$query = "SELECT * FROM chat WHERE sender = :username OR receiver = :username";
	        $stmt = $this->db->prepare($query);
	        $stmt->execute(array(
	        	':username' => $username
	        ));
	        return $stmt;
		}catch(Exception $e){
			echo $e;
		}
		
	}

	public function addMessage($sender,$receiver,$message){
		try{
			$statement = $this->db->prepare('INSERT INTO chat (sender,receiver,message,date) VALUES (:sender, :receiver, :message, :date);');
			$statement->execute(array(
				':sender' => $sender,
				':receiver' => $receiver,
				':message' => $message,
				':date' =>  date("Y-m-d H:i:s")
			));
		}catch(Exception $e){
			echo $e;
		}

	}
}

?>