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
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">User tables</h3>
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
                            $limit = 4;
                            if (isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' => 1))){
                                $start = $_GET['s'];
                            }
                            else {
                                $start = 0;
                            }
                            if (isset($_GET['p']) && filter_var($_GET['p'], FILTER_VALIDATE_INT, array('min_range' => 1))){
                                $per_page = $_GET['p'];
                            }
                            else {
                                $sql_page = "SELECT COUNT(idUser) from user";
                                $result_page = $conn->query($sql_page);
                                list($record) = $result_page -> fetch_array(MYSQLI_NUM);
                                if($record > $limit) {
                                    $per_page = ceil($record/$limit);
                                }
                                else {
                                    $per_page = 1;
                                }
                            }
                            $sql = "SELECT idUser, nameUser, emailUser,birthdayUser FROM user LIMIT {$start},{$limit} ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                            ?>
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
                            </tbody>
                            <?php
                            }
                            ?>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <?php
                                echo "<ul class='pagination justify-content-end mb-0'>";
                                if($per_page > 1){
                                    $current_page = ($start/$limit) + 1;
                                    if($current_page !=1 ) {
                                        echo "<li class='page-item'>
                                                  <a class='page-link' href='User.php?s=".($start - $limit)."&p={$per_page}'>
                                                      <i class='fas fa-angle-left'></i>
                                                      <span class='sr-only'>Previous</span>
                                                  </a>
                                              </li>";
                                    }
                                    for ($i =1 ; $i <= $per_page; $i++)
                                    {
                                        if($i != $current_page)
                                        {
                                            echo "<li class='page-item'>
                                                      <a class='page-link' href='User.php?s=".($limit*($i-1))."&p={$per_page}' >{$i}</a>
                                                  </li>";
                                        }
                                        else
                                        {
                                            echo "<li class='page-item active'>
                                                      <a class='page-link'>{$i}</a>
                                                  </li>";
                                        }
                                    }
                                    if($current_page != $per_page)
                                    {
                                        echo "<li class='page-item'>
                                                  <a class='page-link' href='User.php?s=".($start + $limit)."&p={$per_page}'>
                                                      <i class='fas fa-angle-right'></i>
                                                      <span class='sr-only'>Next</span>
                                                  </a>
                                              </li>";
                                    }
                                }
                                echo "</ul>";
                            ?>
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
</html>