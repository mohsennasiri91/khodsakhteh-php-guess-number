<?php
session_start();
include_once 'functions.php';
if (isset($_POST['game'])) {
    switch ($_POST['game']) {
        case 'start':
            setGameOptions(true, rand(1, 100), 5);
            break;
        default:
            setGameOptions(false, 0, 0);
    }
} else {
    setGameOptions(false, 0, 0);
}
if ($_SESSION['game-started'] == true) {
    header("Location:./");
    die();
} else {
    header("Location:./about.php");
    die();
}
