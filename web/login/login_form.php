<?php


require("../backend.php");
$db = new Db();


if(isset($_POST['submit'])){
   
   //$name = mysqli_real_escape_string($db->getConn, $_POST['']);
   $email = mysqli_real_escape_string($db->getConn(), $_POST['email']);
   $pass = md5($_POST['password']);
   //$cpass = md5($_POST['cpassword']);
   //$role = $_POST['role'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($db->getConn(), $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
$dotaz = " SELECT role FROM users WHERE email = '$email' && password = '$pass' ";
//var_dump($dotaz);
$res = $db->runQueryWithReturn($dotaz);
$res = $res->fetch_assoc();
      if($res['role'] == 'admin'){

         $_SESSION['email'] = $row['email'];
         header('location:../sprava/sprava.html');

      }elseif($res['role']){

         $_SESSION['email'] = $row['email'];
         header('location:../1_uživatel/main-casopis.html');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>