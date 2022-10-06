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
         
        input, button{   
            height: 34px;   
        }  </style> 
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
</head>
<body>
    <h1>Regisztráció</h1>
    <form action="../processors/register.php" method="POST" enctype="multipart/form-data">
        Email*: <input type="email" name="email" required placeholder="example@host.com"><br>
        Felhasználónév*: <input type="text" name="username" required placeholder="Username"><br>
        Jelszó*: <input type="password" name="password" placeholder="Password" required><br>
        Profilkép feltöltése: <input type="file" accept=".jpeg,.jpg,.png" name="pfp"><br>
        Jogosultság*:<br>
        <select name="perms" required>
            <option selected hidden disabled>Válasszon...</option>
            <option value="user">Felhasználó</option> 
            <option value="mod">Adminisztrátor</option>
        </select><br>
        <input type="submit" name="submit" value="Regisztrálok" />
    </form>
    
</body>
</html>