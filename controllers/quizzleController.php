<?php
 
  require('../models/quizzleModel.php');
  require('../controllers/commentController.php');

  class quizzleController extends quizzleModel {
    function quizzleController(){
      $quizzleModel = new quizzleModel();

      $quizzleModel->getQuestions();
      $quizzleModel->getAnswers();
      $quizzleModel->getScores();
      $quizzleModel->setVoted();
      $quizzleModel->setVotedComments();
      $quizzleModel->getVotes();
      $quizzleModel->setVotePassing();
      $quizzleModel->getIfVoted();
      $quizzleModel->getIfVotedComment();
      
    }
  }

  $quizzleController = new quizzleController();
  $quizzleController->quizzleController();
   
?>