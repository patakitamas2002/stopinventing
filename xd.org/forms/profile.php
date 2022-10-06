<!-- php tagek között kapcsolatot létrehozni, a seesionben eltárolt
id-jű  -->
<?php 
    $con = connect('viccoldal', 'root','');
    $userId = $_SESSION['id'];
    $query = "SELECT username,pfp,role FROM users WHERE userId = '$userId'";

    $userdata = mysqli_query($con, $query);
    $userdata = mysqli_fetch_array($userdata);
    //var_dump($userdata);
    //echo "<br>";
    $path = './imgs/'.$userdata[0].'/'.$userdata[1];
    //echo $path;
    //echo $path;
    //echo $userdata[2]." test";
    if($userdata[1] != ""){
        echo "<img src='$path' height=300>";
    }
    else{
        $path = './default_pfp/'.$userdata[2].'.jpg';
        echo "<img src=$path height=300>";
    }
    //echo "<img src = 'imgs/pfp/0cf4695592d3011073f3f31045137456.jpg'>";
?>
<p id="error" style="color:red"></p>

<link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <title>MyProfile</title>
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
    }
    </style> 

<form name="updateForm" action="processors/updateprofile.php" method="POST" enctype="multipart/form-data" onsubmit="return JelszoCheck()">
    <input type="hidden" name="userId" value=<?=$_SESSION['id']?>>
    Felhasználónév:
    <input type="text" name="username" require value=<?=$_SESSION['username']?>><br>

    Jelszó módosítása:
    <input type="password" name="password" value="" require><br>

    Jelszó megint:
    <input type="password" name="passwordAgain" value="" require><br>

    Profilkép frisstése: <input type="file" accept=".jpeg,.jpg,.png" name="pfp"/><br>

    <input type="submit" name="update" value="Frissít">
</form>
<form name="updateForm" action="processors/deletepfp.php" method="POST" >
    <input type="submit" name="deletepfp" value="Profilkép törlése">
</form>

<script>
    function JelszoCheck() {
        var jelszo = document.updateForm.jelszo.value;
        var jelszoMegint = document.updateForm.jelszoMegint.value;
        console.log(jelszo != jelszoMegint);
        if(jelszo != jelszoMegint) {
            document.getElementById('error').innerHTML = "A jelszavak nem egyenek";
            return false;
        }
        else {
            document.getElementById('error').innerHTML = "";
            return true;
        }
    }
</script>