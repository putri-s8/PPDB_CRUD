<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            height: 100%;
            position: fixed;
            overflow-y: auto;
        }
        .sidebar h3 {
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar li {
            margin-bottom: 10px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }
        .card {
            border: none;
            background-color: #1e1e2f;
            color: #f8f9fa;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #0000FF;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: none;
            padding: 15px;
            border-radius: 5px 5px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .welcome-text {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .logout-btn {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }
        .settings-link {
            position: absolute;
            bottom: 20px;
            left: 80px;
        }
        .card .info-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        .info-card .info-title {
            font-size: 1rem;
            font-weight: 600;
        }
        .info-card .info-value {
            font-size: 1.5rem;
            font-weight: 700;
        }
        .chart-container {
            height: 300px;
            background-color: #1e1e2f;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Admin</h3>
            <ul>
                <li><a href="#">Dashboard</a></li>

            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-outline-light logout-btn">Logout</button>
            </form>
        </div>

        

        <!-- Page Content -->
        <div class="content">
        <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <h2 class="welcome-text">Welcome, {{ Auth::user()->name }}!</h2>
                    <p>This is the admin dashboard. You have full access to administrative features.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="info-card">
                            <div class="info-title">Active Sessions</div>
                            <div class="info-value">43,225</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="info-card">
                            <div class="info-title">Total Revenue</div>
                            <div class="info-value">$73,265</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="info-card">
                            <div class="info-title">Average Price</div>
                            <div class="info-value">447</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="info-card">
                            <div class="info-title">Add to Cart</div>
                            <div class="info-value">86%</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <canvas id="areaChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="donutChart"></canvas>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            var ctx1 = document.getElementById('areaChart').getContext('2d');
            var areaChart = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Active Sessions',
                        data: [300, 500, 400, 600, 700, 800],
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderColor: '#007bff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            var ctx2 = document.getElementById('donutChart').getContext('2d');
            var donutChart = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['In-Store Sales', 'Online Sales', 'Mail-Order Sales'],
                    datasets: [{
                        label: 'Sales',
                        data: [30, 50, 20],
                        backgroundColor: ['#007bff', '#28a745', '#ffc107'],
                        borderColor: ['#007bff', '#28a745', '#ffc107'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            @if(session('success'))
                var toast = `<div class="toast" style="position: absolute; top: 40px; right: 30px; z-index: 9999;" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <strong class="mr-auto">Success!</strong>
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                            </div>`;
                $('body').append(toast);
                var myToast = $('.toast');
                myToast.toast('show');

                setTimeout(function(){
                    myToast.toast('hide');
                }, 20000); 
            @endif
        });
    </script>
</body>
</html>
