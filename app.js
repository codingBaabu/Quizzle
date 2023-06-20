let currentScore;
let currentQuestion=0;
var rightAnswer = 0;
var answeredQuestions=new Array;
var questionsCount = 0;
var contributorComment;
var activeQID;  
var qVotes;

init();

function init(){  
  var xhReq = new XMLHttpRequest();
  xhReq.open("GET", '../JSON/scores.js', false);
  xhReq.send(null);

  currentScore = JSON.parse(xhReq.responseText);

  document.querySelector('#current-score').innerText = currentScore;

  document.body.addEventListener('click', answerSelected);    

  setQandA();
  qidUpdater();

}

function answerSelected(e){
  let answer;
  if(e.target.classList.contains('options') && 
    e.target.name==rightAnswer){
    answer=1;
    if(currentScore<25){
      currentScore++;
    }
    currentScoreUpdater();
    qidUpdater();
    postSelectionCard(answer, e.target);

  } else if(e.target.classList.contains('options') && 
      e.target.name!=rightAnswer){
      answer=0;
      currentScore--;
      currentScoreUpdater();
      qidUpdater();
      postSelectionCard(answer, e.target);
    } else if(e.target.classList.contains('continyuh')){
      setQuestionComments();
      setVotesDisplay();
      contributorCommentToggle();
      continueToggle();


      reset();
      setQandA();
    }
  }

  function currentScoreUpdater(){
    let currentScoreP = document.querySelector('#current-score');
    let sh = document.querySelector('#scoreHidden');
    currentScoreP.innerText = currentScore;
    sh.value=currentScore;
  }

  function qidUpdater(){
    let qid = document.querySelector('#q_id');
    qid.value = activeQID;
  }

  function contributorCommentToggle(){
    let contributorCommentDiv = document.querySelector('#contributor-comment');
    let contributorCommentInsert = `<p class="cc-text">${contributorComment}</p>`;    
    
    if(contributorCommentDiv.innerText==''){
    contributorCommentDiv.innerHTML = contributorCommentInsert;
    contributorCommentDiv.height = '5vw';
    contributorCommentDiv.margin = '5vw';
    contributorCommentDiv.padding = '5vw';
    } else {
      contributorCommentDiv.innerHTML = '';
      contributorCommentDiv.height = 0;
      contributorCommentDiv.margin = '0';
      contributorCommentDiv.padding = '0';

    }
  }

  function reset(){
    let options = document.querySelectorAll('.options');
    options.forEach(function(option) {
    option.style.display = "inline-block";
  });

  document.querySelector(`#option1label`).style.backgroundColor='transparent';
  document.querySelector(`#option1label`).style.background = 'none';
  document.querySelector(`#option1label`).style.color='white';
  document.querySelector(`#option1label`).style.animation='none';

  document.querySelector(`#option2label`).style.backgroundColor='transparent';
  document.querySelector(`#option2label`).style.background = 'none';
  document.querySelector(`#option2label`).style.color='white';
  document.querySelector(`#option2label`).style.animation='none';

  document.querySelector(`#option3label`).style.backgroundColor='transparent';
  document.querySelector(`#option3label`).style.background = 'none';
  document.querySelector(`#option3label`).style.color='white';
  document.querySelector(`#option3label`).style.animation='none';

  }
  
function postSelectionCard(answer, button){
  setQuestionComments();
  setVotesDisplay();
  setVoteHighlight(getVotedCheck(), 0, 0);
  contributorCommentToggle();
  continueToggle();

  let options = document.querySelectorAll('.options');
  options.forEach(function(option) {
      option.style.display = "none";

  });
  let labelInit = '#'+button.id+'label';
  let label = document.querySelector(`${labelInit}`);
  if(answer==0){
    
    label.style.animation = '.5s ease-out 0s 1 slideInFromLeft';
    label.style.background = 'linear-gradient(90deg, rgba(39,53,54,1) 0%, rgba(39,53,54,0) 100%) ';
    
    label.style.color='white';
  }

  for(let i = 1 ; i <= 3 ; i++){
    if(rightAnswer==i-1){

      document.querySelector(`#option${i}label`).style.animation = '.5s ease-out 0s 1 slide-green';
      document.querySelector(`#option${i}label`).style.background = 'linear-gradient(90deg, rgba(223,230,103,1) 0%, rgba(203,212,101,1) 13%, rgba(186,196,100,1) 24%, rgba(169,180,99,1) 35%, rgba(149,162,97,1) 48%, rgba(131,145,96,1) 60%, rgba(109,126,94,1) 74%, rgba(89,108,92,1) 87%, rgba(69,89,90,1) 100%)';

      document.querySelector(`#option${i}label`).style.color='black';
      break;
    }
  }
}

