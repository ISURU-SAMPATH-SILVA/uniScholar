<div id="multiCardCarousel" class=" .multiCardCarousel-padi carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    
    <div class="carousel-item active">
      <div class="row">
        <?php for($i=0; $i<4; $i++) { ?>
          <div class="col-md-3"><?php include 'components/card.php'; ?></div>
        <?php } ?>
      </div>
    </div>
    
    <div class="carousel-item">
      <div class="row">
        <?php for($i=0; $i<4; $i++) { ?>
          <div class="col-md-3"><?php include 'components/card.php'; ?></div>
        <?php } ?>
      </div>
    </div>

  </div>
</div>
