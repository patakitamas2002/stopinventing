<?php
session_start();
require "../mydbms.php";
$con = connect('viccoldal', 'root', '');
$currentName = $_SESSION['username'];
$ujFelhasznalonev = $_POST['username'];
$ujJelszo = md5($_POST['password']);
$userId = $_SESSION['id'];
//var_dump($_FILES["pfp"]["tmp_name"]);


if (isset($_POST['username'])) {
    rename('../imgs/' . $currentName, '../imgs/' . $ujFelhasznalonev);
    $fileNev = trim($_FILES["pfp"]["name"]);
    //echo $fileNev;
    $utvonal = "../imgs/" . $ujFelhasznalonev . "/" . $fileNev;
    if (!empty($_POST['password']) &&  move_uploaded_file($_FILES["pfp"]["tmp_name"], $utvonal)) {
        
        if (!file_exists('../imgs/' . $currentName)) {
            mkdir("../imgs/" . $ujFelhasznalonev, 0777, true);
        }        
        //echo move_uploaded_file($_FILES["pfp"]["tmp_name"], $utvonal);
        //move_uploaded_file($_FILES["pfp"]["tmp_name"], $utvonal);
        $query = "UPDATE users
        SET username='$ujFelhasznalonev', password='$ujJelszo', pfp='$fileNev'
        WHERE userId=$userId";
    } elseif (move_uploaded_file($_FILES["pfp"]["tmp_name"], $utvonal)) {        
        if (!file_exists('../imgs/' . $currentName)) {
            mkdir("../imgs/" . $ujFelhasznalonev, 0777, true);
        }
        
        $query = "UPDATE users
            SET username='$ujFelhasznalonev', pfp='$fileNev'
            WHERE userId=$userId";
    } elseif (!empty($_POST['password'])) {
        $query = "UPDATE users
            SET username='$ujFelhasznalonev',password='$ujJelszo'
            WHERE userId=$userId";
    } else {
        $query = "UPDATE users
        SET username='$ujFelhasznalonev'
        WHERE userId=$userId";
    }
}
$result = mysqli_query($con, $query) or die("Nem sikerült " . $query);
$_SESSION['username'] = $ujFelhasznalonev;
//echo $fileNev;
echo "Sikeres frissítés!";
echo "<a href='../index.php?page=-10'>Vissza a profilomhoz</a>";
