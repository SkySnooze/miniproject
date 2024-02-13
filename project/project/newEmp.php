<?php require 'logo.html';
$con = @mysqli_connect('localhost', 'computer', 'computerabc123$', 'miic1327') or die('Connection Error ');

mysqli_query($con, "SET NAMES utf8") or die('Exec Error');

?>
<style>
    table {
        width: 100%;
    }
</style>
<form action="newEmp.php" method="post">
    <tr>
        <td>Position:</td>

        <select name="select">
            <option value=''>Select All</option>
            <?php
            $result = mysqli_query($con, "SELECT id_pst, name_pst FROM position_KFC");

            while ($row = mysqli_fetch_array($result)) {
                $pst = $row['name_pst'];


                echo "<option value='$pst'>$pst</option>";

            }


            ?>
        </select>
        <input type="submit" name="search" value="search Recod">

        <?php
        if (isset($_POST["search"])) {
            $pst = $_POST["select"];

            $link = mysqli_query($con, "SELECT  * FROM new_emp_KFC
            WHERE new_emp_KFC.position_applied_for LIKE '%$pst%' 
            ORDER BY new_emp_KFC.id_nemp ASC") or die('Exec Error');

            echo '<table border="1">';
            echo '<th>id</th><th>name</th><th>lname</th><th>position</th><th>address</th><th>email</th><th>birtdate</th>
                  <th>gender</th><th>nationality</th><th>race</th><th>religion</th>';
            while ($row = mysqli_fetch_array($link)) {
                echo '<tr>';
                echo '<td>' . $row['id_nemp'] . '</td><td>' . $row['name_nemp'] . '</td><td>' . $row['lname_nemp'] . '</td><td>' . $row['position_applied_for'] . '</td><td>' . $row['address'] . '</td><td>' . $row['email'] . '</td><td>' . $row['birthdate'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['nationality'] . '</td><td>' . $row['race'] . '</td><td>' . $row['religion'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';


        } else {


            $link = mysqli_query($con, "SELECT  * FROM new_emp_KFC
            ORDER BY new_emp_KFC.id_nemp ASC") or die('Exec Error');

            echo '<table border="1">';
            echo '<th>id</th><th>name</th><th>lname</th><th>position</th><th>address</th><th>email</th><th>birtdate</th>
                  <th>gender</th><th>nationality</th><th>race</th><th>religion</th>';
            while ($row = mysqli_fetch_array($link)) {
                echo '<tr>';
                echo '<td>' . $row['id_nemp'] . '</td><td>' . $row['name_nemp'] . '</td><td>' . $row['lname_nemp'] . '</td><td>' . $row['position_applied_for'] . '</td><td>' . $row['address'] . '</td><td>' . $row['email'] . '</td><td>' . $row['birthdate'] . '</td><td>' . $row['gender'] . '</td><td>' . $row['nationality'] . '</td><td>' . $row['race'] . '</td><td>' . $row['religion'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>



    </tr>