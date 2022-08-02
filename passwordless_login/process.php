<?php
      session_start();
      require_once 'config.php';
      use \LoginRadiusSDK\CustomerRegistration\Authentication\PasswordLessLoginAPI;
      
      
      if (isset($_POST['submit'])) {
      $passwordLessLoginAPI = new PasswordLessLoginAPI();
       $phone_number = $_POST['phone'];
       $phone = $phone_number; //Required 
       $smsTemplate = "smsTemplate"; //Optional
       
       $result = $passwordLessLoginAPI->passwordlessLoginByPhone($phone,$smsTemplate);
          if($result){
            $_SESSION['phone'] = $phone_number;
            header("location:otp.php");
            exit();
    } else {
        echo 'Unable to send verification code';
    }
          }
?>
 