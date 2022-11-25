<?php

require("../backend.php");
$db = new Db();

if(isset($_POST['submit'])){

   $name = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $email =  $_POST['email'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $type = 'user';
   

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";
   $result = $db->runQueryWithReturn($select);
   if($db->countRows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
       // $query = "INSERT INTO users (firstname, lastname, email, role, password) VALUES ('" . $name . "','" . $lname . "', '" . $email . '", "' . $type . "',  '" .$pass . "')";
         $query = "INSERT INTO users (firstname, lastname, email, role, password) VALUES ('" . $name . "','" . $lname . "', '" .
      $email . "', '" .
      $type . "', '" .
      $pass . "')";
     
      
      

    $db->runQuery($query);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="firstname" required placeholder="enter your name">
      <input type="text" name="lastname" required placeholder="enter your surname">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>