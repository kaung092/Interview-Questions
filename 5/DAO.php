<?php         

class MyDAO 
{
	var $db;
	function __construct()
	{
		try{
			$this->db = new PDO('sqlite:myDB.db');
		}
		catch(PDOException $e){
			echo $e;
		}
	}

	function logInput($input){
		try{
			$input = filter_var ( $input, FILTER_SANITIZE_NUMBER_INT);
			$query = "INSERT INTO Tracking_Table (INPUT) VALUES ('{$input}')";
			$ret = $this->db->exec($query);
		}
		catch(Exception $e){
			echo $e;
		}
	}

	function showLog(){
		try{
			$query = "SELECT * FROM Tracking_Table";
			$ret = $this->db->query($query);
			foreach($ret as $r){
				echo $r['INPUT']."\n";	
			}
		}
		catch(Exception $e){
			echo $e;
		}
	}
}

?>
              
