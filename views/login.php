<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Quizzle</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@500&family=Bruno+Ace+SC&family=IBM+Plex+Sans:wght@400&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="../styles/login.css">


</head>

<body>
    <div id="main">

        <div id="login">
            <div class=" container-sm  w-50 mx-auto my-5 p-2 pt-4">
                <div class="mb-2">
                    <h2 class="title text-center p-4 text-white ">Login</h2>
                </div>
                <div id="login-content">
                    <form action="../controllers/loginController.php" method="POST">
                        <input class="fs-6 w-100 p-2 my-1 f-input" type="text" name="email" placeholder="username"><br>

                        <input class="fs-6 w-100 p-2 my-1 f-input mt-2" type="password" name="password"
                            placeholder="password"><br>
                        <h5 id="error-message"><?php echo isset($_GET['error']) ? $_GET['error'] : null; ?></h5>
                        

                        <input type="submit" name="submit" value="Login" class="normal_button w-100 mt-2">
                    </form>
                </div>
                <form action="signup.php" method="POST">
                <input type="submit" name="submit2" value="signup" class="signup btn btn-success w-100 mt-2"> 
                </form>
            </div>
        </div>
    </div>

</body>

</html>