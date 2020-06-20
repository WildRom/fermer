<?php
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
  <title>Register from</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 d-none d-md-block image-container">
      </div>
      <div class="col-lg-6 col-md-6 form-container">
        <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
          <div class="logo mb-3">
            <img src="img/graphics-farm-283688.gif" alt="logo">
          </div>
          <div class="heading mb-4">
            <h4 class="ltu">Sukurkite akauntą</h4>
            <h4 class="eng">Create an account</h4>
          </div>
          <form action="register.php" method="post">
            <div class="form-input">
              <span><i class="fa fa-user"></i></span>
              <input type="text" name="account_name" placeholder="Account Name..." required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-envelope"></i></span>
              <input type="email" name="email" placeholder="Email address..." required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-lock"></i></span>
              <input type="password" name="password" placeholder="Password..." required>
            </div>
            <div class="row mb-3">
              <div class="col-12 d-flex">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" id="cb1" name="cb1">
                  <label for="cb1" class="cutom-control-label text-white ltu">Sutinku su visomis sąlygomis</label>
                  <label for="cb1" class="cutom-control-label text-white eng">I agree all terms & conditions</label>
                </div>
              </div>
            </div>
            <div class="text-left mb-3">
              <button type="submit" class="btn ltu">Registruotis</button>
              <button type="submit" class="btn eng">Register</button>
            </div>
            <div style="color: #777" class="ltu">Jau turi akauntą?
              <a href="index.php" class="login-link">Junkis čia</a>
            </div>
        </div>
        <div style="color: #777" class="eng">Already have an account?
          <a href="index.php" class="login-link">Login here</a>
        </div>
        </form>
      </div>
    </div>

  </div>
  </div>

  <script src=" js/main.js"></script>
</body>

</html>