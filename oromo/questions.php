<!DOCTYPE html>
<html>
    <head>
        <title>A&Q | Gaafadhu - deebi argadhu</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <header>
    <div class="toggleMenu">
            <img id="toggleimg" src="imgs/menu.png" alt="Toggle - Menu">
            <a href="index.php">Gaafadhu</a>
        </div>
        <nav id="mob-view">
            <ul>
                <li > <a href="index.php" id="brand">Gaafadhu</a> </li>
                <li> <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Barbaadi...">
                <button type="submit">Barbaadi</button>
                 </form></li>
              <li><a class="logsign" href="login.php">Seeni</a></li>
              <li><a class="logsign" href="signup.php">Galmaa'i</a></li>
            </ul>
        </nav>
    </header>
    <aside class="aside1">
        <ul>
            <li><a href="index.php">Wirtuu</a></li>
            <li><a href="users.php">Fayyadamtoota</a></li>
            <li><a href="questions.php">Gaaffilee</a></li>
            <li><a href="login.php">Seeni</a></li>
            <li><a href="signup.php">Galmaa'i</a></li>
        </ul>

    </aside>
    <aside class="aside2">
        <div>
            <h3>Fayyadamaa ta'i.</h3>
            <p>Gaaffi gaafadhu.</p>
            <p>Deebii namootaaf kenni.</p>
            <p>Faayidaa argadhu.</p>
            <a href="signup.php">Fayyadami</a>
        </div>
    </aside>
     <main class="main-container">
        <div class="user-div">
        <h2>Gaafilee gaafataman</h2>
         <button id="ask-btn" >Gaafadhu</button>
         <div class="qa-container">
          <?php
             include 'db/database.php';
             $sql = "SELECT * FROM questions WHERE lang='oromo' ORDER BY asked_date DESC;";
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
        
        <p>Gaafadhu - Deebii argadhu&copy;2019</p>
        </div>
       
    </footer>
    <script type="text/javaScript" src="js/jquery.js"></script>
    <script>
     $(document).ready(function(){
       $("#ask-btn").click(function(){
         alert("Gaaffii gaafachuuf dura seenuu qabda!");
       });
       
        $("#toggleimg").click(function(){
           $("#mob-view").toggle(1000);
       });
     });
    </script>
</html>