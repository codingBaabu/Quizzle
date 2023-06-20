<?php
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);

    session_start();
    
    require('../models/addQuestionModel.php');

    class addQuestionController extends addQuestionModel {
        function init(){
          $aqm = new addQuestionModel();
          
          $aqm->addQuestionRow();
          $aqm->addAnswerRow();

          $aqm->incrementInvestment();
  
          header("Location: ../views/week-select.php");
        }
    }

    $addQuestionController = new addQuestionController();
    $addQuestionController->init();
?>

