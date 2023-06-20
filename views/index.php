<?php

session_start();

if(!isset($_SESSION['email'])){
  header("Location:login.php");
} 

require('../controllers/topPerformersController.php');
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

  <link rel="stylesheet" href="../styles/index.css" type="text/css">
</head>

<body>
  <nav class="navbar sticky-top  navbar-expand-md navbar-light" id="nav">
    <div class="container-fluid navContainer">

      <a href="index.php" class="navbar-brand">
        <span id="homepage" class="fw-bold">
          Quizzle
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
  </nav>
  <div class="nav-space"></div>

  <div id="course-section" class="container-fluid mx-0 my-0">
    <div class="row justify-content-start  mx-0 my-0 ">
      <form class="courses col-xxl-9 col-md-8" action="../controllers/courseSelectController.php" method="POST">

        <div class="container-fluid my-0  mx-0 ">
          <div class="row justify-content-start">
      
          <div id="year1" class="year col-xxl-12 col-md-12 col-sm-12 col-12 p-0">
          Year 3
          </div>
          
          <div id="course1" class="courses col-xxl-4 col-md-4 col-sm-4 col-4 p-0">
              <div id="bgpic1">
                <input type="submit" id="submit1" class="submit btn btn-dark" value="CSE3100" name="course">
              </div>
            </div>

            <div id="course2" class="courses col-xxl-4 col-md-4 col-sm-4 col-4 p-0">
              <div id="bgpic2">
                <input type="submit" id="submit2" class="submit btn btn-dark" value="CSE3101" name="course">
              </div>
            </div>

            <div id="course3" class="courses col-xxl-4 col-md-4 col-sm-4 col-4 p-0">
              <div id="bgpic3">
                <input type="submit" id="submit3" class="submit btn btn-dark" value="HST2105" name="course">
              </div>
            </div>

            <div id="course4" class="courses col-xxl-4 col-md-4 col-sm-4 col-4 p-0">
              <div id="bgpic4">
                <input type="submit" id="submit4" class="submit btn btn-dark" value="HST2104" name="course">
              </div>
            </div>

          <div id="course5" class="courses col-xxl-4 col-md-4 col-sm-4 col-4 p-0">
              <div id="bgpic5">
                <input type="submit" id="submit5" class="submit btn btn-dark" value="CSE2202" name="course">
              </div>
            </div>

            <div id="course6" class="courses col-xxl-4 col-md-4 col-sm-4 col-4 p-0">
            <div id="bgpic6">
              <input type="submit" id="submit6" class="submit btn btn-dark" value="SPA1203" name="course">
            </div>
          </div>
    
          <div id="year1" class="year col-xxl-12 col-md-12 col-sm-12 col-12 p-0">
          Year 4
          </div>

          <div id="course7" class="courses col-xxl-3 col-md-3 col-sm-3 col-3 p-0">
            <div id="bgpic7">
              <input type="submit" id="submit7" class="submit btn btn-dark" value="CSE4100" name="course">
            </div>
          </div>


          <div id="course8" class="courses col-xxl-3 col-md-3 col-sm-3 col-3 p-0">
            <div id="bgpic8">
              <input type="submit" id="submit8" class="submit btn btn-dark" value="CSE4102" name="course">
            </div>
          </div>

          <div id="course9" class="courses col-xxl-3 col-md-3 col-sm-3 col-3 p-0">
            <div id="bgpic9">
              <input type="submit" id="submit9" class="submit btn btn-dark" value="CSE4201" name="course">
            </div>
          </div>

          <div id="course10" class="courses col-xxl-3 col-md-3 col-sm-3 col-3 p-0">
            <div id="bgpic10">
              <input type="submit" id="submit10" class="submit btn btn-dark" value="CSE4200" name="course">
            </div>
          </div>
        </div>
        </div>
      </form>

      <div class="tp community-stats col-xxl-3 col-md-4  mx-0 my-0 " display:flex>
        <div class="tp-content">
          <div class="tp-section">
            <h1 id="tpHeading">TOP PERFORMERS</h1>
            <div class="row justify-content-start col-12">

              <?php for ($i = 0; $i < 5; $i++) {
                ?>
                <div class="names tp-names col-10">
                  <?php echo $tpc->getRankedUsersAndScoresC()[0][$i]; ?>
              </div>

                <div class="scores tp-scores col-2">
                  <?php echo $tpc->getRankedUsersAndScoresC()[1][$i]; ?>
              </div>

              <?php } ?>
            </div>
          </div>

            
            <div class="ti-section">
              <h1 id="tiHeading">TOP INVESTORS</h1>
              <div class="row justify-content-start col-12">

              <?php for ($i = 0; $i < 5; $i++) {
                ?>
                <div class="names ti-names col-10">
                  <?php echo $tpc->getRankedUsersAndInvestmentsC()[0][$i]; ?>
              </div>

                <div class="scores ti-scores col-2">
                  <?php echo $tpc->getRankedUsersAndInvestmentsC()[1][$i]; ?>
              </div>

              <?php } ?>
              </div>
              </div>

            <div class="tc-section">
              <h1 id="tcHeading">TOP COMMENTERS</h1>
              <div class="row justify-content-start col-12">
              <?php for ($i = 0; $i < 5; $i++) {
                ?>
                <div class="names tc-names col-10">
                  <?php echo $tpc->getRankedUsersAndCommentersC()[0][$i]; ?>
              </div>

                <div class="scores tc-scores col-2">
                  <?php echo $tpc->getRankedUsersAndCommentersC()[1][$i]; ?>
              </div>

              <?php } ?>
            </div>
          </div>

          </div>
        </div>
      </div>


    </div>

    <div class="big-stats">
      <div class="wow-stats container">
        <div class="row wow-row justify-content-center mx-0 my-0 py-0">
          <h1 class="stats-title col-12">Your statistics</h1> 
          <div class="wow-comments col-4"></div>
          <div class="wow-points col-4"></div>
          <div class="wow-investments col-4"></div>
        </div>

        <div class="row stats-row-labels justify-content-center mx-0 my-0  px-0 py-0">
          <div class="wow-comments-label col-4">Comments</div>
          <div class="wow-points-label col-4">Points</div>
          <div class="wow-investments-label col-4">Investments</div>
        </div>
      </div>
    </div>

    <div class="big-wow">
            <div class="wow text-center"></div>

    </div>
   
  

  <div class="about-quizzle container-fluid">
    <div class="aq-wrapper">
      <div class="row aq-row justify-content-start  mx-0 my-0 ">
        <h1 class="quizzle-title">What is <span style="font-weight:bold">Quizzle</span>?</h1>
        <p class="quizzle-text">Quizzle is a quizzing application developed to help encourage student communication. 
              It does this both directly (comments) and indirectly (setting questions) all through a gamified interface which spurs engagement. </p>
        <p class="quizzle-text2">Remember, investing in the quiz bank makes everyone richer! </p>
      </div>
    </div>
  </div>

  <div class="big-pic container-fluid">
    <div class="bp-wrapper">
      <div class="row bp-row justify-content-start  mx-0 my-0 ">
        <h1 class="big-pic-title">Play. Win. Learn.</h1>
      </div>
    </div>
  </div>



  <div id="bug-section">Bug? contact: ravinpanday95@gmail.com</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <script>

      wow();

      function wow(){
        let wowSection = document.querySelector('.wow');
        let wowPoints = document.querySelector('.wow-points');
        let wowComments = document.querySelector('.wow-comments');
        let wowInvestments = document.querySelector('.wow-investments');
      
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", '../JSON/comments.json', false);
        xhReq.send(null);
        let commentsDB = JSON.parse(xhReq.responseText);

        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", '../JSON/questions.js', false);
        xhReq.send(null);
        let questionsDB = JSON.parse(xhReq.responseText);
        
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", '../JSON/userScores.json', false);
        xhReq.send(null);
        let userScoresDB = JSON.parse(xhReq.responseText);
        
        wow = '';
        let commentCount = 0;
        let pointsIndex=0;
        let investmentsIndex=0;
        let points=0;
        let investments=0;
        let username = '';

        let qLength = Math.floor(Math.random() * questionsDB.length);
        
        console.log(qLength);
        wow = questionsDB[qLength];
        wow = wow.replace( /[\r\n]+/gm, "");
        wow += ' ~ a random chicken';
        investmentsIndex = userScoresDB[0][2];
        pointsIndex = userScoresDB[0][1];
        username = userScoresDB[0][0];

        for(let i = 0 ; i < commentsDB.length ; i++){
          if(commentsDB[i][2] == username){
            commentCount++;    
          }
        }

        wowSection.innerText = wow;
        wowPoints.innerText = pointsIndex;
        wowComments.innerText = commentCount;
        wowInvestments.innerText = investmentsIndex;
      }

      function getPoints(username, index){
        
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", '../JSON/userScores.json', false);
        xhReq.send(null);
        let points = 0;

        let userScores = JSON.parse(xhReq.responseText);
        for(let i = 0 ; i < userScores.length ; i++){
          if(userScores[i][0]==username){
            points = userScores[i][index];
            return points;
          }
        }
      }

      </script>
</body>

</html>