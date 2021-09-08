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
            <li><a href="index.php">Home</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="questions.php">Browse Questions</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>

    </aside>
     <main class="main-container">
        <div class="input-form">
            <h2>Sign Up</h2>
            <form action="db/signupdb.php" method="POST">
                <div>
                    <!-- <label for="">Name</label> -->
                    <input type="text" name="name" placeholder="Name" >
                </div>
                <div>
                    <!-- <label for="">Email address</label> -->
                    <input type="email" name="email" placeholder="Email" >
                </div>
                <div>
                    <select name="field" id="" >
                        <option>Select field --</option>
                        <option value="Programming">Programming</option>
                        <option value="Maths">Mathemathics</option>
                        <option value="Health">Health</option>
                        <option value="Agri">Agriculture</option>
                        <option value="Social">Social sciences</option>
                    </select> 
                </div>
                 <div>
                    <!-- <label for="">Password</label> -->
                    <input type="password" name="pass" id="pwd" placeholder="Password">
                 </div>
                 <div>
                    <button type="submit" name="submit">Sign up</button>
                 </div>
                 
            </form>
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