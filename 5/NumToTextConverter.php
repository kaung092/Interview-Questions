<?php         
//This file is hostsed on different server. (www.kaunghtet.net/temp/NumToTextConverter.php)

header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

include $_SERVER['DOCUMENT_ROOT']."/temp/DAO.php";

$num = $_POST["userInput"];

$result=null;                                                                                       
if($num%3==0  && $num%5==0){
	$result = "Bisnow Meida";
}           
else if($num%3==0){
	$result = "Bisnow";
}           
else if($num%5==0){
	$result = "Media";
}           

// - Save the user’s input to a MySQL tracking table
ob_start();
$dao = new MyDAO();
$dao->logInput($num);
ob_end_clean();

echo json_encode($result);


?>
