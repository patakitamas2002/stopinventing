
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
    }
?>