
  
    <?php
    
      require_once 'config.php';
      require_once 'connection.php';
      use \LoginRadiusSDK\CustomerRegistration\Authentication\PhoneAuthenticationAPI;
      use \LoginRadiusSDK\CustomerRegistration\Account\SottAPI;
      if (isset($_POST['submit'])) {

        $phoneAuthenticationAPI = new PhoneAuthenticationAPI(); 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password= $_POST['password'];
        $phoneid = $_POST['phone'];
        $token= 'Tx009sCi+XpLP2PojXLg3/i+athwi2b4NgFLpppxHi8oOk8MtHGkypQNmANy800CgrE2H7E9a2+S7QXacW+RBbitiwPKPnCaPJvLa9VF5r0=*0901ac965ca48e0d80b8de22a48c7856 ';
        
       
        $payload = array(
          "firstName" => $firstname,
           "lastName" => $lastname,
           "password" => $password,
           "phoneId" => $phoneid,
           "Email" => array(array("Type" => "Primary", "Value" => $email))
      );//Required
          $sott = $token; //Required
          $fields = null; //Optional
          $options = "options"; //Optional
          $smsTemplate = "smsTemplate"; //Optional
          $verificationUrl = "verificationUrl"; //Optional
          $welcomeEmailTemplate = "welcomeEmailTemplate"; //Optional
          
          $result = $phoneAuthenticationAPI->userRegistrationByPhone($payload,$sott,$fields,$options,$smsTemplate,$verificationUrl,$welcomeEmailTemplate);
          if($result){
            echo "<pre>"; print_r($result); 
           //echo "registration successful";

            exit();
    } else {
        echo 'Unable to send verification code';
    }
          }
    ?>
