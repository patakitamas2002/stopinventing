<?php
    require '../mydbms.php';
    $con = connect('viccoldal','root','');
    $query="DELETE FROM post WHERE id=".$_POST['postId'];
    $result = mysqli_query($con, $query) or die ("Nem sikerült ".$query);

    header('Location: ../index.php');
?>