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
    <?php } ?>
<?php } ?>
