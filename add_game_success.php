<?php
$title = "Game Added!";
include_once "includes/header.php";
include_once "includes/functions.php";
 ?>
<div class="container">
  <div class="row">
    <?php if (login_check($mysqli) == true) : ?>
      <h1>Success!</h1>
      <h3><a href="add_game.php">Add More</a></h3>
    <?php endif; ?>

    </div>
    <div class="col-md-4">
      <?php if (login_check($mysqli) == true) : ?>

      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once "includes/footer.php" ?>
