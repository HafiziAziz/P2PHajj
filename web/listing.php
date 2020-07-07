<?php require('inc/db_connect.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>P2P Hajj Management</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="home"><strong>P2P Hajj</strong></a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="session">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <form action="" method="POST">
                  <button class="btn btn-sm btn-outline-secondary" type="submit" name="roles" value="admin">Admin</button>
                  <button class="btn btn-sm btn-outline-secondary" type="submit" name="roles" value="guider">Guide</button>
                  <button class="btn btn-sm btn-outline-secondary" type="submit" name="roles" value="guest">Guest</button>
                </form>
              </div>
            </div>
          </div>

  <?php 
    require_once( "inc/func_utilities.php" );

    if (empty($_POST['roles'])) {
      $_POST['roles'] = "guest";
    }
    echo "<h5>List of User - ".$_POST['roles']."</h5>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped table-sm'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Name</th>";
    echo "<th>IC/Passport No</th>";
    echo "<th>Contact No</th>";
    echo "<th>Emergency No</th>";
    echo "<th>UserName</th>";
    echo "<th>Password</th>";
    if ( $_POST['roles'] == "guider" || $_POST['roles'] == "guest" ) {
      echo "<th>Depart</th>";
      echo "<th>Arrival</th>";
      if ( $_POST['roles'] == "guider" ) {
        echo "<th>Longitude</th>";
        echo "<th>Latitude</th>";
      }
    }
    echo "</tr>";
    echo "</thead>";

    $listing = db_listing( $_POST['roles']);
    $count = mysqli_num_rows($listing);
    $i=1;
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($listing)) {

        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['ic_no']."</td>";
        echo "<td>".$row['contact_no']."</td>";
        echo "<td>".$row['emergency_no']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['password']."</td>";
        if ( $_POST['roles'] == "guider" || $_POST['roles'] == "guest" ) {
          echo "<td>".$row['depart']."</td>";
          echo "<td>".$row['arrival']."</td>";
          if ( $_POST['roles'] == "guider" ) {
            echo "<td>".$row['longitude']."</td>";
            echo "<td>".$row['latitude']."</td>";
          }
        }

        echo "</tr>";
      $i++;
    }
    echo "</tbody>";
  ?>
              
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
