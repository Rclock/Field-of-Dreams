<html>
<head>

<a href="index.html"><button type="button">Back to Home</button></a>

<br></br>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css"/>

</head>
<body>
<script>
function invalidPass(){
	alert("Invalid Username/Password");
}
</script>
<!--<link rel="stylesheet" type="text/css" href="style-signin.css">-->
<script>                                                                                                                                     
        function doSubmitOne(e){                                                                                                             
                setTimeout(function(){location.href="admin.html"} , 30);                                                                      
        }
	function doSubmitTwo(e){                                                                                                            
                                                                                                                                            
                setTimeout(function(){location.href="login.php"} , 30);                                                                    
                                                                                                                                            
        }
</script>

<?php                                                                                                                                       
//create short names for variables
$user = $_POST['user'];
$pass = $_POST['pass'];
  
if ((!isset($user)) || (!isset($pass)))
{
?> 
<body id="body-color">
    <div id="Sign-In">
       <fieldset style="width:30%"><legend><h3>LOG IN</h3></legend>
           <form method="POST" action="login.php">
               <h3>User</h3> <br><input type="text" name="user" size="40"><br>
               <h4>Password</h4> <br><input type="password" name="pass" size="40"><br>
               <input type="submit" name="button" id="button" value="Log In">
           </form>
       </fieldset>
    </div>
    <?php
}
else if (($user=="admin") && ($pass=="fod"))
      {
     echo '<script type="text/javascript">',                                                                              
     'doSubmitOne(event);',                                                                                                                  
     '</script>'; 
      }
      else
      {
      echo "Wrong password.";
      echo '<script type="text/javascript">',                                                                              
     'doSubmitTwo(event);',                                                                                                                  
      '</script>';                                                                                                                               }
      
?>
    
</body>
</html> 
