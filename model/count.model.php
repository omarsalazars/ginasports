<?php  
require_once("db/db.php");

class CountModel{

	private $db;

	public function __construct(){
		$this->db=Connection::createConnection();
	}

	public function getCount(){
		try{
			$statement = $this->db->prepare('SELECT * FROM views ORDER BY id DESC LIMIT 1');
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function getStats(){
		try{
			$statement = $this->db->prepare('SELECT * FROM views');
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;
		}catch(Exception $e){
			echo $e;
		}
	}

	public function increaseCount(){
		try{
			$statement = $this->db->prepare('INSERT INTO views (id) VALUES (null)');
			$statement->execute();

		}catch(Exception $e){
			echo $e;
		}
	}

}

?>