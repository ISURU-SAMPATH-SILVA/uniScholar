<?php

    $totalCards = 3;
    $cardIndex  = 0; 
?>
<div id="multiCardCarousel" class="multiCardCarousel-padi carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <h1>Choose your Faculty</h1>

        <div class="carousel-item active">
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) {
                    $cardIndex++;
                    $cardNum  = (($cardIndex - 1) % $totalCards) + 1;
                    $cardFile = "components/card{$cardNum}.php";
                    if (!file_exists($cardFile)) {
                        $cardFile = 'components/card.php';
                    }
                ?>
                    <div class="col-md-3"><?php include $cardFile; ?></div>
                <?php } ?>
            </div>
        </div>

        <div class="carousel-item">
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) {
                    $cardIndex++;
                    $cardNum  = (($cardIndex - 1) % $totalCards) + 1;
                    $cardFile = "components/card{$cardNum}.php";
                    if (!file_exists($cardFile)) {
                        $cardFile = 'components/card.php';
                    }
                ?>
                    <div class="col-md-3"><?php include $cardFile; ?></div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>