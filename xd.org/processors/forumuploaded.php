<?php
    require '../mydbms.php';
    $con = connect('viccoldal','root','');
    $query="UPDATE post SET uploaded = 'true'  WHERE id=".$_POST['postId'];
    $result = mysqli_query($con, $query) or die ("Nem sikerült ".$query);
    header('Location: ../index.php');
?>