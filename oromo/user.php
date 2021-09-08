<?php
session_start();
include 'db/database.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javaScript" src="js/jquery.js"></script>
        <title>A&Q | Gaafadhu - Deebii argadhu</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                <li><a href="">
                    <?php
                    if (isset($_SESSION['name'] )) {
                        echo '<a href="setting.php">'.$_SESSION['name'].'</a>';
                    }
                    ?>
                </a></li>
                <li><a href="db/logout.php">Bahi</a></li>
            </ul>
        </nav>
    </header>
    <aside class="aside1">
        <ul>
            <li><a href="user.php">Wirtuu</a></li>
            <li><a href="users.php">Fayyadamtoota</a></li>
        </ul>

    </aside>
    <aside class="aside2">
        <div>
          <?php
          $uid = $_SESSION['id'];
          $sql = "SELECT * FROM profileimg WHERE uid='$uid';";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result)>0) {
              while ($rows = mysqli_fetch_assoc($result)) {
                  if ($rows['status'] == 0) {
                    echo '<img src="uploads/user.png">'; 
                  }else {
                    $fileName = 'uploads/profile'.$uid."*";
                    $fileInfo = glob($fileName);
                    $fileExt = explode(".", $fileInfo[0]);
                    $fileActExt = $fileExt[1];
                    echo "<img src='uploads/profile".$uid.".".$fileActExt."' alt='Profile pictures'>";
                }
              }
          }
           echo '
            <h3>Maqaa: '.$_SESSION['name'].'</h3>
            <p>Muummee: '.$_SESSION['field'].'</p>
            <p>Iimeelii: '.$_SESSION['email'].'</p>
            <a href="setting.php">Qindaa\'ina</a> <br>
            <a href="db/logout.php">Bahi</a>
           ';

          ?>
           
        </div>
    </aside>
     <main class="main-container">
       <div class="user-div">
           <h2>Gaaffilee dhiyeenyaa</h2>
            <button id="ask-btn" >Gaafadhu</button>
            <div id="ask-form">
           <form action="db/askq.php" method="POST">
               <h4>Mata-duree</h4>
               <p>Mata-duree gaaffii kee ibsu galchi</p>
               <input type="text" name="title" placeholder="Mata-duree gaaffii...">
               <h4>Gaaffii</h4>
               <p>Gaaffii kee namaaf ifa godhi</p>
               <textarea name="question" placeholder="Gaaffee kee barreessi"></textarea>
               <h4>Jecha adda</h4>
               <p>Jecha addaa kan gaaffii kee ibsu itti dabali</p>
               <input type="text" name="tags" placeholder="Jechaa addaa fkn. fayyaa"> <br>
               <input type="hidden" name="lang" value="oromo">
               <button type="submit" name="submit">Gaafadhu</button>
           </form>
           </div>
       </div>
       <div class="qa-container">
          <?php
          $js_button="";
           if (isset($_SESSION['id'])) {
               $sql = "SELECT * FROM questions WHERE lang='oromo' ORDER BY asked_date DESC;";
               $result = mysqli_query($conn, $sql);
               $resultCheck = mysqli_num_rows($result);
               if ($resultCheck>0) {
               	
                 while ($row = mysqli_fetch_assoc($result)) {
                     $uid = $row['asked_by'];
                     $qid = $row['id'];

                   //Select the user who asked the question from database.
                   $stmt = "SELECT * FROM users WHERE id = '$uid';";
                   $res = mysqli_query($conn, $stmt);
                   $user  = mysqli_fetch_assoc($res);
                   $js_button.='$("#answer'.$row['id'].'").click(function(){$("#ans-form'.$row['id'].'").slideToggle(2000);  });';

                   echo '
                   <div> <h4><a href="#">'.$row['title'].'<a/></h4>
                    <p> '.$row['questoin'].'</p>
                    <p> <span> '.$row['tags'].'</span></p>
                     <p class ="user"> Kan gaafate: '.$user['name'].'
                     <p class= "user"> Guyyaa: '.$row['asked_date'].' </div>';
                // Select matching answers for the question
                   $asql = "SELECT * FROM answers WHERE qid = '$qid';";
                   $ansResult = mysqli_query($conn, $asql);
                   $resCheck = mysqli_num_rows($ansResult);
                   if ($resCheck>0) {
                       while ($ansRow = mysqli_fetch_assoc($ansResult)) {
                           //--SELECT USER WHO ANSWERED THE QUESTION
                           $userid = $ansRow['ans_by'];
                           $usql = "SELECT * FROM users WHERE id ='$userid';";
                           $uRes = mysqli_query($conn, $usql);
                           $userRow = mysqli_fetch_assoc($uRes);
                           echo '
                           <div class="ans-container">
                           <p class="ans-user"> '.$userRow['name'].'
                           <p > '.$ansRow['ans_date'].'
                            <p>'.$ansRow['answer'].'</p>
                            <form action="db/ans.php" method="POST">
                            <input type="hidden" name="ansid" value="'.$ansRow['id'].'">
                            <button class="like" type="submit" name="submit-like"><img src="imgs/good0.gif"></button> '.$ansRow['likes'].'
                            </form>
                           </div>
                           
                           ';
                       }
                   }
                 echo '
                     <button class="answer" id="answer'.$row['id'].'">Deebii kenni</button> <br>
                  <div class="ans-form" id="ans-form'.$row['id'].'">
                    <h4>Gaaffii kanaaf deebii kenni</h4>
                    <form action="db/ans.php" method="POST">
                    <input type="hidden" name="qid" value="'.$row['id'].'">
                   <textarea name="answer" cols="30" rows="5" placeholder="Deebii barreessi"></textarea>
                  <button type="submit" name="submit-ans">Deebisi</button>
                  </form>
                </div>
                   ';
                   
                   
                 }
               }
           }
           echo <<<_END
<script>
$(document).ready(function(){
$("#ask-btn").click(function(){
   $("#ask-form").slideToggle(2000);
});
$js_button
});
</script>
_END;
?>

    
       </div>
       
     </main>  
    </body>
    <footer>
        <div class="footer-container">
        
        <p>Ask - Get Answer &copy;2019</p>
        </div>
       
    </footer>
    <script src="js/jquery.js"></script>
    <script>
    $(document).ready(function(){
        $("#toggleimg").click(function(){
           $("#mob-view").toggle(1000);
       });
    });
    </script>
</html>