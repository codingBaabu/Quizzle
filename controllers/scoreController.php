<?php
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  session_start();
  
  require('../models/scoreModel.php');
  require('./commentController.php');
  class scoreController extends scoreModel {
    function sc(){
      $scoreModel = new scoreModel();
      $scoreModel->getIfVoted();
      $scoreModel->getIfVotedComments();
      
      $scoreModel->insertComment($_POST['comment'], $_POST['q_id']);
      $scoreModel->insertScore($_POST["scoreHiddenName"]);

      $scoreModel->insertVote($_POST["q_votes"], $_POST['q_id'], $_POST['vote'],      0, $_POST['commID'], $_POST['doCalc']);
      
      if($_POST["doCalcComment"] == 1){
        for($i = 0 ; $i < $_POST['cLength'] ; $i++){
          $scoreModel->insertVote(
            $_POST["votes$i"], 
            $_POST["q_id"], 
            $_POST["voted$i"],    
            1, 
            $_POST["comm$i"], 
            $_POST["doCalcComment"]);
        }  
      }
    }
 }

 $scoreController = new scoreController();
 $scoreController->sc();
?>