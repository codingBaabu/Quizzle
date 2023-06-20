<?php 
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  session_start();

  require('../models/loginModel.php');
  
  class loginController extends loginModel {
    function loginController(){
      if (isset($_POST['submit'])) {
        $loginModel = new loginModel();
        $loginModel->initErrors();

        $loginModel->empty_check($_POST['email'], 'email', -1);
        $loginModel->empty_check($_POST['password'], 'password', -1);

        if (empty($loginModel->get_errors()['email']) && empty( $loginModel->get_errors()['password'])) {
          $loginModel->update($_POST['email'], $_POST['password']);
        }
      }
    }
  }

$loginController = new loginController();
$loginController->loginController();
?>

