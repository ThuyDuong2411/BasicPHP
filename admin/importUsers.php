<?php
ob_start();
?>
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

    <body>
    <?php include('connection/conn.php'); ?>
    <?php include('progress/deleteUser.php'); ?>
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
                                    <h3 class="mb-0">Import users</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['submit'])){
                                if($_FILES['file']['name']) {
                                    $filename = explode(".",$_FILES['file']['name']);
                                    if($filename[1] == 'csv') {
                                        $handle = fopen($_FILES['file']['tmp_name'],"r");
                                        while($data = fgetcsv($handle)) {
                                            $item1 = mysqli_real_escape_string($conn, $data[0]);
                                            $item2 = mysqli_real_escape_string($conn, $data[1]);
                                            $item3 = mysqli_real_escape_string($conn, $data[2]);
                                            $item4 = mysqli_real_escape_string($conn, $data[3]);
                                            $sql = "INSERT INTO user (nameUser, emailUser, passwordUser, birthdayUser) VALUE ('$item1','$item2',md5('$item3'),'$item4')";
                                            mysqli_query($conn,$sql);
                                        }
                                        fclose($handle);
                                        print "<p style='color: blue'> Import done </p>";
                                    }
                                }
                            }
                        ?>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="importUsers.php">
                                <div class="pl-lg-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Choose file</label>
                                            <input type="file" id="input-file" name = "file" class="form-control form-control-alternative" required="required">
                                        </div>
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