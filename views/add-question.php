<?php


ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);

session_start();

if(!isset($_SESSION['email'])){
  header("Location:login.php");
}
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


  <link rel="stylesheet" href="../styles/addQuestion.css" type="text/css">

  <link rel="preload" as="image" href="../res/bg.png">
</head>

</head>

<body>
<nav class="navbar sticky-top  navbar-expand-md navbar-light" id="nav">
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
  </nav>


  <h2 class="text-center title">INVEST</h2>

        <form action="../controllers/addQuestionController.php" method="POST">
          <div class="add-question-card container">
            <div class="form-group">
              <input id="add-question" class="form-control" type="text" name="add-question" placeholder="Question" minlength="10" maxlength="200" required>
            </div>

          <div class="form-group options">
            <input type="radio" id="rightAnswer" name="rightAnswer" value="1" required>
            <input id="add-option1" class="form-control" type="text" name="add-option1" placeholder="option one" maxlength="200" required>
          </div>

          <div class="form-group options">
            <input type="radio" id="rightAnswer" name="rightAnswer" value="2" required>
            <input id="add-option2" class="form-control" type="text" name="add-option2" placeholder="option two" maxlength="200" required>
          </div>

          <div class="form-group options">
            <input type="radio" id="rightAnswer" name="rightAnswer" value="3" required>
            <input id="add-option3" class="form-control" type="text" name="add-option3" placeholder="option three" maxlength="200" required>
          </div>

          </div>
          <div class="cc-container container col-12 justify-content-start" id="contributor-comment" >
            <textarea class="form-control comment-input" name="add-comment" placeholder="Blitz lecture (optional) - Educate! Drop some information that you know regarding this topic area" minlength="50" maxlength="350"></textarea>
          </div>

          <div class="btn-container container row justify-content-center">
            <input class="btn col-2" type="submit" name="submit" value="Add">
          </div>
        </form>
</body>
</html>