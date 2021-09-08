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
                <input type="text" placeholder="Barbaadi...">
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
            <li><a href="questions.php">Gaaffilee ilaali</a></li>
            <li><a href="login.php">seeni</a></li>
        </ul>

    </aside>
     <main class="main-container">
        <div class="input-form">
            <h2>Galmaa'i</h2>
            <form action="db/signupdb.php" method="POST">
                <div>
                    <!-- <label for="">Name</label> -->
                    <input type="text" name="name" placeholder="Maqaa" >
                </div>
                <div>
                    <!-- <label for="">Email address</label> -->
                    <input type="email" name="email" placeholder="Iimeelii" >
                </div>
                <div>
                    <select name="field" id="" >
                        <option>Muummee filadhu --</option>
                        <option value="Programming">Afaan Komputeera</option>
                        <option value="Maths">Herreega</option>
                        <option value="Health">Fayyaa</option>
                        <option value="Agri">Qonna</option>
                        <option value="Social">Saayinsii hawaasaa</option>
                    </select> 
                </div>
                 <div>
                    <!-- <label for="">Password</label> -->
                    <input type="password" name="pass" id="pwd" placeholder="Jecha darbii">
                 </div>
                 <div>
                    <button type="submit" name="submit">Galmaa'i</button>
                 </div>
                 
            </form>
        </div>
       
     </main>  
    </body>
    <footer>
        <div class="footer-container">
        
        <p>Gaafadhu -  Deebii argadhu &copy;2019</p>
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