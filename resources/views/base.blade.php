<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- styles css -->
    <link href="{{ asset('css/base_styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{% static 'simplemde/debug/simplemde.css' %}" />
    <title>Just Du It !</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div>
                    <ul class="nav navbar-nav">
                        <!-- dropdwon -->
                        <li>
                            <div class="dropdown">
                                <button type="button" class="btn btn-link dropdown-toggle" aria-label="Left Align" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <!-- home or view all shoe -->
                                    <li><a href="{{ url('/') }}">View All Shoe</a></li>
                                    @if ($auth)
                                        <!-- admin only -->
                                        @if ($role == 'admin')
                                            <!-- add new shoe -->
                                            <li><a href="{{ url('/add-shoe') }}">Add Shoe</a></li>
                                            <!-- view all transaction -->
                                            <li><a href="{{ url('/view-all-transaction') }}">View All Transaction</a></li>
                                        <!-- member only -->
                                        @elseif ($role == 'member')
                                            <!-- view member's cart -->
                                            <li><a href="{{ url('/view-cart') }}">View Cart</a></li>
                                            <!-- view member's transaction -->
                                            <li><a href="{{ url('/view-transaction') }}">View Transaction</a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <!-- logo -->
                        <li><img src="{{ url('/') }}/assets/logo.png" alt="no image" class="navbar-brand"></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="search-bar">
                            <!-- paginate searching -->
                            <form action="/" method="get">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search shoe in here..." name="search" value="{{ Request::input('search') }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="submit" href="/">Search</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        @if ($auth)
                            <li>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-link dropdown-toggle nav-username" aria-label="Left Align" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                       welcome, {{ $username }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/logout') }}" id="logout">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li><a class="navbar-brand" href="{{ url('/login') }}" id="login">Login</a></li>
                            <li><a class="navbar-brand" href="{{ url('/register') }}" id="register">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    <!-- content -->
    <div class="container">
        @yield('body')
    </div>
</body>
</html>