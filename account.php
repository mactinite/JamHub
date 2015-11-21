<?php
$title = "Account";
include_once "includes/header.php";
 ?>
<div class="container">
  <div class="row">
    <div class="col-md-4">
        <?php if (login_check($mysqli) == true) : ?>
          <div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">Welcome <?php echo htmlentities($_SESSION['username']); ?>!</h1>
            </div>
            <div class="panel-body">
                <p>This is the account page, where you will be able to add your games and your public contact info (twitter, G+, facebook, etc.)
                Also from here you will be able to access an account information page to change stuff like your email, password, and username.</p>
                <p>Return to <a href="index.php">login page</a></p>
            </div>
          </div>
        <?php else : ?>
          <div class="panel panel-primary">
            <div class="panel-heading">
            <h3 class="panel-title">You're not signed in! Oh No!</h1>
            </div>
            <div class="panel-body">
                <p>This is the account page, where you will be able to add your games and your public contact info (twitter, G+, facebook, etc.)
                Also from here you will be able to access an account information page to change stuff like your email, password, and username.</p>
                <p>Return to <a href="index.php">login page</a></p>
            </div>
          </div>
        <?php endif; ?>
    </div>
    <div class="col-md-8">
      <?php if (login_check($mysqli) == true) : ?>
      <form action="includes/data_delete.php" method="POST">
      <ul class="list-group">
          <li class="list-group-item">Account information for <strong><?php echo htmlentities($_SESSION['username']); ?></strong></li>
          <li class="list-group-item"><strong>Social Media Contact Methods</strong> <a class="btn btn-primary btn-xs pull-right" href="edit_sm.php">Add</a> </li>
          <?php
          //Queries the database for social media accounts that have been added to the account.
          $query = "SELECT account_sm.idx ,account_sm.sm_url, account_sm.fk_sm_type, account_sm.fk_user_id, social_media.id, social_media.sm_name
          FROM account_sm INNER JOIN social_media ON  account_sm.fk_sm_type = social_media.id
          WHERE fk_user_id = ".htmlentities($_SESSION['user_id']).";";
          $stmt = $mysqli->query($query);
          while($row = $stmt->fetch_assoc()) {
            echo "<li class='list-group-item'><a href='".$row['sm_url']."'>".$row['sm_name']."</a></a>
            <button type='submit' name='delete_sm' value=".$row['idx']." class='btn btn-danger btn-xs pull-right'>Delete</button> </li>";
          }
          ?>
          <li class="list-group-item"><strong>Linked Games</strong><a class="btn btn-primary btn-xs pull-right" href="add_game.php">Add</a></li>
          <?php
          $query = "SELECT idx, fk_user_id, game_name, game_url FROM account_games
          WHERE fk_user_id = ".htmlentities($_SESSION['user_id']).";";
          $stmt = $mysqli->query($query);
          while($row = $stmt->fetch_assoc()) {
            echo "<li class='list-group-item'><a href='".$row['game_url']."'>".$row['game_name']."</a>
            <button type='submit' name='delete_game' value=".$row['idx']." class='btn btn-danger btn-xs pull-right'>Delete</button> </li>";
          }
          ?>
          <li class="list-group-item">Current XP</li>
      </ul>
      </form>
      <?php else : ?>
        <ul class="list-group">
            <li class="list-group-item">Register an account and you'll see your</li>
            <li class="list-group-item">@Twitter</li>
            <li class="list-group-item">Facebook</li>
            <li class="list-group-item"><ul>Linked Games</ul></li>
            <li class="list-group-item">and your Jam XP</li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once "includes/footer.php" ?>
