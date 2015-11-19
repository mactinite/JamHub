<?php
$title = "Game Added!";
include_once "includes/header.php";
include_once "includes/functions.php";
 ?>
<div class="container">
  <div class="row">
    <?php if (login_check($mysqli) == true) : ?>
      <h1>Success! <a href="edit_sm.php">Add More</a></h1>
    <?php endif; ?>

    </div>
    <div class="col-md-4">
      <?php if (login_check($mysqli) == true) : ?>

      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once "includes/footer.php" ?>
