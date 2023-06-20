<?php

session_start();

if(!isset($_SESSION['email'])){
  header("Location:login.php");
}

require('../controllers/quizzleController.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quizzle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@500&family=Bruno+Ace+SC&family=IBM+Plex+Sans:wght@400&display=swap" rel="stylesheet"> 
  
    <link rel="stylesheet" href="../styles/quizzle.css" type="text/css">
</head>

</head>

<body>
  <nav class="navbar sticky-top navbar-expand-md navbar-light" id="nav">
    <div class="container-fluid navContainer">

      <a href="index.php" class="navbar-brand">
        <span id="homepage" class="fw-bold">
          Quizzle > <?php echo $_SESSION['course']; ?>
        </span>
      </a>

      <div class="justify-content-end" id="main-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <p id="username">
              <?php echo $_SESSION['email']; ?>
            </p>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="logout" href="../models/logout.php">logout</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="name"><?php echo $_SESSION['courseName']; ?></div>
  </nav>

  <h2 id="current-score"></h2>

  <div id="quiz-card" class="container my-0">

      <div class="section-1 mx-auto col-12">

      <p id="displayed-question"></p>

        <div class="options-container">
          <input type="submit" class="options" id="option1" name="0" value="">
          <label id="option1label" class="labels"></label>
        </div>

        <div class="options-container">
          <input type="submit" class="options" id="option2" name="1" value="">
          <label id="option2label" class="labels"></label>
        </div>

        <div class="options-container">
          <input type="submit" class="options" id="option3" name="2" value="">
          <label id="option3label" class="labels"></label>
        </div>
        </div>

        <div class="votes-container"></div>

</div>

<div class="comment-added container col-12 justify-content-start">Comment added</div>

<div class="cc-container container col-12 justify-content-start" id="contributor-comment"></div>

        <form class="continueForm" id="myForm" onsubmit="return fetchcall();">
          <input type="hidden" id="scoreHidden" name="scoreHiddenName" value="-1">
          <input type="hidden" id="q_id" name="q_id" value="1">
          <input type="hidden" id="q_votes" name="q_votes" value="1">
          <input type="hidden" id="vote" name="vote" value="-11">
          <input type="hidden" id="doCalc" name="doCalc" value="0">
          
          <input type="hidden" id="c_votes" name="c_votes" value="1">
          <input type="hidden" id="voteComment" name="voteComment" value="-11">
          <input type="hidden" id="doCalcComment" name="doCalcComment" value="0">
          <input type="hidden" id="qorc" name="qorc" value="-1">
          <input type="hidden" id="commID" name="commID" value="-1">

            <div class="comment-and-button  container row justify-content-start">
            
            <textarea type="text" class="comment col-10" name="comment" placeholder="Type here" style="display:none"
              value=""></textarea>

            <input type="submit" class="continyuh col-2" value="Go" style="display:none">
            </div>  

        </form>

        <input type="hidden" id="getVoted" name="getVoted" value="1">
        <input type="hidden" id="getVotedComment" name="getVotedComment" value="1">
      
        <div class="container my-0">
          <div class="row justify-content-start">
            <div id="allCourseComments"></div>
          </div>
        </div>

    <script>
      function fetchcall() {
        let q_id = document.querySelector('#q_id').value;
        let comment_added = document.querySelector('.comment-added');
        let comment = document.querySelector('.comment');

        comment_added.style.animation = 'none';
        comment_added.offsetHeight; 
        comment_added.style.animation = null; 

        if(comment.value.length > 0){
          comment_added.style.animation = '2s ease-out 0s 1 slide-comment-added';
        }
        
        var data = new FormData(document.getElementById("myForm"));



        fetch("../controllers/scoreController.php", { method: "POST", body: data })
          .then(res => res.text())
          .then(txt => console.log(txt))
          .catch(err => console.error(err));

          document.querySelector('#doCalc').value=0;
          let getVoted = document.querySelector('#getVoted').value=1;
          let getVotedComment = document.querySelector('#getVotedComment').value=1;
          document.getElementById('myForm').innerHTML = getForm();


        return false;
      }

      function getForm(){
        let form = `   <input type="hidden" id="scoreHidden" name="scoreHiddenName" value="-1">
          <input type="hidden" id="q_id" name="q_id" value="1">
          <input type="hidden" id="q_votes" name="q_votes" value="1">
          <input type="hidden" id="vote" name="vote" value="-11">
          <input type="hidden" id="doCalc" name="doCalc" value="0">
          
          <input type="hidden" id="c_votes" name="c_votes" value="1">
          <input type="hidden" id="voteComment" name="voteComment" value="-11">
          <input type="hidden" id="doCalcComment" name="doCalcComment" value="0">
          <input type="hidden" id="qorc" name="qorc" value="-1">
          <input type="hidden" id="commID" name="commID" value="-1">

            <div class="comment-and-button  container row justify-content-start">
            
            <textarea type="text" class="comment  col-10" name="comment" placeholder="Type here" style="display:none"
              value=""></textarea>

            <input type="submit" class="continyuh col-2" value="Go" style="display:none">
            </div>`;

        return form;
      }

      function upvote(section, commentID){
          let qVotesDiv = document.querySelector('#q-votes');
          let qVotesHidden = document.querySelector('#q_votes');
          let vote = document.getElementById('vote'); 
          let getVoted = document.querySelector('#getVoted');
          let votesOnCurrentQ = Number(qVotesDiv.innerText);
          let qorc = document.querySelector('#qorc');
          let commIDPass = document.querySelector(`#comm${commentID}`);

        if(section == 'question'){
          qorc.value=0;
          qVotesDiv = document.querySelector('#q-votes');
          qVotesHidden = document.querySelector('#q_votes');
          vote = document.getElementById('vote');
          getVoted = document.querySelector('#getVoted');
          votesOnCurrentQ = Number(qVotesDiv.innerText);
        } else if(section == 'comment'){
          qorc.value=1;
          qVotesDiv = document.querySelector(`#c-votes${commentID}`); 
          qVotesHidden = document.querySelector(`#votes${commentID}`);  
          vote = document.getElementById(`voted${commentID}`);     
          getVoted = document.querySelector('#getVotedComment');
          votesOnCurrentQ = Number(qVotesDiv.innerText);
        }

       

        let voted = getVotedCheck(section, commentID);

        if(getVoted.value==1){
          voted = getVotedCheck(section, commentID);
          getVoted.value=0;

        } else {
          voted = vote.value;
        }

      
        if(voted == 0){
          vote.value = 2;
          qVotesDiv.innerText = Number(qVotesDiv.innerText)+1;
          qVotesHidden.value  = Number(qVotesDiv.innerText);
          
        } else if(voted == 1){
          vote.value = 2;          
          qVotesDiv.innerText = Number(qVotesDiv.innerText)+2;
          qVotesHidden.value  = Number(qVotesDiv.innerText);
          
        } else if(voted == 2){
          vote.value = 0;          
          qVotesDiv.innerText = Number(qVotesDiv.innerText)-1;
          qVotesHidden.value  = Number(qVotesDiv.innerText);
          
        }

        voted = vote.value;
        setVoteHighlight(voted, section, commentID);

        if(section=='question')
        document.querySelector('#doCalc').value = 1;

      }

      function downvote(section, commentID){
          let qVotesDiv = document.querySelector('#q-votes');
          let qVotesHidden = document.querySelector('#q_votes');
          let vote = document.getElementById('vote'); 
          let getVoted = document.querySelector('#getVoted');
          let votesOnCurrentQ = Number(qVotesDiv.innerText);
          let qorc = document.querySelector('#qorc');
          let commIDPass = document.querySelector(`#comm${commentID}`);

        if(section == 'question'){
          qorc.value=0;
          qVotesDiv = document.querySelector('#q-votes');
          qVotesHidden = document.querySelector('#q_votes');
          vote = document.getElementById('vote');
          getVoted = document.querySelector('#getVoted');
          votesOnCurrentQ = Number(qVotesDiv.innerText);
        } else if(section == 'comment'){
          qorc.value=1;
          qVotesDiv = document.querySelector(`#c-votes${commentID}`); 
          qVotesHidden = document.querySelector(`#votes${commentID}`);  
          vote = document.getElementById(`voted${commentID}`);     
          getVoted = document.querySelector('#getVotedComment');
          votesOnCurrentQ = Number(qVotesDiv.innerText);
        }

       

        let voted = getVotedCheck(section, commentID);

        if(getVoted.value==1){
          voted = getVotedCheck(section, commentID);
          getVoted.value=0;

        } else {
          voted = vote.value;
        }

      
        if(voted == 0){
          vote.value = 1;
          qVotesDiv.innerText = Number(qVotesDiv.innerText)-1;
          qVotesHidden.value  = Number(qVotesDiv.innerText);
          
        } else if(voted == 1){
          vote.value = 0;          
          qVotesDiv.innerText = Number(qVotesDiv.innerText)+1;
          qVotesHidden.value  = Number(qVotesDiv.innerText);
          
        } else if(voted == 2){
          vote.value = 1;          
          qVotesDiv.innerText = Number(qVotesDiv.innerText)-2;
          qVotesHidden.value  = Number(qVotesDiv.innerText);
          
        }

        voted = vote.value;
        setVoteHighlight(voted, section, commentID);

        if(section=='question')
        document.querySelector('#doCalc').value = 1;
        

      }
      
      
      function getVotedCheck(section, commentID){
        let q_id = document.querySelector('#q_id').value;
       
        let voted=-1;
        let filename='';

        if(section=='question'){
          filename = 'voted';
        } else if(section=='comment'){
          filename = 'votedComment';
        }

        let xhReq = new XMLHttpRequest();
        xhReq.open("GET", `../JSON/${filename}.js`, false);
        xhReq.send(null);

        let votedDB = JSON.parse(xhReq.responseText);
        
        for(let i = 0 ; i < votedDB.length ; i++){
          if(section=='question'){
            if(votedDB[i][1] == q_id){
            voted = votedDB[i][0];
 
            }
          } else if(section=='comment'){
 
            if(votedDB[i][1] == commentID){
                voted = votedDB[i][0];
            }

          }

        }


        return voted;
      }

      function setVoteHighlight(voted, section, commentID){
        let downvote = document.querySelector(`#downvote`);
        let upvote = document.querySelector('#upvote');
        
        if(section=='question'){
          downvote = document.querySelector('#downvote');
          upvote = document.querySelector('#upvote');
        } else if(section=='comment'){
          downvote = document.querySelector(`#c-downvote${commentID}`);
          upvote = document.querySelector(`#c-upvote${commentID}`);
        }

        if(voted == 0){
          upvote.style.color = '#020';
          downvote.style.color = '#200';
        } else if(voted == 1){
          upvote.style.color = '#020';
          downvote.style.color = '#EF3D63';
        } else if(voted == 2){
          upvote.style.color = '#A4DE02';
          downvote.style.color = '#200';
          }        
      }

    </script>
  <script type="module" src="../app.js"></script>
</body>
</html>