<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }  
      else if(empty($_POST["un"]))  
      {  
           $error = "<label class='text-danger'>Enter a username</label>";  
      }  
      else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Enter a password</label>";  
      }
      else if(empty($_POST["Cpass"]))  
      {  
           $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
      } 
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Gender cannot be empty</label>";  
      } 
       
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],  
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Registration Form</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style type='text/css'>
    fieldset {
  font-size:15px;
  padding:15px;
  width:350px;
  line-height:2;}
  </style>
      </head>  
      <body>  
            <br />  
            <div class="container" style="width:500px;">  
               <fieldset> 
               <legend><b>REGISTRATION</b> </legend>               
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>   
                     <label>Name:</label>  
                     <input type="text" name="name" class="form-control" /><hr>  
                     <label>E-mail:</label>
                     <input type="text" name = "email" class="form-control" /><hr>
                     <label>User Name:</label>
                     <input type="text" name = "un" class="form-control" /><hr>
                     <label>Password:</label>
                     <input type="password" name = "pass" class="form-control" /><hr>
                     <label>Confirm Password:</label>
                     <input type="password" name = "Cpass" class="form-control" /><hr>

                    <fieldset>
                    <legend><b>Gender:</b></legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label><hr>
                    </fieldset>

                    <fieldset>
                     <legend><b>Date of Birth:</b></legend>
                     <input type="date" name="dob"> <br><br>
                    </fieldset> 
                     
                     <input type="submit" name="submit" value="Submit" >
                     
                    <form action="<? echo $PHP_SELF; ?>" method="POST">
                    <input type="hidden" name="reset" value="RESET">
                    <input type="submit"  value="RESET"></form

                    <?php
                     if ($_POST["reset"] =="RESET"){
                     echo '<META http-equiv="refresh" content="0;URL=http://localhost:8081/PHP/Lab%20Task%203/JSON_PHP/store.php">';
                    }
                    ?> 
                <br />                    
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>
          </fieldset>  
     </div>
          <br />
      </body> 
 </html>  