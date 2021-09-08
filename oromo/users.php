<!DOCTYPE html>
<html>
    <head>
        <title>A&Q | Gaafadhu - Deebii argadhu</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <header>
        <nav>
            <ul>
                <li > <a href="index.php" id="brand">Gaafadhu</a> </li>
                <li> <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Barbaadi...">
                <button type="submit" name="submit">Barbaadi</button>
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
         <div class="users">
         <?php
         include 'db/database.php';
          $sql = "SELECT * FROM users;";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result)>0) {
            for ($col=0; $col < 3; $col++) { 
              while ($rows = mysqli_fetch_assoc($result)) {
                  $uid = $rows['id'];
                  $query = "SELECT * FROM profileimg where uid='$uid';";
                  $imgRes = mysqli_query($conn, $query);
                  
                  echo "<div>";
                  if (mysqli_num_rows($imgRes)>0) {
                      while ($imgRows = mysqli_fetch_assoc($imgRes)) {
                          if ($imgRows['status'] == 0) {
                              echo '<img src="uploads/user.png" alt="Profile Picture">';
                          }else {
                            $fileName = 'uploads/profile'.$uid."*";
                            $fileInfo = glob($fileName);
                            $fileExt = explode(".", $fileInfo[0]);
                            $fileActExt = $fileExt[1];
                            echo "<img src='uploads/profile".$uid.".".$fileActExt."' alt='Profile pictures'>";
                          }
                      }
                  }
                echo "
                 <h2>".$rows['name']."</h2>
                 <p>".$rows['field']."</p>
                </div>
              ";
          }
         } 
         echo "<br>";
        }   
         ?>
         </div>
     </main> 
       
    </body>
    <!-- <footer>
        <div class="footer-container">
        
        <p>Ask - Get Answer &copy;2019</p>
        </div>
       
    </footer> -->
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