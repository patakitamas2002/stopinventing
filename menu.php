
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

  </style>
</head>
<body>

<!--<div class="topnav">
<?php
    switch($_SESSION['permissions']) {
        case 'mod':
          echo "<a href='index.php?page=-5'>Zene feltöltése</a>";          
            break;
        }
?>  
  
    <a href='index.php?page=0'></a>
    <a href='index.php?page=-10'></a>
    <a href='index.php?page=10'></a><tr>";
    <a href='index.php?page=5'></a><tr>
    <div class="topnav-right">
      <a href='logout.php'>Kijelentkezés</a>
    </div>
</div>-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">XD.org</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php?page=0">Viccek listázása</a></li>
      <li><a href="index.php?page=-5">Feltöltés</a></li>
      </ul>
      <?php
      if(isset($_SESSION["id"])){
        require "./mydbms.php";
        $con = connect('viccoldal', 'root','');
        $userId = $_SESSION['id'];
        $query = "SELECT username,pfp,role FROM users WHERE userId = '$userId'";
        $userdata = mysqli_query($con, $query);
        $userdata = mysqli_fetch_array($userdata);
        $path = './imgs/'.$userdata[0].'/'.$userdata[1];
        if($userdata[1] == ""){
          $path = './default_pfp/'.$userdata[2].'.jpg';
        }
        echo '
        <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">';echo "<img src=$path class='profile_pic'>";
        echo '
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Kijelentkezés<i class="glyphicon glyphicon-log-out"></i></a></li>
          <li><a href="index.php?page=-10">Profilom módosítása</a></li>
          <li><a href="index.php?page=15">Posztjaim megtekinése</a></li>
        </ul>
      </li>
      </ul>
        ';
      }
      ?>
  </div>
</nav>
</body>
</html>
