<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #0000FF;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-item .nav-link {
            color: white;
            font-size: 1rem;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border: none;
            background-color: #ffffff;
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
        footer {
            text-align: center;
            margin-top: 50px;
            padding: 10px 0;
            background-color: #f8f9fa;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">User Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Dashboard</div>
                    <div class="card-body">
                        <h2 class="welcome-text">Welcome, {{ Auth::user()->name }}!</h2>
                        <p>This is the user dashboard. Customize this section with relevant user information and actions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @if(session('success'))
        <script>
            $(document).ready(function() {
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
            });
        </script>
    @endif
</body>
</html>
