<?php

require('../models/commentModel.php');

  class commentController extends commentModel {
    function init(){
      $commentModel = new commentModel();
      $commentModel->generateCommentsJSON();
      $commentModel->setVotedComment();
    }
  }

  $commentController = new commentController();
  $commentController->init();
?>