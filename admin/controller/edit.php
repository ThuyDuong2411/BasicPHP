<?php
if (isset($_GET['idUser']) && filter_var($_GET['idUser'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $idUser = $_GET['idUser'];
} else {
    header('Location: User.php');
    exit();
}
$sql_id = "SELECT nameUser, emailUser, birthdayUser FROM user where idUser= '$idUser'";
$result_id = $conn->query($sql_id);
if (mysqli_num_rows($result_id) == 1) {
    list($nameUser, $emailUser, $birthdayUser) = mysqli_fetch_array($result_id, MYSQLI_NUM);
} else {
    $message = "<p style='color: red'>User don't exists!</p>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    if (empty($_POST['nameUser'])) {
        $errors[] = 'nameUser';
    } else {
        $nameUser = $_POST['nameUser'];
        if (!preg_match("/^[a-zA-Z ]*$/",$nameUser)) {
            $errors[] = 'nameUser';
        }
    }
    if (empty($_POST['emailUser'])) {
        $errors[] = 'emailUser';
    } else {
        $emailUser = $_POST['emailUser'];
        if (!filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'emailUser';
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
    if (empty($errors)) {
        $sql = "UPDATE user set nameUser = '$nameUser' , emailUser = '$emailUser', birthdayUser = '$birthdayUser' where idUser= '$idUser'";
        $result = $conn->query($sql);
        if (mysqli_affected_rows($conn) == 1) {
            echo "<p style='color: blue'> Successful </p>";
            header('Location: User.php');
        } else {
            echo "<p style='color: blue'>Fail</p>";
        }
    }
}
?>