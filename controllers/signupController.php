<?php
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);

  session_start();

  require('../models/signupModel.php');

  class signupController extends signupModel {
    function signupController(){
      $signupModel = new signupModel();
      $signupModel->signup($_POST['email'], $_POST['password'], $_POST['confirm-password']);
    }
  }

  $signupController = new signupController();
  $signupController->signupController();
?>