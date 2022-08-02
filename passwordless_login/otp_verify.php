<?php
   session_start();
   require_once 'config.php';
   use \LoginRadiusSDK\CustomerRegistration\Authentication\PasswordLessLoginAPI;
  if (isset($_POST['submit'])) {
    $passwordLessLoginAPI = new PasswordLessLoginAPI();
  $otp= $_POST['otp'];
  $phoneid = $_SESSION['phone']; 
  $payload = array(
    "otp" =>$otp,
    "phone" => $phoneid,
    ) ; //Required 
    $fields = null; //Optional 
    $smsTemplate = "smsTemplate"; //Optional
    
    $result = $passwordLessLoginAPI->passwordlessLoginPhoneVerification($payload,$fields,$smsTemplate);
    if($result){
      
    //echo json_decode($result);
    $res = json_decode($result);

$phoneVerified = $res["Profile"]["PhoneIdVerified"];

if($phoneVerified){
header("location:homepage.php?");
}
else{
      echo "invalid otp"; 
    }
  }
}
    
    
  
?>