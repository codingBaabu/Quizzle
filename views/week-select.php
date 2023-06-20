<?php 

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@500&family=Bruno+Ace+SC&family=IBM+Plex+Sans:wght@400&display=swap" rel="stylesheet"> 
  
  <link rel="stylesheet" href="../styles/weekSelect.css" type="text/css">

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

    <div class="justify-content-end mx-0" id="main-nav">
      <ul class="navbar-nav mx-0">
          <li class="nav-item mx-0">
            <p id="username"><?php echo $_SESSION['email'];?></p>
          </li>
          <li class="nav-item mx-0">
            <a class="nav-link mx-0" id="logout" href="../models/logout.php">logout</a> 
          </li>
        </ul>
      </div>
      </div>
      <div class="name"><?php echo $_SESSION['courseName']; ?></div>
    </nav>
    
    <div id="course-section" class="container-fluid my-0 mx-0">

      <div class="row justify-content-start mx-0"> 
      <form class="col-xxl-6 col-lg-6 mx-0 col-md-12  p-0" action="../views/add-question.php" action="POST">       
      <div class="label i-label col-xxl-6 col-lg-6 col-md-12  mx-0">Invest</div> 
      <div id="bgpic1">
        <button id="submit1" class="submit "></button>
      </div>
      </form>

    <form class="col-xxl-6 col-lg-6 col-lg-6 col-md-12 mx-0 p-0"action="../views/quizzle.php" action="POST">
    <div class="label q-label col-xxl-6 col-lg-6 col-md-12  mx-0">Quizzle</div> 
    <div id="bgpic2">  
      <button id="submit2" class="submit "></button> 
    </div>
  </form>
    </div>
  </div>

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const empty = urlParams.get('empty');

    if(empty){
      document.getElementById('bgpic1').style.animation =  "shake 0.82s cubic-bezier(.36,.07,.19,.97) both";
    }
  </script>
    

  </body>
</html>