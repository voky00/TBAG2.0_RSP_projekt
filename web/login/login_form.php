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

      }elseif($res['role']== 'user'){

         $_SESSION['email'] = $row['email'];
         header('location:../1_uživatel/main-casopis.html');

      }elseif($res['role']== 'autor'){

         $_SESSION['email'] = $row['email'];
         header('location:../2_autor/main-casopis.html');

      }elseif($res['role']== 'recenzent'){

         $_SESSION['email'] = $row['email'];
         header('location:../3_recenzent/main-casopis.html');

      }elseif($res['role']== 'redaktor'){

         $_SESSION['email'] = $row['email'];
         header('location:../4_redaktor/main-casopis.html');

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
   <title>Přihlásit se</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:#33475b">
   
<div class="form-container">

   <form action="" method="post" style="background-color:#11A2F4">
      <h3 style="background-color:#11A2F4">Přihlásit se</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Zadejte email">
      <input type="password" name="password" required placeholder="Zadejte heslo">
      <input type="submit" name="submit" value="přihlásit se" class="form-btn" style="background-color:#11F4DF">
      <p style="background-color:#11A2F4">Nemáte účet? <a href="register_form.php" style="background-color:#11A2F4">zaregistrovat se</a></p>
   </form>

</div>

</body>
</html>