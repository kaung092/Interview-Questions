<?php

include "User.php";
include "UserInfoExtractor.php";

$userDAO = new User();

readTextFile($userDAO);
$userDAO->showUsers();


function readTextFile($userDAO){

	$file = fopen("textparse_exercise.txt","r");
	while(! feof($file))
	{
		$line = fgets($file);

		if($line && $line !='' && $line!="\n"){
			
			$extractor = new UserInfoExtractor($line);

			
			$email = $extractor->getEmail()."\n";	
			$phone = $extractor->getPhone()."\n";			
			$address = $extractor->getAddress()."\n";
			$name = $extractor->getName();

			$userDAO->insertUser($name,$email,$phone,$address);

	   }
	}
	fclose($file);
}



?>


