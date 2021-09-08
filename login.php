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
                <input type="text" placeholder="Search...">
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
     <main class="main-container">
        <div class="input-form">
            <h2>Login</h2>
            <form action="db/logindb.php" method="POST">
              <input type="text" name="email" placeholder="Email"> <br>
              <input type="password" name="pass"  placeholder="Password"><br>
              <button type="submit" name="submit">Login</button>
            </form>
        </div>
       
     </main>  
    </body>
    <script src="js/jquery.js"></script>
    <script>
    $(document).ready(function(){
        $("#toggleimg").click(function(){
           $("#mob-view").toggle(1000);
       });
    });
    </script>
</html>