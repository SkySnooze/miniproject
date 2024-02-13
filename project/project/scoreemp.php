<?php require 'logo.html';

include("condb.php");

if (isset($_POST['submit'])) {
    $id_score = $_POST['id_score'];
    $technical = $_POST['technical'];
    $leaning = $_POST['leaning'];
    $creator = $_POST['creator'];
    $hum_rela = $_POST['hum_rela'];
    $y_n = $_POST['y_n'];
    $detail = $_POST['detail'];
    $emp_intv = $_POST['emp_intv'];
    $NewEmp = $_POST['NewEmp'];
   

    $txtSQL = "INSERT INTO score_nemp_KFC (id_score,technical,leaning,creator,hum_rela,y_n,detail,emp_intv,NewEmp) VALUES('$id_score','$technical','$leaning','$creator','$hum_rela','$y_n','$detail','$emp_intv','$NewEmp')";
    mysqli_query($con, $txtSQL);
    header('location: scoreemp.php');
    exit();
  }

  $link = mysqli_query($con, "SELECT * FROM `score_nemp_KFC` ") or die('Exec Error');
  echo '<table border="1">';
  echo '<th>id_score</th><th>technical</th><th>leaning</th><th>creator</th><th>hum_rela</th><th>detail</th><th>emp_intv</th><th>NewEmp</th>';
  while ($row = mysqli_fetch_array($link)) {
    echo '<tr>';
    echo '<td>'. $row['id_score']. '</td><td>' . $row['technical'] . '</td><td>' . $row['leaning'] . '</td><td>' . $row['creator'] . '</td><td>' . $row['hum_rela'] . '</td><td>' . $row['detail'] . '</td>
      <td>' . $row['emp_intv'] . '</td><td>'. $row['NewEmp']. '</td>';
    echo '</tr>';
  }
  echo '</table>';
  ?>

  
<form action="scoreemp.php" method="post">
  <table>

    <tr>
      <td>technical:</td>
      <td><input type="text" name="technical" value="<?= isset($technical) ? $technical : '' ?>"></td>
    </tr>
    <tr>
      <td>leaning:</td>
      <td><input type="text" name="leaning" value="<?= isset($leaning) ? $leaning : '' ?>"></td>
    </tr>
    <tr>
      <td>creator:</td>
      <td><input type="text" name="creator" value="<?= isset($creator) ? $creator : '' ?>"></td>
    </tr>
    <tr>
      <td>hum_rela:</td>
      <td><input type="text" name="hum_rela" value="<?= isset($hum_rela) ? $hum_rela : '' ?>"></td>
    </tr>
    <tr>
      <td>detail:</td>
      <td><input type="text" name="detail" value="<?= isset($detail) ? $detail : '' ?>"></td>
    </tr>
    <tr>
    <td>emp_intv:</td>
  <td><input type="text" name="emp_intv" value="<?= isset($emp_intv) ? $emp_intv : '' ?>"></td>
  <tr>
  <td> NewEmp:</td>
  <td><input type="text" name="NewEmp" value="<?= isset($NewEmp) ? $NewEmp : '' ?>"></td>
    <tr>
      <td colspan="2"><input type="submit" name="<?= isset($id_score) ? 'submit' : 'submit' ?>"
          value="<?= isset($id_score) ? 'submit' : 'submit' ?>"></td>
    </tr>
  </table>
</form>
