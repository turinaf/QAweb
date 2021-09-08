<?php
session_start();
include 'db/database.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javaScript" src="js/jquery.js"></script>
        <title>Ask-Get - 
            <?php
               if (isset($_SESSION['name'])) {
                   echo $_SESSION['name'];
               }         
    
            ?>
        </title>
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
                <li><a href="">
                    <?php
                    if (isset($_SESSION['name'] )) {
                        echo $_SESSION['name'];
                    }
                    ?>
                </a></li>
                <li><a href="db/logout.php">logout</a></li>
            </ul>
        </nav>
    </header>
    <aside class="aside1">
        <ul>
            <li><a href="user.php">Home</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="questions.php">Browse Questions</a></li>
            <li><a href="db/logout.php">Logout</a></li>
            

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
            <h3>User name: '.$_SESSION['name'].'</h3>
            <p>Field: '.$_SESSION['field'].'</p>
            <p>Email: '.$_SESSION['email'].'</p>
            <a href="user.php">Back</a>


           ';

          ?>
           
        </div>
    </aside>
    <main class="main-container">
        <div class="setting">
         <h2>Edit profile</h2> 
         <?php
          $id = $_SESSION['id'];
          $sql = "SELECT * FROM profileimg WHERE uid = '$id';";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result)>0) {
              while ($rows = mysqli_fetch_assoc($result)) {
                if( $rows['status'] == 0){
                    echo '<img src="uploads/user.png">';
                }else {
                    $fileName = 'uploads/profile'.$id."*";
                    $fileInfo = glob($fileName);
                    $fileExt = explode(".", $fileInfo[0]);
                    $fileActExt = $fileExt[1];
                    echo "<img src='uploads/profile".$id.".".$fileActExt."' alt='Profile pictures'>";
                }

              }
              echo '
              <form action="db/upload.php" method="POST" enctype="multipart/form-data">
              <label for="input">Update Profile picture: </label>
              <input type="file" name="file">
              <button type="submit" name="submit-update">Update</button><br><br><br>
              <div class="edit">
              <label for="input">Name:  </label>
              <input type="text" name="name" value="'.$_SESSION['name'].'"><br>
              <label for="input">Email: </label>
              <input type="email" name="email" value="'.$_SESSION['email'].'"><br>
              <label for="input">Field: </label>
              <input type="text" name="field" value="'.$_SESSION['field'].'"><br>
              <label for="input">Password: </label>
              <input type="password" name="pass" placeholder="New/Old password"><br>
              <button type="submit" name="submit-profile">Save Changes</button>
            </form>
            </div>
              ';

          }

         ?>    
        </div>
  
    </main>    

    </body>
    
</html>