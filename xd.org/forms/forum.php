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
    <title>Zenék</title>
</head>
<body>
<table class="table table-bordered table-striped">  

<thead>  
<tr>  
<th>Létezik már?</th>  
<th>Posztoló ID</th>
<th>Szöveg</th>
<?php
//session_start();
if($_SESSION['permissions'] == "mod")
    echo "<th>Feltölve</th>" 
?>
<?php
if($_SESSION['permissions'] == "mod")
    echo "<th>Törlés</th>" 
?>

<?php
require "./mydbms.php";     
$con = connect('viccoldal', 'root', '');
$query= "SELECT * FROM posts";
$result = mysqli_query($con , $query);

foreach($result as $row){
?>
<tr>  
				<td><?php echo $row["uploaded"]; ?></td>  
				<td><?php echo $row["userId"]; ?></td>
				<td><?php echo $row["posttext"]; ?></td>
                <?php if ($_SESSION['permissions'] == 'mod') : ?>
                    <td>
                    <form action="processors/forumuploaded.php" method="POST">
                        <input type="hidden" name="postId" value="<?= $row["id"] ?>">
                        <button type="submit">Megjelölés létezőként</button>
                    </form>
                    </td>
                <?php endif; ?>
                <?php if ($_SESSION['permissions'] == 'mod') : ?>
                    <td>
                    <form action="processors/forumdelete.php" method="POST">
                        <input type="hidden" name="postId" value="<?= $row["id"] ?>">
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