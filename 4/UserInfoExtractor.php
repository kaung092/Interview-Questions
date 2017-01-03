<?php

class UserInfoExtractor{

	var $line;

	var $email;
	var $address;
	var $name;

	function __construct($line)
	{
		$this->line = $line;

		$this->phone = $this->extractPhone();
		$this->email = $this->extractEmail();
		
		$this->address = $this->extractAddress();
		$this->name = $this->extractName();
		
	}

	function extractPhone(){

		preg_match('/[\d]{3}[().\-\s]*[\d]{3}[().\-\s]*[\d]{4}/',$this->line,$tempPhone);
		//remove phone from string
		$this->line = str_replace($tempPhone[0],'',$this->line);
		//Extract only Numbers
		$phone = preg_replace('%[()\.\-\s]*%','',$tempPhone[0]);

		//Format Phone Number
		$phone = substr($phone, 0, 3) . '-' .  substr($phone, 3, 3) . '-' . substr($phone, 6);

		if($phone == null || strlen($phone)!=12){
			return null;
		}

		return $phone;
	}

	function extractEmail(){
		preg_match('/[^\s]*@[^\s^\n]*/',$this->line,$email);
		//remove Email from string
		$this->line = str_replace($email[0],'',$this->line);
		return $email[0];
	}

	function extractAddress(){
		preg_match('/[\dA-Za-z].*[,\s].*[A-Za-z\d].*[,\s].*[A-Z]{2}[\s]*[\d]{5}/',$this->line,$address);
		
		//remove address from string
		$this->line = str_replace($address[0],'',$this->line);
		return $address[0];
	}

	function extractName(){
		//find name

		preg_match('/[A-Z][^\d^\s]+[\s]+[A-Z][^\d^\s]+/',$this->line,$name);

		if( isset($name[0]) == false){
			//remove the name from address line
			preg_match('/[A-Z][^\d^\s]+[\s]+[A-Z][^\d^\s]+/',$this->address,$name);
			$this->address =  str_replace($name[0],'',$this->address);
		}

		//remove name from string
		$this->line = str_replace($name[0],'',$this->line);
		return $name[0];
	}

	function getName(){return $this->name;}
	function getEmail(){return $this->email;}
	function getPhone(){return $this->phone;}
	function getAddress(){return $this->address;}


}


?>


