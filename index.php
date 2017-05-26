<html>
<head>
    <title>Login</title>
    <link href="inlineSiding.css" rel="stylesheet">
</head>
    
<body>
    <div id = "center">
    <header>
        <h1> Limitless Database<h1>
	</header>   
    <center>
    <nav>
        <a href="adminFrontPage.php">Admin</a> &nbsp;
		<a href="crewViews/crewViews.php">Crew</a> &nbsp;
        <a href="userManual.pdf" target="_blank">Help</a> &nbsp;			
    </nav>
    <main>
        <form method="post" class="infoinput"/>
            <h1>Login
                <span>Enter Login Information</span>
            </h1>
            <label>
                <span>Username</span>
                <input type="text" placeholder="Username"name="user"/>
            </label>        
            <label>
                <span>Password</span>
                <input type="password"  placeholder="Password"name="pass"/>
            </label>        
            <label>
                <br>
                <input class="submit" type="submit" name="submit" value="Login"/><br><br><br>            
            </label>            
        </form>
    </main>
    </center>
    </div>
</body>    
</html>
<?php 

//If loging button is pressed
if (isset($_POST['submit']))
    {
        //Username and password values stored in variables
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        //Admin and Crew user front pages stored in variables
        $adminPage = "adminFrontPage.php";
        $crewPage = "views/crewViews.php";
        
        //2 sets of usernames and passwords initialized as "admin" and "crew"
        $adminUser = "admin";
        $adminPass = "password";
        $crewUser = "crew";
        $crewPass = "guest";
    
        //If username and password input = stored admin username and password
        if (($user == $adminUser) && ($pass == $adminPass))
        {
            //Then redirects to the Admin Front Page
            header("Location: " . $adminPage);
            exit;
        }
            
        //If username and password input = stored crew username and password
        if (($user == $crewUser) && ($pass == $crewPass))
        {
            //Then redirect to Crew Front Page
            header("Location: " . $crewPage);
            exit;
         }    
    
        //Otherwise returns a popup alert of "Invalid Username or Password"
        else 
        {
            echo '<script type="text/javascript">alert("Invalid Username or Password");</script>';
        }
    }
?>