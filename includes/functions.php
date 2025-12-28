<?php
function setGameOptions($started = false, $number = 0, $hearts = 5)
{
    $_SESSION['game-started'] = $started;
    $_SESSION['number'] = $number;
    $_SESSION['guesses'] = [];
    $_SESSION['hearts'] = $hearts;
}