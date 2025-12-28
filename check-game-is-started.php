<?php
session_start();
if (!isset($_SESSION['game-started']) || $_SESSION['game-started'] != true) {
    header("Location:./about.php");
    die();
}
