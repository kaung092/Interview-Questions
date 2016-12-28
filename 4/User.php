<?php

class MyDB extends SQLite3
{
  function __construct()
  {
     $this->open('myDB.db');
     
  }
}


class User{

	var $db;
	var $color;

	function __construct()
	{
		$this->db = new MyDB();
		if(!$this->db){
		  echo $this->db->lastErrorMsg();
		} else {
		  echo "Opened database successfully\n";
		}
		$this->createTable();
	}

	private function createTable(){
		$sql =<<<EOF
		      CREATE TABLE USER
		      (ID INTEGER PRIMARY KEY    AUTOINCREMENT,
		      NAME           TEXT    NOT NULL,
		      EMAIL          TEXT     NOT NULL,
		      ADDRESS        CHAR(50),
		      PHONE         TEXT);
EOF;

		$ret = $this->db->exec($sql);
		if(!$ret){
		  echo $this->db->lastErrorMsg();
		} else {
		  echo "Table created successfully\n";
		}

	}

	public function insertUser($name,$email,$phone,$address){

		$name = $this->db->escapeString($name);
		$email = $this->db->escapeString($email);
		$phone = $this->db->escapeString($phone);
		$address = $this->db->escapeString($address);

	   //$query = "INSERT INTO USER (NAME,EMAIL,PHONE,ADDRESS) VALUES ('".$name."', '".$email."', '".$phone."', '".$address."' )";
	   $query = "INSERT INTO USER (NAME,EMAIL,PHONE,ADDRESS) VALUES ('{$name}','{$email}','{$phone}','{$address}')";

	   $ret = $this->db->exec($query);
	   if(!$ret){
	      echo $this->db->lastErrorMsg();
	   } else {
	      echo "User inserted successfully\n";
	   }

	}

	public function showUsers(){

		$sql= "SELECT * FROM USER";
		$ret = $this->db->query($sql);
	   if(!$ret){
	      echo $this->db->lastErrorMsg();
	   	} else {
	   			
	            while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	            	echo "---------------------------------------\n";
			      echo "ID:\t\t".$row['ID'] . "\n";
			      echo "NAME:\t\t".$row['NAME'] ."\n";
			      echo "EMAIL:\t\t".$row['EMAIL'] ."\n";
			      echo "ADDRESS:\t".$row['ADDRESS'] ."\n";
			      echo "PHONE\t\t".$row['PHONE'] ."\n";
			   }
			  
	   }
	}
	
}


?>


