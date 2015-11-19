<?php
$title = "Register";
include_once "includes/header.php";
include_once 'includes/register.inc.php'; // This is the registration page, it requires a special include
 ?>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->

        <div class="container">
          <div class="row">

        <h1>Create an account</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
      <div class="col-md-8">
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method="post"
                name="registration_form">
                <div class="form-group">
                  <label for="username">Choose a username</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                  <span id="helpBlock" class="help-block">Usernames may contain only digits, upper and lowercase letters and underscores.</span>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                  <span id="helpBlock" class="help-block">Your email must be in a valid format.</span>
                </div>


                <div class="form-group">
                  <label for="password">Input a password</label>
                  <div class="well">
                      <p>Passwords must contain<p>
                          <ul>
                              <li>At least one uppercase letter (A..Z)</li>
                              <li>At least one lowercase letter (a..z)</li>
                              <li>At least one number (0..9)</li>
                          </ul>
                  </div>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                  <span id="helpBlock" class="help-block">Passwords must be at least 6 characters long. </span>
                </div>
                <div class="form-group">
                  <label for="confirmpwd">Can you type that again for me?</label>
                  <input type="password" name="confirmpwd" id="confirmpwd" class="form-control" placeholder="Retype Password">
                  <span id="helpBlock" class="help-block">Your password and confirmation must match exactly.</span>
                </div>

            <input class="btn btn-lg btn-primary btn-block"
                   type="button"
                   value="Register"
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);"/>

        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
        </div>
        <div class="col-md-4">
          <h1 class = "title">:)</h1>
        </div>
      </div>
    </div>

<?php include_once "includes/footer.php" ?>
