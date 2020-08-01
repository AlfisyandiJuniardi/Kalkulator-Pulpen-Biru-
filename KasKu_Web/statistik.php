<!DOCTYPE html>
<html>
<head>
	<title>Kasku</title>
  <link rel="shortcut icon" href="logo.JPG">
  <link rel="stylesheet" type="text/css" href="custom.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <script type="text/javascript" src="js/Chart.js"></script>
</head>
<body style="font-family: 'Open Sans', sans-serif;">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0866c6; box-shadow: 0 3px 3px rgba(0, 0, 0, 0.05);">
    <a class="navbar-brand text-white ml-2" href="#">KasKu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars" style="color: white;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="ml-auto text-white">Fikri Haekal | <i class="fas fa-sign-out-alt ml-1" style="color: white;" data-toggle="tooltip" title="Logout"></i></div>
    </div>
  </nav>
  <nav class="row no-gutters mt-5">
    <div class="col-md-2" style="border: none; background-color: #1F2837;">
      <ul class="nav flex-column pt-2">
        <li class="nav-item">
          <a class="nav-link text-white mt-4 pt-3 pb-3" href="index.php">
            <table class="ml-2">
              <tr>
                <td width="30px"><i class="fas fa-tachometer-alt"></i></td>
                <td>Dashboard</td>
              </tr>
            </table>
            </a>
            <div class="garis"></div>
        </li>
        <li class="nav-item">
          <a class="nav-link pt-3 pb-3 disabled" href="statistik.php" style="background-color: #EDEDED; color: #0866c6;">
            <table class="ml-2">
              <tr>
                <td width="30px"><i class="fas fa-chart-pie"></i></td>
                <td>Statistik</td>
              </tr>
            </table>
            </a>
            <div class="garis"></div>
        </li>
      </ul>
    </div>

    <div class="col-md-10 mt-2 pt-4 pl-4 pr-4" style="background-color: #EDEDED;">
      <h1>Statistik</h1><br>
      <div class="row no-gutters">

        <div class="card mr-4 mb-4" style="min-width: 490px; border: none;">
          <div class="card-body">
            <h5 class="card-title">Grafik Batang</h5>
            <canvas id="myChart1"></canvas>
              <script>
                var tgl = new Date();
                var day = tgl.getDate();
                var ctx = document.getElementById("myChart1").getContext('2d');
                var mybar = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: [ day-5, day-4, day-3, day-2, day-1, day ],
                    datasets: [ { label: 'Pengeluaran',
                      data: [2, 8, 4, 2, 2, 1],
                      backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 99, 132, 0.2)'
                      ],
                      borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(255,99,132,1)',
                      'rgba(255,99,132,1)',
                      'rgba(255,99,132,1)',
                      'rgba(255,99,132,1)',
                      'rgba(255,99,132,1)'
                      ],
                    borderWidth: 1
                    }, {
                      label: 'Pemasukan',
                      data: [1, 1, 3, 1, 5, 3],
                      backgroundColor: [
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)'
                      ],
                      borderColor: [
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(54, 162, 235, 1)'
                      ],
                    borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero:true
                        }
                      }]
                    }
                  }
                });
              </script>
          </div>
        </div>
        <div class="card mb-4" style="min-width: 490px; border: none;">
          <div class="card-body">
            <h5 class="card-title">Grafik Garis</h5>
            <canvas id="myChart2"></canvas>
              <script>
                var tgl = new Date();
                var day = tgl.getDate();
                var ctx = document.getElementById('myChart2').getContext('2d');
                var myline = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [ day-5, day-4, day-3, day-2, day-1, day ],
                        datasets: [{
                            label: 'Pengeluaran',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255,99,132,1)',
                            data: [5, 10, 5, 2, 20, 3]
                        },{
                            label: 'Pemasukan',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            data: [1, 4, 5, 5, 6, 1]
                        },]
                    },

                    // Configuration options go here
                    options: {}
                });
              </script>
          </div>
        </div>

        <div class="card mb-4 mr-4" style="min-width: 490px; border: none;">
          <div class="card-body">
            <h5 class="card-title">Grafik Pie</h5>
            <canvas id="myChart3"></canvas>
              <script>
                var tgl = new Date();
                var day = tgl.getDate();
                var ctx = document.getElementById('myChart3').getContext('2d');
                var myradar = new Chart(ctx, {
                    type: 'radar',
                    data: {
                      labels: [ day-5, day-4, day-3, day-2, day-1, day ],
                        datasets: [{
                            label: 'Pengeluaran',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255,99,132,1)',
                            data: [50, 13, 50, 20, 20, 30]
                        },{
                            label: 'Pemasukan',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            data: [11, 40, 50, 50, 60, 19]
                        },]
                    },
                    // Configuration options go here
                    options: {}
                });
              </script>
          </div>
        </div>

        <div class="card mb-4" style="min-width: 490px; border: none;">
          <div class="card-body">
            <h5 class="card-title">Grafik Pie</h5>
            <canvas id="myChart4"></canvas>
              <script>
                var tgl = new Date();
                var day = tgl.getDate();
                var ctx = document.getElementById('myChart4').getContext('2d');
                var mypie = new Chart(ctx, {
                    type: 'pie',
                    data: {
                      labels: ["Pengeluaran", "Pemasukan"],
                      datasets:[{
                        data: [25000,300000],
                        backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'],
                        borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)']
                      },]
                    },
                    // Configuration options go here
                    options: {}
                });
              </script>
          </div>
        </div>

      </div>
      
    </div>
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <!--<script defer src="fontawesome/svg-with-js/js/fontawesome-all.min.js"></script>-->
  <script src="https://kit.fontawesome.com/943305e699.js" crossorigin="anonymous"></script>
</body>
</html>
