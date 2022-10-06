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
    <title>Document</title>
</head>
<body>
    <form action="./processors/forumposter.php" method="post">
        Vicc feltöltésének kérése: <br>
        <input type="text" name="posttext" size="200" maxlength="200">
        <br>
        <input type="submit" value="Küldés" name="poszt">
    </form>
    
</body>
</html>