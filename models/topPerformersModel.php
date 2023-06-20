<?php

require('db.php');

  class topPerformersModel extends Connect {
    function getRankedUsersAndScores($index){
      $scoresAssoc = $this->select_as_assoc($this->get_connection(), 'scores');
      $scoresArr = array_values($scoresAssoc);
    
      $usersAssoc = $this->select_as_assoc($this->get_connection(), 'users');
      $usersArr = array_values($usersAssoc);

      $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
      $commentsArr = array_values($commentsAssoc);

      
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $questionsArr = array_values($questionsAssoc);
      
      $userAndScore=[];
      for($i = 0 ; $i < count($usersArr); $i++){ 
        array_push($userAndScore, ['']);  
      }

      $ccs=[];
      for($i = 0 ; $i < count($questionsArr); $i++){ 
        $decodedString = htmlspecialchars_decode($questionsArr[$i]['comment'], ENT_QUOTES);
        array_push($ccs, $decodedString);  
      }

      file_put_contents("../JSON/questions.js", json_encode($ccs));

      $score=[];    
      $comments=[];    
      $user=[];
      $currentUser=$_SESSION['u_id'];
      $currentUserCourseScores=[];
      $userScores = [];
      $investments = [];
    
      for($i = 0 ; $i < count($usersArr); $i++){ 
        array_push($user, $usersArr[$i]['email']);  
        array_push($investments, $usersArr[$i]['investments']); 
        $currentScore=0; 
        $currentComment=0; 
        for($i2 = 0 ; $i2 < count($scoresArr); $i2++){
          if($usersArr[$i]['u_id']==$scoresArr[$i2]['u_id']){
            $currentScore += $scoresArr[$i2]['score'];     
          }
        }  

        for($i3 = 0 ; $i3 < count($commentsArr); $i3++){
          if($usersArr[$i]['u_id']==$commentsArr[$i3]['u_id']){
            $currentComment++;     
          }
        }

        array_push($score, $currentScore);
        array_push($comments, $currentComment);
        
        if($usersArr[$i]['u_id']==$_SESSION['u_id']){
          array_push($userScores, [$user[$i], $score[$i], $investments[$i]]);
        }
      }
    
      $temp=[];
    
      file_put_contents("../JSON/userScores.json", json_encode($userScores));

      if($index==0){
        array_multisort($score, SORT_DESC, SORT_REGULAR, $user);
        return [$user, $score];
      } else if($index == 1){
        array_multisort($investments, SORT_DESC, SORT_REGULAR, $user);
        return [$user, $investments];
      } else if($index == 2){
        array_multisort($comments, SORT_DESC, SORT_REGULAR, $user);
        return [$user, $comments];
      }

    }
 }
?>