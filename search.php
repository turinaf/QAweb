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
            <li><a href="index.php">Home</a></li>
            <li><a href="">Users</a></li>
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
        <div>
            <div class="srch-rst">
           <?php
           include 'db/database.php';
            $search = $_POST['search'];
            if (empty($search)) {
                header("Location: index.php?search=empty");
                exit();
            }
            $sql = "SELECT * FROM questions WHERE questoin LIKE '%$search%';";
            $searchResult = mysqli_query($conn, $sql);
            $resulCheck = mysqli_num_rows($searchResult);
            echo $resulCheck."  Result Found for ".$search;
            if ($resulCheck>0) {
               
                while ($resultRow = mysqli_fetch_assoc($searchResult)) {
                     $qid = $resultRow['id'];
                     $sqla = "SELECT * FROM answers WHERE qid = '$qid';"; 
                    $ansResult = mysqli_query($conn, $sqla); 
                    $reslCheck = mysqli_num_rows($ansResult);

                    echo'<br>
                    <h3><a id="quest'.$qid.'">'.$resultRow['title'].'</a></h3>
                    <p>'.$resultRow['questoin'].'</p>
                    <p>'.$resultRow['tags'].'</p>
                    ';
                    if ($reslCheck>0) {
                        echo '<div class ="srch-ans" id = "ans'.$qid.'">';
                        while ($ansRow = mysqli_fetch_assoc($ansResult)) {
                            $usid = $ansRow['ans_by'];
                            $usql = "SELECT * FROM users WHERE id = '$usid';";
                            $uRes = mysqli_query($conn, $usql);
                            $uRow = mysqli_fetch_assoc($uRes);
                            echo '<div>
                            <p > Answered By: <span>'.$uRow['name'].'</span></p>
                              <p>'.$ansRow['answer'].'</p>
                              </div>
                            ';
                            
                        }
                        echo '</div>';
                    }
                    echo '
                    <script>
                     $(document).ready(function(){
                        $("#quest'.$qid.'").click(function(){
                           $("#ans'.$qid.'").slideToggle(1000);
                        });
                      });
                   </script>
                    ';

                }
            }
           ?>
            </div>
        </div>
        <div class="ask-now">
           <h2>Do you Have A question?</h2>
           <a id="ask-now" href="">ask now</a>
           <h2>Or your can Browse the questions asked before</h2>
           <a href="questions.php">Browse Questions</a>
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
       $("#ask-now").click(function(){
         alert("You have to login first!");
       });
        $("#toggleimg").click(function(){
           $("#mob-view").toggle(1000);
       });
     });
    </script>
</html>