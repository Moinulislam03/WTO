<?php
       session_start();
      require("../Model/Reg.php");
      require("../Model/CPass.php");

    $currErr= $reErr = "";
    $currPass = $Newpass = $Repass = "";

    if(isset($_POST['sub'])){
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
        $currPass = $_POST['curr'];
        $Newpass = $_POST['new'];
        $Repass = $_POST['re'];
        if(empty($_POST["pass"])){
     $passErr = "* password is required";

     }
     else if(strlen($_POST['pass']) < 8)
        {
        $passErr = "* Password must be at least 8 characters ";
        }
        else if(!(str_contains($_POST['pass'], '@') === true or str_contains($_POST['pass'], '$') === true or str_contains($_POST['pass'], '%') === true or str_contains($_POST['pass'], '#') === true))
        {
            $passErr = "* Password must be contain at least one of the special characters ";
            
        }
        if($currPass == $Newpass){
          $currErr = ' New Password should not be same as the Current Password';
        }elseif ($Newpass != $Repass) {
          $reErr = 'New Password must match with the Retyped Password';
        }
        if(!$err){
        $data['password'] = $_POST['pass'];
        
          if (updatepatient($data)) {
          
          header("location: ../Login.php");
        } 
      }
           
          
        }
      }
    
          
    ?>