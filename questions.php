<!DOCTYPE html>
<html>
    <head>
        <title>A&Q | Ask - get Answer</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <header>
    <div class="toggleMenu">
            <img id="toggleimg" src="imgs/menu.png" alt="Toggle - Menu">
            <a href="index.php">Ask - Get Answer</a>
        </div>
        <nav id="mob-view">
            <ul>
                <li > <a href="index.php" id="brand">Ask - Get Answer</a> </li>
                <li> <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit">Search</button>
                 </form></li>
              <li><a class="logsign" href="login.php">Login</a></li>
              <li><a class="logsign" href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    <aside class="aside1">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="questions.php">Browse Questions</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>

    </aside>
    <aside class="aside2">
        <div>
            <h3>Join Ask-Get Answer Now.</h3>
            <p>Ask a question.</p>
            <p>Answer questions from other people.</p>
            <p>Earn special privilege.</p>
            <a href="signup.php">Join Now</a>
        </div>
    </aside>
     <main class="main-container">
        <div class="user-div">
        <h2>Top Questions</h2>
         <button id="ask-btn" >Ask Question</button>
         <div class="qa-container">
          <?php
             include 'db/database.php';
             $sql = "SELECT * FROM questions WHERE lang='english' ORDER BY asked_date DESC;";
             $result = mysqli_query($conn, $sql);
             $ResultCheck = mysqli_num_rows($result);
             if ($ResultCheck>0) {
                 while ($row = mysqli_fetch_assoc($result)) {
                    $quid = $row['id'];
                     $uid = $row['asked_by'];
                     //Select the user who asked the question.

                     $usql = "SELECT * FROM users WHERE id = '$uid';";
                      $ures = mysqli_query($conn, $usql);
                      $uRow = mysqli_fetch_assoc($ures);
                  //Select answers for the question.
                  $asql =  "SELECT * FROM answers WHERE qid = '$quid';";
                  $ares = mysqli_query($conn, $asql);
                  $aResCheck = mysqli_num_rows($ares);
                  echo '
                    <div> <h4><a href="#">'.$row['title'].'<a/></h4>
                   <p> '.$row['questoin'].'</p>
                   <p> <span> '.$row['tags'].'</span></p>
                    <p class ="user"> asked by: '.$uRow['name'].'
                    <p class= "user"> asked On: '.$row['asked_date'].' </div>';
                  if ($aResCheck>0) {
                      while ($arow = mysqli_fetch_assoc($ares)) {
                        $userid = $arow['ans_by'];
                        $usql = "SELECT * FROM users WHERE id ='$userid';";
                        $uRes = mysqli_query($conn, $usql);
                        $userRow = mysqli_fetch_assoc($uRes);
                        echo '
                        <div class="ans-container">
                        <p class="ans-user"> '.$userRow['name'].'
                        <p > '.$arow['ans_date'].'
                         <p>'.$arow['answer'].'</p>
                        </div>
                        
                        ';
                      }
                  }   
                    
                 }
             }
          ?>
          </div>
        </div>
     </main>  
    </body>
    <footer>
        <div class="footer-container">
        
        <p>Ask - Get Answer &copy;2019</p>
        </div>
       
    </footer>
    <script type="text/javaScript" src="js/jquery.js"></script>
    <script>
     $(document).ready(function(){
       $("#ask-btn").click(function(){
         alert("You have to login first!");
       });
       
        $("#toggleimg").click(function(){
           $("#mob-view").toggle(1000);
       });
     });
    </script>
</html>