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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viccek</title>
</head>
<body>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Id</th>  
<th>Cím</th>
<th>Készítő</th>
<th>Vicc</th>
<th>Meme</th> 
<th>Feltöltő ID</th>
<th>Letöltés</th>
</tr>  

<thead>  

<tr>  
<form action="" method="$_GET">
<th></th>
<th><input type="text" name="searchTitle" placeholder="Cím"></th>
<th><input type="text" name="searchArtist" placeholder="Készítő"></th>
<th><input type="text" name="searchJoke" placeholder="Vicc"></th>
<th><input type="text" name="searchMeme" placeholder="Meme"></th> 

<th><button type="submit" name="kereses">Keresés</button></th>
</form>
</tr>  

<tbody>  


<?php 
if(!isset($_SESSION['id'])){
require 'mydbms.php';
}

$searchTitle= "";
$searchArtist= "";
$searchJoke= "";
$searchMeme= "";
if(isset($_GET["searchTitle"])){    
    $searchTitle= $_GET["searchTitle"];
}

if(isset($_GET["searchArtist"])){
    $searchArtist= $_GET["searchArtist"];
}
if(isset($_GET["searchJoke"])){
    $searchJoke= $_GET["searchJoke"];
}
if(isset($_GET["searchMeme"])){
    $searchMeme= $_GET["searchMeme"];
}
   
$con = connect('viccoldal', 'root', '');
$query= "SELECT * FROM posts WHERE 
    postTitle LIKE '%$searchTitle%' AND 
    uploaderId LIKE '%$searchArtist%' AND
    joke LIKE '%$searchJoke%' AND
    meme LIKE '%$searchMeme%' ";
$result = mysqli_query($con , $query);
$results = mysqli_fetch_all($result);
foreach($result as $row){
?>  
            <tr>  
                <?php $path = "jokes/".$row["artist"]."/". $row["name"]."/". $row["file"] ?>
				<td><?php echo $row["id"]; ?></td>  
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["artist"]; ?></td>
				<td><?php echo $row["language"]; ?></td>
				<td><?php echo $row["genre"]; ?></td>
                <td><?php echo $row["userId"] ?> </td>
                
                <td><?php echo'<p><a href="'.$path.'" target="_blank">Letöltés</a></p>'; ?> </td>
                
                <?php if (($_SESSION['role'] == "user" and $result) or $_SESSION['role'] == "mod") : ?>
                    <td>
                    <form action="processors/songdelete.php" method="POST">
                        <input type="hidden" name="songId" value="<?= $row["id"] ?>">
                        <button type="submit">Töröl</button>
                    </form>
                    </td>
                <?php endif; ?>
                
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>  
</body>
</html>