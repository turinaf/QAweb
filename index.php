<?php
 session_start();
 $_SESSION['lang'] = "english";
include 'db/database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>A&Q | Ask - get Answer</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css"> -->
    </head>
    <body>
    <header>
        <div class="toggleMenu">
            <img id="toggleimg" src="imgs/menu.png" alt="Toggle - Menu">
            <a href="index.php">Ask - Get Answer</a>
        </div>
        <nav  id="mob-view">
            <ul>
                <li > <a href="index.php" id="brand">Ask - Get Answer</a> </li>
                <li> <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Search..." >
                <button type="submit" name="submit">Search</button>
                 </form></li>
              <li><a class="logsign" href="login.php">Login</a></li>
              <li><a class="logsign" href="signup.php">Sign Up</a></li>
              <li>
                  <form action="db/logindb.php" method="POST">
                    <select name="lang">
                      <option>Language</option>
                      <option value="english">English</option>
                      <option value="amharic">Amharic</option>
                      <option value="aoromo">Afaan Oromoo</option>
                    </select>
                    <button type="submit" name="submit-lang">Switch</button>
                  </form>
              </li>
            </ul>
        </nav>
    </header>
    <aside class="aside1">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="questions.php">Browse Questions</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>

        </ul>

    </aside>
    <aside class="aside2">
        <div class="card">
            <div class="card-header">
             <div class="row">
                 <div class="col-md-10">
                     <h3 class="form-heading">signup</h3>
                     <p>Join the community now</p>
                 </div> <!--col-9-->
                 <div class="col-md-2">
                     <i class="far fa-edit text-right"></i>
                 </div> <!--col-3-->
                 <div class="card-body">
                   <div class="form-group">
                      <input type="text" id="name" class="form-control" placeholder="Enter name">
                   </div> <!--Form-group-->
                   <div class="form-group">
                      <input type="text" id="name" class="form-control" placeholder="Enter name">
                   </div> <!--Form-group-->
                 </div> <!--Card-body-->
             </div> <!--row-->
            </div> <!--Card-header-->
        </div> <!--Card-->
        <!-- <div>
            <h3>Join Ask-Get Answer Now.</h3>
            <p>Ask a question.</p>
            <p>Answer questions from other people.</p>
            <p>Earn special privilege.</p>
            <a href="signup.php">Join Now</a>
        </div> -->
    </aside>
     <main class="main-container">
        <div class="message-container">
            <div class="message">
            <h3>Ask any kind of <span>QUESTION</span>  and get an <span>ANSWER</span> for it from people around the globe.</h3>
            <p>FOR EVERYONE BY DEVELOPERS.</p>
            </div>
        </div>
        <div class="ask-now">
            <div>
                <h2>Do you Have A question?</h2>
                <a id="ask-now" href="">ask now</a>
           </div>
           <div>
                <h2>Or you can Browse the questions asked before</h2>
                <a href="questions.php">Browse Questions</a>
           </div>
           
        </div>
     </main>  
    </body>
    <script type="text/javaScript" src="js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/fontawesome/js/all.js"></script>
    <script>
     $(document).ready(function(){
       $("#ask-now").click(function(){
         alert("You have to login first!");
       });
       $("#toggleimg").click(function(){
           $("#mob-view").toggle(1000);
       });
     });
    </script>
    <footer>
        <div class="footer-container">
        
        <p>Ask - Get Answer &copy;2019</p>
        </div>
        <?php
        $date = date("Y-m-d");
        $userIp = $_SERVER['REMOTE_ADDR'];
        $sql = "SELECT * FROM visitors WHERE date = '$date';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $insertQuery = "INSERT INTO visitors (date, ip) VALUES('$date', '$userIp');";
            mysqli_query($conn, $insertQuery);
        }else {
            $row = mysqli_fetch_assoc($result);
            if (!preg_match('/'.$userIp.'/i', $row['ip'])) { // will execute when current ip is not in database
                $newIp = "$row[ip]$userIp"; // combines previuos and current user ip address with a separator for updating in database.
                $updateQuery = "UPDATE visitors set ip = '$newIp', views = views+1 WHERE date = '$date';";
                mysqli_query($conn, $updateQuery);
            }
        }
       ?>
    </footer>
</html>