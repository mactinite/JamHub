    <?php
    include_once "includes/header.php";
    $profile_id = $_GET["userprofile"];
    $title = "User Profile";
    $query = "SELECT members.username FROM members WHERE id = $profile_id";
    $stmt = $mysqli->query($query);
    $row = $stmt->fetch_assoc();
    $profile_user = $row['username']
     ?>


    <div class="container">
      <div class="row">
        <?php if (login_check($mysqli) == false) { ?>
          <p>Pssst! I register an account <a href="register.php">here</a></p>
        <?php }
        if($mysqli->query($query) === false){
          echo "<h1 class='text-center'>We couldn't find that user :(</h1>";
        }
        else{?>
          <h1 class="text-center"><strong><?php echo $profile_user ?></strong></h1>
          <div class="col-md-6" >
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title"><strong>Social Media</strong></h1>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                  <?php
                  //Queries the database for social media accounts that have been added to the account.
                  $query = "SELECT account_sm.idx ,account_sm.sm_url, account_sm.fk_sm_type, account_sm.fk_user_id, social_media.id, social_media.sm_name
                  FROM account_sm INNER JOIN social_media ON  account_sm.fk_sm_type = social_media.id
                  WHERE fk_user_id = ".$profile_id.";";
                  $stmt = $mysqli->query($query);
                  while($row = $stmt->fetch_assoc()) {
                    echo "<li class='list-group-item'><a href='".$row['sm_url']."'>".$row['sm_name']."</a></li>";
                  }
                  ?>
            </div>
          </div>
          </div>
          <div class="col-md-6" >
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title"><strong>Games</strong></h1>
            </div>
            <div class="panel-body">
              <ul class="list-group">
              <?php
              $query = "SELECT idx, fk_user_id, game_name, game_url FROM account_games
              WHERE fk_user_id = ".$profile_id.";";
              $stmt = $mysqli->query($query);
              while($row = $stmt->fetch_assoc()) {
                echo "<li class='list-group-item'><a href='".$row['game_url']."'>".$row['game_name']."</a></li>";
              }
              ?>
            </ul>
            </div>
          </div>
          </div>
        <?php }?>


    </div>

    </div> <!-- /container -->
<?php include_once "includes/footer.php" ?>
