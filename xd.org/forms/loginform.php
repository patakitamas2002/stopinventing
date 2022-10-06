<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <style>   
    table {  
        border-collapse: collapse;  
    }  
    .inline{   
        display: inline-block;   
               
        margin: 20px 0px;   
    }
    
    input {
    display: block;
    box-sizing: border-box;
    }
         
    input, button{   
        height: 34px;   
    }

    html,body {
        height:100%;
        width:100%;
        margin:0;
    }
    body {
    display:flex;
    }
    form {
    margin:auto;
    }
    </style> 
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="../processors/login.php" method="post">
        Felhasználónév:
        <input type="text" name="username">
        <br>
        Jelszó:
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Bejelentkezés" name="login">
        
        <button><a href ="regform.php">Regisztráció</a></button>
    </form>
    
</body>
</html>