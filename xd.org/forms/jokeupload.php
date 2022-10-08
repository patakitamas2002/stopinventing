<link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <style>   
    input {
    display: block;
    box-sizing: border-box;
    }
    
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
<?php
    if(!isset($_SESSION['id'])){
        echo '<p>A folytatáshoz <a href="./forms/loginform.php">jelentkezzen be!</a></p>';
    }
    else{
        echo '<form action="processors/jokeupload.php" method="POST" enctype="multipart/form-data">
        <label for="name">Cím: *</label>
        <input type="text" name="name" id="name" required/><br>
    
        <label for="joke">Vicc: </label><br>
        <textarea name="joke" id="joke" style="resize:none;" rows="20" cols="25"></textarea><br>
    
        <label for="file">File (meme esetén): </label>
        <input type="file" accept=".jpg,.png,.jpeg,.gif" name="file" id="file"/><br>
    
        <button type="submit">Hozzáadás</button>
    </form>';
    }
?> 
