<?php
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
    if (empty($_POST['passwordUser'])) {
        $errors[] = 'passwordUser';
    } else {
        $passwordUser = trim($_POST['passwordUser']);
        if(strlen($passwordUser) < 8){
            $errors[] = 'passwordUser';
        }
    }
    if (empty($errors)) {
        $query = "SELECT emailUser FROM user where emailUser = '{$emailUser}'";
        $result_query = $conn -> query($query);
        if (mysqli_affected_rows($conn) == 1) {
            echo "<p style='color: blue'> Email existed. </p>";
        } else {
            $sql = "INSERT INTO user(nameUser, emailUser, passwordUser, birthdayUser) VALUES ('$nameUser','$emailUser',md5('$passwordUser'),'$birthdayUser')";
            $result = $conn->query($sql);
            if (mysqli_affected_rows($conn) == 1) {
                echo "<p style='color: blue'> Successful. </p>";
                header('Location: index.php');
            }
            else {
                echo "<p style='color: blue'> Fail. </p>";
            }
        }
    }
}
?>