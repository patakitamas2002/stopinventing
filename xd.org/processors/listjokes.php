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
<?php
$con = connect('viccoldal', 'root', '');
$current =$_SESSION['id'];
$query = "SELECT uploaderId FROM posts Where uploaderId = $current";
$result = mysqli_query($con , $query);
$results = mysqli_fetch_all($result);
if(($_SESSION['role'] == "user" and $results) or $_SESSION['role'] == "mod")
    echo "<th>Törlés</th>" 

?>
</tr>  

<thead>  

<tr>  
<form action="" method="$_GET">
<th></th>
<th><input type="text" name="searchTitle" placeholder="Cím"></th>
<th><input type="text" name="searchArtist" placeholder="Készítő"></th>
<th><input type="text" name="searchLang" placeholder="Vicc"></th>
<th><input type="text" name="searchGenre" placeholder="Meme"></th> 

<th><button type="submit" name="kereses">Keresés</button></th>
</form>
</tr>  

<tbody>  


<?php  
$searchTitle= "";
$searchArtist= "";
$searchLang= "";
$searchGenre= "";
if(isset($_GET["searchTitle"])){    
    $searchTitle= $_GET["searchTitle"];
    echo $searchTitle;
}

if(isset($_GET["searchArtist"])){
    $searchArtist= $_GET["searchArtist"];
}
if(isset($_GET["searchLang"])){
    $searchLang= $_GET["searchLang"];
}
if(isset($_GET["searchGenre"])){
    $searchGenre= $_GET["searchGenre"];
}
   
$con = connect('viccoldal', 'root', '');
$query= "SELECT * FROM posts WHERE 
    name LIKE '%$searchTitle%' AND 
    artist LIKE '%$searchArtist%' AND
    language LIKE '%$searchLang%' AND
    genre LIKE '%$searchGenre%' ";
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