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
                <input type="text" placeholder="barbaadi...">
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
     <main class="main-container">
        <div class="input-form">
            <h2>Seeni</h2>
            <form action="db/logindb.php" method="POST">
              <input type="text" name="email" placeholder="E-mail"> <br>
              <input type="password" name="pass"  placeholder="Password"><br>
              <button type="submit" name="submit">Seeni</button>
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