<?php
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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

<body>
<?php include('connection/conn.php'); ?>
<!-- Sidenav -->
<?php include('includes/sidenav.php') ?>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php include('includes/navbar.php') ?>
    <!-- Header -->
    <?php include('includes/header.php') ?>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit user</h3>
                            </div>
                        </div>
                    </div>
                    <?php include ('controller/edit.php');?>
                    <div class="card-body">
                        <form method="POST">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" id="input-username" name="nameUser"
                                               class="form-control form-control-alternative" placeholder="abc"
                                               value="<?php if (isset($nameUser)) {
                                                   echo $nameUser;
                                               } ?>">
                                    </div>
                                    <?php
                                    if (isset($errors) && in_array('nameUser', $errors)) {
                                        echo "<p style='color: red'>Please enter username or invalid username.</p>";
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" id="input-email" name="emailUser"
                                               class="form-control form-control-alternative"
                                               placeholder="abc@example.com" value="<?php if (isset($emailUser)) {
                                            echo $emailUser;
                                        } ?>">
                                    </div>

                                    <?php
                                    if (isset($errors) && in_array('emailUser', $errors)) {
                                        echo "<p style='color: red'>Please enter email address or invalid email format.</p>";
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Birthday</label>
                                        <input type="date" id="input-birthday" name="birthdayUser"
                                               class="form-control form-control-alternative" placeholder="Date"
                                               value="<?php if (isset($birthdayUser)) {
                                                   echo $birthdayUser;
                                               } ?>">
                                    </div>

                                    <?php
                                    if (isset($errors) && in_array('birthdayUser', $errors)) {
                                        echo "<p style='color: red'>Please enter birthday or invalid birthday</p>";
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-sm btn-primary"
                                               value="Confirm">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('includes/footer.php') ?>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.0.0"></script>
</body>

</html>
<?php
ob_flush();
?>