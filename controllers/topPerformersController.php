<?php

require('../models/topPerformersModel.php');

  class topPerformersController extends topPerformersModel {
    private $usersAndScores;
    private $usersAndInvestments;
    private $usersAndCommenters;

    function topPerformersController(){
      $topPerformersModel = new topPerformersModel();
      $usersAndScores = $topPerformersModel->getRankedUsersAndScores(0);
      $usersAndInvestments = $topPerformersModel->getRankedUsersAndScores(1);
      $usersAndCommenters = $topPerformersModel->getRankedUsersAndScores(2);
      
      $this->usersAndScores = $usersAndScores;
      $this->usersAndInvestments = $usersAndInvestments;
      $this->usersAndCommenters = $usersAndCommenters;
    }

    function getRankedUsersAndScoresC(){
      return $this->usersAndScores;
    }

    function getRankedUsersAndInvestmentsC(){
      return $this->usersAndInvestments;
    }

    function getRankedUsersAndCommentersC(){
      return $this->usersAndCommenters;
    }

  }

  $tpc = new topPerformersController();
  $tpc->topPerformersController(); 
?>