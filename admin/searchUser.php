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
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Result search</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">ID User</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_REQUEST['ok']))
                            {
                            $search = addslashes($_GET['Search']);
                            if (empty($search)) {
                                echo "Enter the information you want to find";
                            }
                            else
                            {
                            $sql = "SELECT * FROM user WHERE nameUser like '%$search%'";
                            $result = $conn->query($sql);
                            $num = $result->num_rows;
                            if ($num > 0 && $search != "") {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td>
                                            <?php echo "" . $row["idUser"] . ""; ?>
                                        </td>
                                        <td>
                                            <?php echo "" . $row["nameUser"] . ""; ?>
                                        </td>
                                        <td>
                                            <?php echo "" . $row["emailUser"] . ""; ?>
                                        </td>
                                        <td>
                                            <?php echo "" . $row["birthdayUser"] . ""; ?>
                                        </td>
                                        <td>
                                            <a href="editUser.php?idUser=<?php echo "" . $row["idUser"] . ""; ?>"
                                               class="btn btn-sm btn-primary"> Edit </a>
                                            <a onclick="return confirm('Do you really want to delete?');"
                                               href="deleteUser.php?idUser=<?php echo "" . $row["idUser"] . ""; ?>"
                                               class="btn btn-sm btn-primary"> Delete </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Optional JS -->
<script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.0.0"></script>
</body>
</html><?php } ?>
<?php } ?>