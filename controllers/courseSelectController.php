<?php 
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);

  session_start();

require('../models/courseSelectModel.php');
  class courseSelectController extends courseSelectModel {
    function init(){
      $courseSelectModel = new courseSelectModel();
      $courseSelectModel->setCourse($_POST['course']);
    }
  }

  $courseSelectController = new courseSelectController();
  $courseSelectController->init();

?>