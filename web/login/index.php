<?php


//check session
if (!isset($_SESSION)) {
    session_start();
}
require("../backend.php");
$db = new Db();


if(isset($_POST['submit'])){
   
   //$name = mysqli_real_escape_string($db->getConn, $_POST['']);
   $email = mysqli_real_escape_string($db->getConn(), $_POST['email']); // Good practice to use mysqli_real_escape_string!
   $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $db->runQueryWithReturn($query);
    $rows = $db->getRows($result);

    if (count($rows) == 1) {
        $hash = $rows[0]['password'];
        if (password_verify($pass, $hash)) {
            $_SESSION['user'] = $email;
                        //redirect by role
            $_SESSION['role'] = $rows[0]['role'];
            //session user id
            $_SESSION['id'] = $rows[0]['id'];
            redirect($_SESSION['role']);
        } else {
            $error[] = 'incorrect email or password!';
        }
    } else {
        $error[] = 'incorrect email or password!';
    }
}

//function redirect by role
function redirect($role){
    //switch case
    switch($role){
        case 'reader':
            header('location:../main-casopis.html');
            break;
        case 'admin':
            header('location:../sprava/sprava.html');
            break;
        case 'editor':
            header('location:../main-clanky.php');
            break;
        case 'author':
            header('location:../gallery.php?author=' . $_SESSION['id']);
            break;
        case 'reviewer':
            header('location: ../main-review.php');
            break;
        default:
            //debug

            $error[] = 'incorrect email or password!';
    }
}

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

   <form action="index.php" method="post" style="background-color:#11A2F4">
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
