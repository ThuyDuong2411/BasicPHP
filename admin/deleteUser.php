<?php
include('connection/conn.php');
if (isset($_GET['idUser']) && filter_var($_GET['idUser'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $idUser = $_GET['idUser'];
    $sql = "DELETE FROM user where idUser= '$idUser'";
    $result = $conn->query($sql);
    header('Location: User.php');
} else {
    header('Location: User.php');
}
?>