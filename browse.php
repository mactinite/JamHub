    <?php
    $title = "Sign In";
    include_once "includes/header.php";
     ?>


    <div class="container">
      <div class="row">
        <h1 class="title text-center">Jam<strong>Hub</strong></h1>
        <hr/>
      </div>
      <div class="row">
        <?php if (login_check($mysqli) == true) : ?>
            <h2 class="text-center">Browse:</h2>
            <form method="get" action="user.php"
            <ul class="list-group">
                <li class="list-group-item"><strong>User</strong></li>

                <?php
                //Queries the database for the users to display in this list. May get long. TODO: Pagination, Search
                $query = "SELECT id, username FROM members";
                $stmt = $mysqli->query($query);
                while($row = $stmt->fetch_assoc()) {
                  echo "<li class='list-group-item'></a> <button type='submit' name='userprofile' value='".$row['id']."' class='btn'>".$row['username']."</button></li>";
                }

                ?>

            </ul>

      </form>
      <?php endif; ?>
    </div>

    </div> <!-- /container -->
<?php include_once "includes/footer.php" ?>
