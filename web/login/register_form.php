<?php

require("../backend.php");
$db = new Db();

if(isset($_POST['submit'])){

   $name = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $email =  $_POST['email'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $type = "user";
   

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
   <title>Registrace</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" style="background-color:#11A2F4">
      <h3 style="background-color:#11A2F4">Zaregistrujte se!</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="firstname" required placeholder="Zadejte jméno">
      <input type="text" name="lastname" required placeholder="Zadejte příjmení">
      <input type="email" name="email" required placeholder="Zadejte email">
      <input type="password" name="password" required placeholder="Zadejte heslo">
      <input type="password" name="cpassword" required placeholder="Zadejte heslo znovu">
      <input type="submit" name="submit" value="Zaregistrovat se!" class="form-btn" style="background-color:#11F4DF">
      <p style="background-color:#11A2F4">Již máte účet? <a href="login_form.php" style="background-color:#11A2F4">Přihlásit se</a></p>
   </form>

</div>

</body>
</html>