<?php         
//This file is hostsed on different server. (www.kaunghtet.net/temp/NumToTextConverter.php)

  header("Access-Control-Allow-Origin: *");
  header('content-type: application/json; charset=utf-8');
              
  $num = $_POST['userInput'];
              
// - If input is a multiple of three, return “Bisnow”
// - If input is a multiple of five, return “Media”
// - If input is a multiple of three and five, return “Bisnow Media“
// - Save the user’s input to a MySQL tracking table
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
              
  echo json_encode($result);
              