function continueToggle(){
  let continueDiv = document.querySelector('.continyuh');
  let comment = document.querySelector('.comment');

  if(continueDiv.style.display == "none"){
    continueDiv.style.display = "block";
    comment.value='';
    comment.style.display = "block";

    
    continueDiv.style.animation = '.5s ease-out 0s 1 slide-button';
    comment.style.animation = '.5s ease-out 0s 1 slide-comment-field';

  } else {
    continueDiv.style.display = "none";
    comment.style.display = "none";
    
  }
  
}

function setQandA(){
  let questionAndAnswers = getQuizInfo();

  let displayedQuestion = document.querySelector('#displayed-question');
  displayedQuestion.innerText = questionAndAnswers[0];
  
  let option1label = document.querySelector('#option1label');
  let option2label = document.querySelector('#option2label');
  let option3label = document.querySelector('#option3label');
  option1label.innerText = questionAndAnswers[1];
  option2label.innerText = questionAndAnswers[2];
  option3label.innerText = questionAndAnswers[3];


  option3label.innerText = questionAndAnswers[3];

}


function getQuizInfo(){
  let qaIndex=-1;
  let qandA=new Array;
  let answers=new Array;
  let answersDB=new Array;
  let questionsDB=[];

  //questions stuff
  var xhReq = new XMLHttpRequest();
  xhReq.open("GET", '../JSON/questions.js', false);
  xhReq.send(null);

  let questionsDBInit = JSON.parse(xhReq.responseText);
  let questions=[];
  
  for(let i = 0; i < questionsDBInit.length ; i++){
    if(questionsDBInit[i][4]!=1){
      questionsDB.push(questionsDBInit[i]);
      questions[i] = questionsDBInit[i][1];

    }

  }

  //assigning 
  questionsCount=questions.length;

  qaIndex=getQAIndex(questionsDB);
  activeQID=qaIndex;
  
  for(let i = 0 ; i < questionsDB.length ; i++){
    if(questionsDB[i][0]==qaIndex){
      qandA[0]=questionsDB[i][1];
      contributorComment = questionsDB[i][2];
      qVotes = questionsDB[i][3];
      break;
    }
  }

  //answers
  answersDB = getAnswersDB();
  answers = getThreeAnswers(answersDB, qaIndex);

  qandA[1]=answers[0];
  qandA[2]=answers[1];
  qandA[3]=answers[2];
  
  currentQuestion=qaIndex;

  return qandA;
}

function getQuestion(qaIndex, questions){
  

  return questions[qaIndex];
}

function getAnswersDB(){
  var xhReq = new XMLHttpRequest();
  xhReq.open("GET", '../JSON/pass.json', false);
  xhReq.send(null);
  
  let answersDB = JSON.parse(xhReq.responseText);
  return answersDB;
}

function getThreeAnswers(answersDB, qaIndex){
  let threeAnswers = [];
  
  for(let i = 0 ; i < answersDB.length ; i++){
    if(answersDB[i][0] == qaIndex){
      threeAnswers.push(answersDB[i][2]);
      rightAnswer = answersDB[i][1]-1;    
    }
  } 
  return threeAnswers;
}

function setVotesDisplay(){
  let vc = document.querySelector('.votes-container');
  
  let commentHTML='';
  if(vc.childNodes.length===0){
    
    commentHTML += `<button id="downvote" onclick="downvote('question')">⇣</button>`;  
    commentHTML += `<p id="q-votes">${qVotes}</p>`;
    commentHTML += `<button id="upvote" onclick="upvote('question')">⇡</button>`;    
  } else {
    commentHTML='';
  }

  vc.innerHTML = commentHTML;

}

