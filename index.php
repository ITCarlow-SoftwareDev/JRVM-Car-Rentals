<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <!--<script type="text/javascript" src="./javascript/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <title>JRVM Car Rentals</title>
</head>
<body>
<!--All content is in wrapper include header and footer.-->
<header>
    <nav class="navbar" id="navbar">
        <div class="container content-1000">
            <a class="navbar-brand" href="#"><img src="images/logo.png" id="logo"></a>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="header-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">yourname<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Change Password</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!--<nav>-->
        <ul class="content-1000 nav nav-pills" id="header-menu">
            <!--<div class="row">-->
                <li role="presentation" class="header-menu-active"><a href="#">Rentals</a></li>
                <li role="presentation"><a href="#">Returns</a></li>
                <li role="presentation"><a href="#">File Maintenance</a></li>
                <li role="presentation"><a href="#">Customers</a></li>
                <li role="presentation"><a href="#">Reports</a></li>
            <!--</div>-->
        </ul>
    <!--</nav>-->
    <section class="container content-1000">

            <h1 class="col-lg-8 col-lg-offset-2 text-center" >Welcome to <span id="login-h1">JRVM</span> RENTALS</h1>
            <form class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="row">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="row">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="row"><br></div>
                    <div class="row">
                        <button class="btn btn-success col-lg-offset-2">Login</button>
                        <button class="btn btn-danger col-lg-offset-3">Cancel</button>
                    </div>
                </div>
            </form>

    </section>
</header>
</body>
</html>