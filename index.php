<?php
include 'check-game-is-started.php';
include 'functions.php';
$message = '';
$game_ended = false;
$success = false;
$number = $_SESSION['number'];
if (isset($_POST["guess"]) && !empty($_POST['guess'])) {
    $guess = $_POST["guess"];
    $_SESSION['guesses'][] = $guess;
    $_SESSION['hearts']--;
    if ($guess == $number) {
        $game_ended = true;
        $success = true;
        $message = '<div class="result success text-center">
            🎉 تبریک! حدست درست بود
            <br>
            تو بازی رو بردی
            <br>
             بازم بزنیم؟
        </div> ';
    } else if ($guess > $number) {
        $message = '<div class="result error text-center">
        ❌ حدست اشتباه بود، دوباره تلاش کن
        <br>
        راهنمایی میکنم، بیا پایین‌تر ⬇
    </div>';
    } else if ($guess < $number) {
        $message = '<div class="result error text-center">
        ❌ حدست اشتباه بود، دوباره تلاش کن
        <br>
        راهنمایی میکنم، برو بالاتر ⬆
    </div>';
    }
}
$hearts = $_SESSION['hearts'];
$guesses = $_SESSION['guesses'];

if ($game_ended == false && $hearts < 1) {
    $game_ended = true;
    $message = '<div class="result error text-center">
        ❌ متاسفانه جونات تموم شد و نتونستی حدس بزنی
        <br>
        عدد درست ' . $number . ' بود. 
        <br> 
        دوباره بازی میکنی؟
    </div>';
}

?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>بازی حدس عدد</title>
</head>

<body>

    <div class="game-container transparent-9">
        <h1 class="text-center">
            <?php
            for ($i = 0; $i < $hearts; $i++) {
                echo '💖';
            }
            for ($i = count($guesses) - 1; $i >= 0; $i--) {
                $g = $guesses[$i];
                $class = "text-danger";
                if ($g == $number)
                    $class = "text-success";
                echo '<span class="' . $class . '"> ' . $g . ' </span>';
            }
            ?>
        </h1>
        <hr />
        <?php
        if ($game_ended) {
            setGameOptions(false, 0, 0);
            echo $message . '<br><form action="./start-game.php" method="post">
                <input type="hidden" name="game" value="start">
                <button>شروع مجدد</button>
            </form>';
        } else {
            echo '<p class="text-center">یک عدد بین ۱ تا ۱۰۰ حدس بزن</p>
        <form method="post">
            <input type="number" min="1" max="100" name="guess" placeholder="عدد را وارد کنید" required>
            <button type="submit">حدس بزن</button>
        </form>
        ' . $message . '<br>
        <form class="flex-small" action="./start-game.php" method="post">
            <input type="hidden" name="game" value="stop">
            <button class="btn-danger">تسلیم 🏳</button>
        </form>';
        }
        ?>
    </div>
    <?php include 'floats.php' ?>

</body>

</html>