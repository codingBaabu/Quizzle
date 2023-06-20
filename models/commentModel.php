<?php

require_once('db.php');

  class commentModel extends Connect {
   function generateCommentsJSON(){
    $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
    $commentsArr = array_values($commentsAssoc);

    $usersAssoc = $this->select_as_assoc($this->get_connection(), 'users');
    $usersArr = array_values($usersAssoc);

    $courseComments=[];
    $temp=[];
    
    date_default_timezone_set('America/Guyana');

    for($i = 0 ; $i < count($commentsArr); $i++){ 
      if(isset($_SESSION['u_id'])){
          $temp[0] = $commentsArr[$i]['comment'];
          $temp[1] = $commentsArr[$i]['q_id'];

          for($i2 = 0 ; $i2 < count($usersArr) ; $i2++){
            if($usersArr[$i2]['u_id']==$commentsArr[$i]['u_id']){
              $temp[2] = $usersArr[$i2]['email'];         
            } 
          }
          $temp[3] = $this->time_elapsed_string($commentsArr[$i]['timestamp']);  
          $temp[4] = $commentsArr[$i]['comm_id'];  
          $temp[5] = $commentsArr[$i]['votes'];  
          
          array_push($courseComments, $temp);
      }
    }

    file_put_contents("../JSON/comments.json", json_encode($courseComments));
  }

  function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

  function setVotedComment(){
    $questionsAssoc = $this->select_as_assoc($this->get_connection(), 'questions');
    $questionsArr = array_values($questionsAssoc);

    $votedCommentsAssoc = $this->select_as_assoc($this->get_connection(), 'votedcomments');
    $votedCommentsArr = array_values($votedCommentsAssoc);

    $commentsAssoc = $this->select_as_assoc($this->get_connection(), 'comments');
    $commentsArr = array_values($commentsAssoc);

    $votedCommIDs=[];
        
    for($i = 0 ; $i < count($votedCommentsArr); $i++){
      array_push($votedCommIDs, $votedCommentsArr[$i]['comm_id']);
    }

    $q_id=0;
    $u_id = $_SESSION['u_id'];
    $commIDInsert=0;
    $fields = "voted, comm_id, u_id, q_id";
    $values='';

    for($i = 0 ; $i < count($commentsArr); $i++){
      if(!in_array($commentsArr[$i]['comm_id'],  $votedCommIDs)){      
        $q_id = $commentsArr[$i]['q_id'];
        $commIDInsert = $commentsArr[$i]['comm_id'];
        $values = "'0', '$commIDInsert', '$u_id', '$q_id'";
        
        $this->insert($this->get_connection(), 'votedcomments', $fields, $values);
      }
    }
  }

 }
?>