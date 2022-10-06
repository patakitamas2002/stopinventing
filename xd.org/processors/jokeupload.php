<?php
session_start();
require '../mydbms.php';
    if(!isset($_POST['name']) &&
        !isset($_POST['joke']) &&
        !isset($_POST['file']))
    {
        echo "Adjon meg minden bementet!";
        echo "<a href='../index.php?page=5'>Vissza</a>";
    }
    else{ 
        $name = $_POST['name'];
        $userId = $_SESSION['id'];
        $artist = $_SESSION['username'];
        $joke = $_POST["joke"];
        $kuldes_datum = date("Y-m-d h:i:s");
        if(!file_exists('../jokes/'.$artist.'/'.$name)){
            mkdir("../jokes/".$artist.'/'.$name, 0777, true); 
        }
        
        $fileNev = trim($_FILES["file"]["name"]);
        $fileNev = preg_replace("/[^a-zA-Z0-9. ]/", "", $fileNev);
        //echo $fileNev;
        $utvonal = "../jokes/".$artist.'/'.$name."/".$fileNev;
        //echo $utvonal;
        move_uploaded_file($_FILES["file"]["tmp_name"], $utvonal);
        $con = connect('viccoldal', 'root', '');
        if(!isset($_POST['joke'])){
            $query = "INSERT INTO posts
            (postTitle,postImage,postLikes,postDate,uploaderId,postType)
            VALUES 
            ('$name','$fileNev',0,'$kuldes_datum','$userId','meme')"; 
        }
        else{
            $query = "INSERT INTO posts
            (postTitle,joke,postLikes,postDate,uploaderId,postType)
            VALUES 
            ('$name','$joke',0,'$kuldes_datum','$userId','joke')"; 
        }
        //echo $query;
        $result = mysqli_query($con, $query) or die ("Nem sikerült ".$query);
        header('Location: ../index.php');
    }
?>