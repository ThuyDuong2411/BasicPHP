<?php ob_start(); ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>Admin</title>
        <!-- Favicon -->
        <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>

    <body class="bg-default">
    <?php include('connection/conn.php'); ?>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="../home.php">
                                    <img src="../assets/img/brand/blue.png">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                        data-target="#navbar-collapse-main" aria-controls="sidenav-main"
                                        aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="index.php">
                                <i class="ni ni-planet"></i>
                                <span class="nav-link-inner--text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="login.php">
                                <i class="ni ni-circle-08"></i>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">Welcome!</h1>
                            <p class="text-lead text-light">Use these awesome forms to login or create new account in
                                your project for free.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent pb-5">
                            <div class="text-muted text-center mt-2 mb-4">
                                <small>Register</small>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $errors = array();
                                if (empty($_POST['nameUser'])) {
                                    $errors[] = 'nameUser';
                                } else {
                                    $nameUser = $_POST['nameUser'];
                                }
                                if (empty($_POST['emailUser'])) {
                                    $errors[] = 'emailUser';
                                } else {
                                    $emailUser = $_POST['emailUser'];
                                    if (!filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
                                        $errors[] = "Invalid email format";
                                    }
                                }
                                if (empty($_POST['birthdayUser'])) {
                                    $errors[] = 'birthdayUser';
                                } else {
                                    $birthdayUser = $_POST['birthdayUser'];
                                    $today = date("Y-m-d");
                                    if (strtotime($birthdayUser) >= strtotime($today))
                                    {
                                        $errors[] = 'birthdayUser';
                                    }
                                }
                                if (empty($_POST['passwordUser'])) {
                                    $errors[] = 'passwordUser';
                                } else {
                                    $passwordUser = $_POST['passwordUser'];
                                }
                                if (empty($errors)) {
                                    $sql = "INSERT INTO user(nameUser, emailUser, passwordUser, birthdayUser) VALUES ('$nameUser','$emailUser',md5('$passwordUser'),'$birthdayUser')";
                                    $result = $conn->query($sql);
                                    if (mysqli_affected_rows($conn) == 1) {
                                        echo "<p style='color: blue'> Successful </p>";
                                        header('Location: index.php');
                                    } else {
                                        echo "<p style='color: blue'>Fail</p>";
                                    }
                                }
                            }
                            ?>
                            <form role="form" name="register" method="POST">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Name" type="text" name="nameUser" value="<?php if(isset($_POST['nameUser'])) {echo $_POST['nameUser'];}?>">
                                        <?php
                                        if (isset($errors) && in_array('nameUser', $errors)) {
                                            echo "<p style='color: red'>Please enter username</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="email" name="emailUser" value="<?php if(isset($_POST['emailUser'])) {echo $_POST['emailUser'];}?>">
                                        <?php
                                        if (isset($errors) && in_array('emailUser', $errors)) {
                                            echo "<p style='color: red'>Please enter email</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-map-big"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Birthday" type="date"
                                               name="birthdayUser" value="<?php if(isset($_POST['birthdayUser'])) {echo $_POST['birthdayUser'];}?>">
                                        <?php
                                        if (isset($errors) && in_array('birthdayUser', $errors)) {
                                            echo "<p style='color: red'>Please enter birthday or invalid birthday</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password"
                                               name="passwordUser"  value="<?php if(isset($_POST['passwordUser'])) {echo $_POST['passwordUser'];}?>">
                                        <?php
                                        if (isset($errors) && in_array('passwordUser', $errors)) {
                                            echo "<p style='color: red'>Please enter password</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="text-muted font-italic">
                                    <small><span class="text-success font-weight-700"></span></small>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister"
                                                   type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">I agree with the <a
                                                            href="#!">Privacy Policy</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary mt-4" value="Create account"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                       target="_blank">To do</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.0.0"></script>
    </body>
    </html>
<?php ob_flush() ?>