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
            <a href="index.php">Ask - Get Answer</a>
        </div>
        <nav  id="mob-view">
            <ul>
                <li > <a href="index.php" id="brand">Gaafadhu</a> </li>
                <li> <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Barbaadi..." >
                <button type="submit" name="submit">Barbaadi</button>
                 </form></li>
              <li><a class="logsign" href="login.php">Seeni</a></li>
              <li><a class="logsign" href="signup.php">Galmaa'i</a></li>
              <li>
                  <form action="db/logindb.php" method="POST">
                    <select name="lang" id="">
                      <option >Afaan</option>
                      <option value="aoromoo">Afaan Oromoo</option>
                      <option value="amharic">Amharic</option>
                      <option value="english">English</option>
                    </select>
                    <button type="submit" name="switch-lang">Jijjiiri</button>
                  </form>
              </li>
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
            <h3>Fayyadamaa 'Gaafadhu' ta'i</h3>
            <p>Gaafii gaafadhu</p>
            <p>Deebii namootaaf kenni</p>
            <p>Faayidaa addaa argadhu.</p>
            <a href="signup.php">Fayyadami</a>
        </div>
    </aside>
     <main class="main-container">
        <div class="message-container">
            <div class="message">
            <h3> <span>Gaaffilee</span>  gosa kamuu gaafachuun <span>Deebii</span> namootaa fiixee adunyaa garagaraa irra jiran irraa argadhu.</h3>
            <p>Nama hundaaf ogeessoota kompiteeraan kan hojjatame!</p>
            </div>
        </div>
        <div class="ask-now">
            <div>
                <h2>Gaafii qabdaa?</h2>
                <a id="ask-now" href="">gaafadhu</a>
           </div>
           <div>
                <h2>Yookiin gaaffilee tanaan dura gaafataman ilaali</h2>
                <a href="questions.php">Ilaali</a>
           </div>
           
        </div>
     </main>  
    </body>
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
    <footer>
        <div class="footer-container">
        
        <p>Gaafadhu - deebii argadhu &copy;2019</p>
        </div>
       
    </footer>
</html>