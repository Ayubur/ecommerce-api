<?php

class Database{

	//specify own database

	private $host ="localhost";
	private $user ="root";
	private $password ="";
	private $db_name ="api_db";

	private $conn;

	//get the database connection

	public function getConnection(){

		$this->conn = null;

		try{
			$this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db_name);

		}catch(Exception $ex){

			echo "Connection Error".$ex->getMessage();
		}

		return $this->conn;
	}


}