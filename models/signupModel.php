<?php
ob_start();
require('db.php');
class signupModel extends Connect
{
  function signup($usernamePOST, $passwordPOST, $confirmPasswordPOST)
  {
    $email = $usernamePOST;
    $password = $passwordPOST;
    $confirmPassword = $confirmPasswordPOST;
    
    $email = htmlspecialchars($email, ENT_QUOTES);
    $password = htmlspecialchars($password, ENT_QUOTES);
    $confirmPassword = htmlspecialchars($confirmPassword, ENT_QUOTES);
    
    $usersAssoc = $this->select_as_assoc($this->get_connection(), 'users');
    $userAlreadyExists = 0;

    if (empty($email) || empty($password) || empty($confirmPassword)) {
      header("Location:../views/signup.php?error=All fields required");
      exit;
    } else {
      if ($password == $confirmPassword) {
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        for ($i = 0; $i < count($usersAssoc); $i++) {
          if ($usersAssoc[$i]['email'] == $email) {
            $userAlreadyExists = 1;
          }
        }

        if ($userAlreadyExists == 0) {
          $userFields = "email, password";
          $userValues = "'$email', '$password'";

          $this->insert($this->get_connection(), 'users', $userFields, $userValues);

          header("Location: ../views/login.php");
          exit;
        } else {
          header('Location:../views/signup.php?error=Username taken');
          exit;
        }
      } else {
        header('Location:../views/signup.php?error=Passwords do not match');
        exit;
      }
    }
  }
}

?>