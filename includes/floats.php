<div class="floating-shapes">
    <?php
    for ($i = 0; $i < 7; $i++) {
        $rnd = rand(1, 100);
        $float_class = "";
        if (isset($game_ended) && $game_ended == true) {
            if (isset($number))
                $rnd = $number;
            if (isset($success)) {
                if ($success == true) {
                    $float_class = "text-success";
                } else {
                    $float_class = "text-danger";
                }
            }
        }
        echo '<h1 class="shapes-logo ' . $float_class . '">' . $rnd . '</h1>';
    }
    ?>
</div>