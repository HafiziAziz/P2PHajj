<?php session_start(); $_SESSION['test'] = "tt";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>P2P Hajj Management</title>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="#">P2P<span>Hajj</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="listing" class="nav-link">Listing</a></li>
            <li class="nav-item active"><a href="session" class="nav-link">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->
    <div class="bgg_p1" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center">
          <div class="col-lg-6 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text">
              <h1 class="mb-4"><strong>NOW</strong> <span><strong>Hajj</strong> is <strong>EASY</strong></span></h1>
              <p style="font-size: 18px;">Perjalanan <strong> LANCAR </strong> dan <strong> MUDAH </strong> dengan pengurusan <strong> TERBAIK </strong></p>
              <a href="https://vimeo.com/108577311" class="icon-wrap popup-vimeo d-flex align-items-center mt-4">
                <div class="icon d-flex align-items-center justify-content-center">
                  <span class="ion-ios-play"></span>
                </div>
                <div class="heading-title ml-5">
                  <span>Seruan Ibadah</span>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col"></div>
          <div class="col-lg-4 col-md-6 mt-0 mt-md-5 d-flex">
            <form class="request-form ftco-animate" action="registration.php" method="post">
              <h2>Registration</h2>
              <div class="form-group">
                <label for="" class="label">Role</label>
                  <select class="form-control" name="role" onchange='CheckColors(this.value);'>                      
                    <option value="guest">Guest</option>
                    <option value="guider">Guider</option>
                    <option value="admin">Admin</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="" class="label">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" required="required">
              </div>
              <div class="form-group">
                <label for="" class="label">Identification/Passport Number</label>
                <input type="text" class="form-control" placeholder="ABX12345" name="ic_no" required="required">
              </div>
              <div class="form-group">
                <label for="" class="label">Contact Number</label>
                <input type="text" class="form-control" placeholder="0178776244" name="contact_no" required="required">
              </div>
              <div class="form-group">
                <label for="" class="label">Emergency Contact</label>
                <input type="text" class="form-control" placeholder="0178776244" name="emergency_no" required="required">
              </div>
              <div class="form-group">
                <label for="" class="label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" required="required">
              </div>
              <div class="form-group">
                <label for="" class="label">Password</label>
                <input type="password" class="form-control" placeholder="" name="password" required="required">
              </div>
              <div class="d-flex" >
                  <div class="form-group mr-2" id="hidden_field" style='display:block;'>
                    <label for="" class="label">Depart date</label>
                    <input type="text" class="form-control" id="book_pick_date" placeholder="Date" name="depart">
                  </div>
                  <div class="form-group ml-2" id="hidden_field_2" style='display:block;'>
                    <label for="" class="label">Return date</label>
                    <input type="text" class="form-control" id="book_off_date" placeholder="Date" name="arrival">
                  </div>
              </div>
              <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary py-3 px-4">
              </div>
              <div class="form-group">
                <input type="reset" value="Clear" class="btn btn-primary py-3 px-4">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- Custom Script -->
  <script src="js/form_control.js"></script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

<?php session_destroy(); ?>
