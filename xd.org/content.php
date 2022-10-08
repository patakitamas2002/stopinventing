
<?php
    if(!isset($_GET['page']) || empty($_GET['page']))
    {
        $d = 0;
    }
    else {
        $d = $_GET['page'];
    }

    switch($d) {
        case 0:
            include 'processors/listjokes.php';
            break;
        case -5:
            include 'forms/jokeupload.php';
            break;
        case -10:
            include 'forms/profile.php';
            break;
        case 5: 
            include 'forms/forumpost.php';
            break;
        case 10: 
            include 'forms/forum.php';
            break;
        case 15:
            include 'forms/myposts.php';
            break;
        default:
            echo '<p class="hiba">404! Ez az oldal nem létezik</p>';
            echo '<a href="./index.php?page=0" class="link">Vissza a főoldalra</a>';
            break;
    }
?>