function setVoteHighlight(voted, qorc, comm_id){
  let downvote ='';
  let upvote = '';
  if(qorc == 0){
    downvote = document.querySelector('#downvote');
    upvote = document.querySelector('#upvote');
  } else {

    downvote = document.querySelector(`#c-downvote${comm_id}`);
    upvote = document.querySelector(`#c-upvote${comm_id}`);  
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

 function getVotedCheck(){
        let q_id = document.querySelector('#q_id').value;
       
        let voted=-1;

        let xhReq = new XMLHttpRequest();
        xhReq.open("GET", '../JSON/voted.js', false);
        xhReq.send(null);

        let votedDB = JSON.parse(xhReq.responseText);
        
        
        for(let i = 0 ; i < votedDB.length ; i++){
          if(votedDB[i][1] == q_id){
            voted = votedDB[i][0];
          }
        }


        return voted;
      }


function setQuestionComments(){
  let questionCommentsData=getQuestionComments();

  if(questionCommentsData != -1){
  
    let acc = document.querySelector('#allCourseComments');
    let mf = document.querySelector('#myForm');
    document.querySelector('#doCalcComment').value = 1;

    let li=[0,0,0];
    let ul=[];
    let doCommentStuff = false;
    var commentIDs=[];
    var commentVotes=[];
    
    var commentVoted=[];
    var votedGetting = getVotedCheckComments();

      for(let i = 0 ; i < questionCommentsData.length ; i++){
      li[0] = questionCommentsData[i][0];
      li[1] = questionCommentsData[i][2];
      li[2] = questionCommentsData[i][3];
      commentIDs.push(questionCommentsData[i][4]);
      commentVotes.push(questionCommentsData[i][5]);
    
      ul.push(li.concat());

    }

    for(let i = 0 ; i < votedGetting.length ; i++){
      console.log(votedGetting[i][1]);
      if(commentIDs.includes(votedGetting[i][1])){
        commentVoted.push(votedGetting[i][0]);

        console.log('voted is ' + votedGetting[i][0]);
      }
    }


    let commentHTML='';
    if(acc.childNodes.length===0){

      doCommentStuff = true;

      for(let i = commentIDs.length-1 ; i >= 0  ; i--){

        commentHTML+= `<ul id="comment-card${i}" class="comment-card  container col-12 justify-content-start">`;
        
        if(i==commentIDs.length - 1){
          commentHTML+= `<li class="comment-heading">` + (commentIDs.length) + ` comment${commentIDs.length>1 ? 's' : ''}</li>`;
          
        }
        
        commentHTML+= `<button class = "cDownvote" id = "c-downvote${commentIDs[i]}" onclick="downvote('comment', '${commentIDs[i]}')">⇣</button>`;
        commentHTML+= `<div    class = "cVotes"  id = "c-votes${commentIDs[i]}"> ${commentVotes[i]} </div>`;
        commentHTML+= `<button class = "cUpvote" id = "c-upvote${commentIDs[i]}"   onclick="upvote('comment', '${commentIDs[i]}')">⇡</button></li>`;

        commentHTML+= `<li class="commenter-id">` + ul[i][1] + "   ·  (" + ul[i][2] + ")" + `</li>`;
        commentHTML+= `<li class="comment-info">` + ul[i][0] + `</li>`;
        commentHTML+= '</ul>';

        acc.innerHTML += commentHTML;
        commentHTML='';

        document.querySelector(`#comment-card${i}`).style.animation = '.5s ease-out 0s 1 slide-comments';

        setVoteHighlight(commentVoted[i], 1, commentIDs[i]);
      }
    } else {
      commentHTML='';
      acc.innerHTML = commentHTML;
    }



    commentHTML='';
    if(doCommentStuff == true){
      doCommentStuff=false;
      for(let i = commentIDs.length ; i >= 0  ; i--){
        commentHTML+= `<input type="hidden" id="comm${commentIDs[i]}"    name="comm${i}"    value="${commentIDs[i]}">`;
        commentHTML+= `<input type="hidden" id="votes${commentIDs[i]}" name="votes${i}" value="${commentVotes[i]}">`;
        commentHTML+= `<input type="hidden" id="voted${commentIDs[i]}" name="voted${i}" value="${commentVoted[i]}">`;

      }

      commentHTML+= `<input type="hidden" id="cLength" name="cLength" value="${commentIDs.length}">`;

      mf.innerHTML += commentHTML;

    }
  }
}



function getQuestionComments(){
  var xhReq = new XMLHttpRequest();
  xhReq.open("GET", '../JSON/comments.json', false);
  xhReq.send(null);
  
  let questionCommentsData=[];
  let commentsDB = JSON.parse(xhReq.responseText);
  

  for(let i = 0 ; i < commentsDB.length ; i++){
    if(commentsDB[i][1] == activeQID){
      questionCommentsData.push(commentsDB[i]);
    }
  }


  if(questionCommentsData.length>0){
    return questionCommentsData;
  } else {
    return -1;
  }
}

function getVotedCheckComments(){
    
  let xhReq = new XMLHttpRequest();
  xhReq.open("GET", `../JSON/votedComment.js`, false);
  xhReq.send(null);

  let votedDB = JSON.parse(xhReq.responseText);
  
  return votedDB;
}

function getQAIndex(questionsDB){
  let qaIndex;
  let goAhead;
  let qids=[];

  for(let i = 0; i < questionsDB.length ; i++){
    qids.push(questionsDB[i][0]);    

  }

  if(questionsDB.length==answeredQuestions.length && questionsDB.length != 1){
    let lastElement = answeredQuestions[answeredQuestions.length - 1];
    answeredQuestions=[lastElement];
  }
    do {
      goAhead=1;
      let temp;
      if(questionsDB.length==1){temp=0; } else {
        temp = Math.floor(Math.random() * questionsDB.length);
      }

      //if(questionsDB[temp][4]==1) temp = -1;

      for(let i = 0 ; i <= answeredQuestions.length ; i++){
        if((answeredQuestions[i]==qids[temp] && questionsDB.length != 1)){
          goAhead=0;
        }
      }
      if(goAhead==1){
        answeredQuestions.push(qids[temp]);
        qaIndex = qids[temp];

        return qaIndex;
      }
    } while(goAhead==0)
}
