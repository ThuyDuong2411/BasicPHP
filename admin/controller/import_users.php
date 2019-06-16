<?php
if(isset($_POST['submit'])){
    if($_FILES['file']['name']) {
        $filename = explode(".",$_FILES['file']['name']);
        if($filename[1] == 'csv') {
            $handle = fopen($_FILES['file']['tmp_name'],"r");
            $line = 1;
            while($data = fgetcsv($handle)) {
                $status = "Successful";
                $import = true;
                if(isset($data[0])&&!isset($data[3]))
                    echo "<p style='color: red'>Not enough data on line $line</p><br>";
                $line++;
                if(!isset($data[3])) continue;
                if (!preg_match("/^[a-zA-Z ]*$/",$data[0])) {
                    $status = "Invalid username(only word characters)";
                    $import = false;
                }
                if (!filter_var($data[1], FILTER_VALIDATE_EMAIL)) {
                    $status = "Invalid email.";
                    $import = false;
                }
                $today = date("Y-m-d");
                if (strtotime($data[2]) >= strtotime($today)){
                    $status = "Invalid birthday.";
                    $import = false;
                }
                if(strlen($data[3]) < 8){
                    $status = "Invalid password(at least 8 characters).";
                    $import = false;
                }
                $query = "SELECT emailUser FROM user where emailUser = '{$data[1]}'";
                $result_query = $conn -> query($query);
                if (mysqli_affected_rows($conn) == 1) {
                    $status = "Email existed.";
                    $import = false;
                }
                $item1 = mysqli_real_escape_string($conn, $data[0]);
                $item2 = mysqli_real_escape_string($conn, $data[1]);
                $item3 = mysqli_real_escape_string($conn, $data[2]);
                $item4 = mysqli_real_escape_string($conn, $data[3]);
                if($import){
                    $sql = "INSERT INTO user (nameUser, emailUser, passwordUser, birthdayUser) VALUE ('$item1','$item2',md5('$item3'),'$item4')";
                    mysqli_query($conn,$sql);
                }
                echo '<tr>
                                <td>
                                    '.$item1.' 
                                </td>
                                <td>
                                    '.$item2.'
                                </td>
                                <td>
                                    '.$item4.'
                                </td>
                                <td>
                                    '.$status.'
                                </td>
                            </tr>
                            </tbody>';
            }
            fclose($handle);
        }
        else{
            print "<p style='color: red'> Choose another file (.csv)</p>";
        }
    }
}
?>