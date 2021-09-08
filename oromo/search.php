<!DOCTYPE html>
<html>
    <head>
        <title>A&Q | Gaafadhu - Deebii argadhu</title>
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
                <input type="text" name="search" placeholder="Search...">
                <button type="submit">Search</button>
                 </form></li>
              <li><a class="logsign" href="login.php">Seeni</a></li>
              <li><a class="logsign" href="signup.php">Galmaa'i</a></li>
            </ul>
        </nav>
    </header>
    <aside class="aside1">
        <ul>
            <li><a href="index.php">Wirtuu</a></li>
            <li><a href="">Fayyadamtoota</a></li>
            <li><a href="questions.php">Gaaffilee ilaali</a></li>
            <li><a href="login.php">Seeni</a></li>
            <li><a href="signup.php">Galmaa'i</a></li>

        </ul>

    </aside>
    <aside class="aside2">
        <div>
            <h3>Fayyadamaa ta'i</h3>
            <p>Gaaffii gaafadhu.</p>
            <p>Deebii deebisi.</p>
            <p>Faayidaa addaa argadhu.</p>
            <a href="signup.php">Amma fayyadami</a>
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
            $sql = "SELECT * FROM questions WHERE questoin LIKE '%$search%' AND lang='oromo';";
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
                            <p > Kan deebise: <span>'.$uRow['name'].'</span></p>
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
           <h2>Gaaffii qabdaa?</h2>
           <a id="ask-now" href="">Amma gaafadhu</a>
           <h2>Yookiin gaaffilee dura gaafataman ilaali</h2>
           <a href="questions.php">Gaaffilee ilaali</a>
        </div>
     </main>  
    </body>
    <footer>
        <div class="footer-container">
        
        <p>Gaafadhu - Deebii argadhu &copy;2019</p>
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