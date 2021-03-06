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
            <h2 class="text-center">Hello,<?php echo htmlentities($_SESSION['username']); ?>, How are you?</h2>
            <h3 class="text-center">Looking for <a href="account.php">this?</a></h3>
            <h4 class="text-center">...or maybe you want to <a href="includes/logout.php">logout?</a> </a></h4>
        <?php else : ?>
      <form class="form-signin" action="includes/process_login.php" method="post" name="login_form">
        <h2 class="form-signin-heading text-center">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          <label class="pull-right">
            <a href="register.php">Register</a>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" value="Login" onclick="formhash(this.form,this.form.password);">Sign in</button>

        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error text-center">Error Logging In!</p>';
        }
        ?>
      </form>
      <?php endif; ?>
    </div>

    </div> <!-- /container -->
<?php include_once "includes/footer.php" ?>
