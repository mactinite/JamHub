<?php
$title = "Add Social Media";
include_once "includes/header.php";
$query = "SELECT id, sm_name FROM jamhub.social_media ORDER BY id ASC;";

$stmt = $mysqli->query($query);

 ?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
        <?php if (login_check($mysqli) == true) : ?>
          <form method="post" action="includes/process_sm_edit.php"
                  method="post"
                  name="edit_sm_form">
                  <div class="form-group">
                    <label for="sm_type">Choose platform</label>
                    <select id="sm_type" class="form-control" name="sm_id">
                      <?php
                      while($row = $stmt->fetch_assoc()) {
                        echo "<option value=".$row['id'].">".$row['sm_name']."</option>";
                      }
                      ?>
                    </select>

                    <label for="url">Enter URL for your profile (FULL URL)</label>
                    <input id="url" name="sm_value" type="text" placeholder="Enter URL" class="form-control">
                  </div>

                  <input class="btn btn-lg btn-primary btn-block"
                         type="submit"
                         value="Add"
                         onclick="submit"/>

          </form>
        <?php endif; ?>

    </div>
    <div class="col-md-4">
      <?php if (login_check($mysqli) == true) : ?>

      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once "includes/footer.php" ?>
