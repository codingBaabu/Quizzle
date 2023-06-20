<?php
  require('db.php');

  class scoreModel extends Connect {
    
    function insertComment($commentPOST, $qidPOST){
      $comment = $commentPOST;
      $userID = $_SESSION['u_id'];
      $q_id = $qidPOST;
      $currentDate = date("Y-m-d");
        
      $comment = htmlspecialchars($comment, ENT_QUOTES);

      $commentFields = "comment, q_id, u_id, date";
      $commentValues = "'$comment', $q_id, $userID, '$currentDate'";
    
      if(!empty($comment)){
        $this->insert($this->get_connection(), 'comments', $commentFields, $commentValues);
      } 
    }
    
    function insertScore($scoreNamePOST){
      $scoreFromQuizzle = $scoreNamePOST;
      $course = $_SESSION["course"];
      $userID = $_SESSION['u_id'];
      $c_id = $_SESSION['c_id'];
    
      $fields = "score, c_id, u_id";
      $values = "'$scoreFromQuizzle', '$c_id', '$userID'";
    
      $scoresAssoc = $this->select_as_assoc($this->get_connection(), 'scores');
      $scoresArr = array_values($scoresAssoc);
      
      $foundOne=0;
      for($i = 0 ; $i < count($scoresArr); $i++){ 
        if(isset($_SESSION['c_id'])){
          if($_SESSION['c_id'] == $scoresArr[$i]['c_id'] && $_SESSION['u_id'] == $scoresArr[$i]['u_id']){
            $foundMatchingCID = $scoresArr[$i]['c_id'];
            $foundMatchingUID = $scoresArr[$i]['u_id'];
    
            $this->insert_where_multiple($this->get_connection(), 'scores', 'score', $scoreFromQuizzle, 'u_id', "$foundMatchingUID", 'c_id', "$foundMatchingCID");
            
            $foundOne=1;
            break;
          } 
        } 
      }
      if($foundOne == 0){
        $this->insert($this->get_connection(), 'scores', $fields, $values);
      }
    }

    function insertVote($votePOST, $qidPOST, $voteChoicePOST, $qorc, $commID, $doCalc){
      $vote = $votePOST;
      $q_id = $qidPOST;
      $voteChoice = $voteChoicePOST;
    
      if($doCalc==1){
        $this->toggleVoted($q_id, $vote, $voteChoice, $qorc, $commID);
      }

        $this->deleteQorC($q_id, $qorc, $vote, $commID);
        $this->setQuestions($q_id, $qorc, $vote, $commID);
        $this->setAnswers();

    }

    function toggleVoted($q_id, $vote, $voteChoice, $qorc, $commID){
      $u_id = $_SESSION['u_id'];

      if($qorc==0){
        $votedAssoc = $this->select_as_assoc($this->get_connection(), 'voted');
      } else if($qorc==1){
        $votedAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
      }

      $votedArr = array_values($votedAssoc);
      
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $questionsArr = array_values($questionsAssoc);
      $voteInc=0;

      $votePass = $vote;

      $recordFound=0;
      $count=0;
      
      for($i = 0 ; $i < count($votedArr); $i++){ 
        //RECORD FOUND
        
        if($votedArr[$i]['q_id']==$q_id && $votedArr[$i]['u_id']==$_SESSION['u_id']){
          
          if(($qorc==1 && $votedArr[$i]['comm_id']==$commID && $votedArr[$i]['u_id']==$_SESSION['u_id'])){
            
            $recordFound=1;

            $this->updateMultipleDB($this->get_connection(), 'votedcomments', 'voted', "$voteChoice", 'comm_id', "$commID", 'u_id', $u_id);     
            $this->updateDB($this->get_connection(), 'comments', 'votes', "$votePass", 'comm_id', "$commID");      

            $this->getIfVotedComments();

          } else if($qorc==0){

            $recordFound=1;

            $this->updateMultipleDB($this->get_connection(), 'voted', 'voted', "$voteChoice", 'q_id', "$q_id", 'u_id', "$u_id");     
            $this->updateDB($this->get_connection(), 'questions', 'votes', "$votePass", 'q_id', "$q_id");      
          }        
        }
      }

      //RECORD NOT FOUND
      if($recordFound==0 && $qorc==0){
        $u_id = $_SESSION['u_id'];
        $fields = "voted, q_id, u_id";
        $values = "'1', '$q_id', '$u_id'";
      
        $this->insert($this->get_connection(), 'voted', $fields, $values);

        $this->getIfVoted();
      }
    }
    
    function setQuestions($q_id, $qorc, $vote, $commID){
      
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $coursesAssoc = $this->select_as_assoc($this->get_connection(), 'courses');
      $answersAssoc = $this->select_as_assoc($this->get_connection(), 'answers');
      $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
      $votedAssoc = $this->select_as_assoc($this->get_connection(), 'voted');
      
      $commentsArr = array_values($commentsAssoc);
      $votedArr = array_values($votedAssoc);
      $questionsArr = array_values($questionsAssoc);
      $answersArr = array_values($answersAssoc);
      $coursesArr = array_values($coursesAssoc);
  
      $selectedCourse=1;
      $questions=[];
      
      for($i = 0 ; $i < count($coursesArr); $i++){ 
        if(isset($_SESSION['course'])){
          if($_SESSION['course'] == $coursesArr[$i]['name']){
            $selectedCourse=$coursesArr[$i]['c_id'];
          } 
        } 
      }
      $temp=[];
      for($i = 0 ; $i < count($questionsArr); $i++){
        if($questionsArr[$i]['c_id']==$selectedCourse){
          $temp[0]= $questionsArr[$i]['q_id'];

          $temp[1]= $questionsArr[$i]['questions'];
          $temp[1]= htmlspecialchars_decode($temp[1], ENT_QUOTES);

          $temp[2]= $questionsArr[$i]['comment'];
          $temp[2]= htmlspecialchars_decode($temp[2], ENT_QUOTES);

          $temp[3]= $questionsArr[$i]['votes'];
          
          array_push($questions, $temp);  
        }
      }

      file_put_contents("../JSON/questions.js", json_encode($questions));
    }

    function setAnswers(){
      $answersAssoc = $this->select_as_assoc($this->get_connection(), 'answers');
      $answersArr = array_values($answersAssoc);
      $temp = [];
      $answers=[];
      $coursesAssoc = $this->select_as_assoc($this->get_connection(), 'courses');
      $coursesArr = array_values($coursesAssoc);

      for($i = 0 ; $i < count($coursesArr); $i++){ 
        if(isset($_SESSION['course'])){
          if($_SESSION['course'] == $coursesArr[$i]['name']){
            $selectedCourse=$coursesArr[$i]['c_id'];
          } 
        } 
      }

      for($i=0 ; $i<sizeof($answersArr) ; $i++){
        if($answersArr[$i]['c_id']==$selectedCourse){
          $temp[0] = $answersArr[$i]['q_id'];
          $temp[1] = $answersArr[$i]['right_answer_index'];
          $temp[2] = $answersArr[$i]['answers'];
          $temp[2] = htmlspecialchars_decode($temp[2], ENT_QUOTES);
        
          array_push($answers, $temp);        
        }
      }
        
      file_put_contents("../JSON/pass.json", json_encode($answers));     
      return json_encode($answers);
    }

    function deleteQorC($q_id, $qorc, $vote, $commID){
      $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
      $coursesAssoc = $this->select_as_assoc($this->get_connection(), 'courses');
      $answersAssoc = $this->select_as_assoc($this->get_connection(), 'answers');
      $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
      $votedAssoc = $this->select_as_assoc($this->get_connection(), 'voted');
      $votedCommentsAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
      
      $commentsArr = array_values($commentsAssoc);
      $votedArr = array_values($votedAssoc);
      $votedCommentsArr = array_values($votedCommentsAssoc);
      $questionsArr = array_values($questionsAssoc);
      $answersArr = array_values($answersAssoc);
      $coursesArr = array_values($coursesAssoc);
      
      if($vote <=-5){
        if($qorc == 0){
          for($i = 0 ; $i < count($answersArr); $i++){
            if($answersArr[$i]['q_id'] == $q_id){
              $this->delete_where($this->get_connection(), 'answers', 'q_id', "$q_id");  
            }
          }

          for($i = 0 ; $i < count($votedArr); $i++){
            if($votedArr[$i]['q_id'] == $q_id){
              $this->delete_where($this->get_connection(), 'voted', 'q_id', "$q_id");  
            }
          }        

          for($i = 0 ; $i < count($votedCommentsArr); $i++){
            if($votedCommentsArr[$i]['q_id'] == $q_id){
              $this->delete_where($this->get_connection(), 'votedComments', 'q_id', "$q_id");  
            }
          }    

          for($i = 0 ; $i < count($commentsArr); $i++){
            if($commentsArr[$i]['q_id'] == $q_id){
              $this->delete_where($this->get_connection(), 'comments', 'q_id', "$q_id");  
            }
          }

        
          for($i = 0 ; $i < count($questionsArr); $i++){
            if($questionsArr[$i]['q_id'] == $q_id){
              $this->delete_where($this->get_connection(), 'questions', 'q_id', "$q_id");  
            }
          }

        } else if($qorc == 1){
          for($i = 0 ; $i < count($votedCommentsArr); $i++){
            if($votedCommentsArr[$i]['comm_id'] == $commID){
              $this->delete_where($this->get_connection(), 'votedComments', 'comm_id', "$commID");  
            }
          }    
          
          for($i = 0 ; $i < count($commentsArr); $i++){
            if($commentsArr[$i]['comm_id'] == $commID){
              $this->delete_where($this->get_connection(), 'comments', 'comm_id', "$commID");  
            }
          }
        }
      }
    }

    function getIfVoted(){
      $votedAssoc = $this->select_as_assoc($this->get_connection(), 'voted');
      $votedArr = array_values($votedAssoc);
      $voted=[];

      $temp=[];
      for($i = 0 ; $i < count($votedArr); $i++){ 
          if($_SESSION['u_id'] == $votedArr[$i]['u_id']){

            $temp[0]= $votedArr[$i]['voted'];
            $temp[1]= $votedArr[$i]['q_id'];
          
            array_push($voted, $temp);  
          } 
      }
     
      file_put_contents("../JSON/voted.js", json_encode($voted));
      return json_encode($voted);
    }

    function getIfVotedComments(){
      $commentAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
      $commentArr = array_values($commentAssoc);
      $voted=[];

      $temp=[];
      for($i = 0 ; $i < count($commentArr); $i++){ 
          if($_SESSION['u_id'] == $commentArr[$i]['u_id']){

            $temp[0]= $commentArr[$i]['voted'];
            $temp[1]= $commentArr[$i]['comm_id'];
          
            array_push($voted, $temp);  
          } 
      }
     
      file_put_contents("../JSON/votedComment.js", json_encode($voted));
      return json_encode($voted);
    }
 }  
?>