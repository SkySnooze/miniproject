<?php require 'logo.html';
$con = @mysqli_connect('localhost', 'computer', 'computerabc123$', 'miic1327') or die('Connection Error ');

mysqli_query($con, "SET NAMES utf8") or die('Exec Error');

if (isset($_POST['Save'])) {
  $Id = $_POST['id_emp'];
  $Name = $_POST['name'];
  $Lname = $_POST['l_name'];
  $B_date = $_POST['b_day'];
  $Sex = $_POST['sex'];
  $Address = $_POST['address'];
  $Email = $_POST['email'];
  $Username = $_POST['user_id'];
  $Password = $_POST['password'];
  $Permis = $_POST['permis'];
  $Pstno = $_POST['pstno'];
  $txtSQL = "INSERT INTO employee_KFC (id_emp,name,l_name,b_day,sex,address,email,user_id,password,permis,pstno) VALUES('$Id','$Name','$Lname','$B_date','$Sex','$Address','$Email','$Username','$Password','$Permis','$Pstno')";
  mysqli_query($con, $txtSQL);
  header('location: employee.php');
  exit();
}

if (isset($_POST['Edit'])) {
  $OldId = $_POST['OldId'];
  $Id = $_POST['id_emp'];
  $Name = $_POST['name'];
  $Lname = $_POST['l_name'];
  $B_date = $_POST['b_day'];
  $Sex = $_POST['sex'];
  $Address = $_POST['address'];
  $Email = $_POST['email'];
  $Username = $_POST['user_id'];
  $Password = $_POST['password'];
  $txtPassword = '';
  $Permis = $_POST['permis'];
  $Pstno = $_POST['pstno'];
  if ($Password != '')
    $txtPassword = ",password='$Password'";
  $txtSQL = "UPDATE employee_KFC SET id_emp='$Id',name='$Name',l_name='$Lname',user_id='$Username' $txtPassword WHERE id_emp='$OldId'";
  mysqli_query($con, $txtSQL);
  header('location: employee.php');
  exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'del') {
  $Id = $_GET['id_emp'];
  $txtSQL = "DELETE FROM employee_KFC WHERE id_emp='$Id'";
  mysqli_query($con, $txtSQL);
  header('location: employee.php');
  exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
  $Id = $_GET['id_emp'];
  $txtSQL = "SELECT * FROM employee_KFC WHERE id_emp='$Id'";
  $re = mysqli_query($con, $txtSQL);
  unset($OldId);
  unset($Name);
  unset($Lname);
  unset($B_date);
  unset($Sex);
  unset($Address);
  unset($Email);
  unset($Username);
  unset($Password);
  unset($Permis);
  unset($Pstno);
  while ($row = mysqli_fetch_array($re)) {
    $OldId = $row['id_emp'];
    $Name = $row['name'];
    $Lname = $row['l_name'];
    $B_date = $row['b_day'];
    $Sex = $row['sex'];
    $Address = $row['address'];
    $Email = $row['email'];
    $Username = $row['user_id'];
    $Password = $row['password'];
    $Permis = $row['permis'];
    $Pstno = $row['pstno'];
  }
}

$link = mysqli_query($con, "SELECT * FROM `employee_KFC`,`position_KFC`,`permission_KFC` 
WHERE (employee_KFC.pstno = position_KFC.id_pst) and (employee_KFC.permis = permission_KFC.id_perm)") or die('Exec Error');
echo '<table border="1">';
echo '<th>Id</th><th>Name</th><th>Lname</th><th>B_date</th><th>Sex</th><th>Address</th><th>Email</th><th>User</th>
<th>Permis</th><th>Pstno</th>';
while ($row = mysqli_fetch_array($link)) {
  echo '<tr>';
  echo '<td>' . $row['id_emp'] . '</td><td>' . $row['name'] . '</td><td>' . $row['l_name'] . '</td><td>' . $row['b_day'] . '</td><td>' . $row['sex'] . '</td>
    <td>' . $row['address'] . '</td><td>' . $row['email'] . '</td><td>' . $row['user_id'] . '</td><td>' . $row['name_perm'] . '</td><td>' . $row['name_pst'] . '</td>
    <td><span style="cursor:pointer" onclick="del(\'' . $row['id_emp'] . '\')">Del</span><img width="25" style="cursor:pointer;margin-left : 5px" onclick="edit(\'' . $row['id_emp'] . '\')" src="edit.png"></td>';
  echo '</tr>';
}
echo '</table>';
?>
<script>
  function del(id_emp) {
    if (confirm('ต้องการจะลบใช่หรือไม่?')) {
      location.href = 'employee.php?action=del&id_emp=' + id_emp;
    }

  }
  function edit(id_emp) {
    location.href = 'employee.php?action=edit&id_emp=' + id_emp;
  }
</script>
<style>
  table {
    width: 100%;
  }
</style>
<form action="employee.php" method="post">
  <table>
    <tr>
      <td>Id:</td>
      <td>
        <input type="hidden" name="OldId" value="<?= isset($OldId) ? $OldId : '' ?>">
        <input type="text" name="id_emp" value="<?= isset($OldId) ? $OldId : '' ?>">
      </td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><input type="text" name="name" value="<?= isset($Name) ? $Name : '' ?>"></td>
    </tr>
    <tr>
      <td>Lname:</td>
      <td><input type="text" name="l_name" value="<?= isset($Lname) ? $Lname : '' ?>"></td>
    </tr>
    <tr>
      <td>B_date:</td>
      <td><input type="date" name="b_day" value="<?= isset($B_date) ? $B_date : '' ?>"></td>
    </tr>
    <tr>
      <td>Sex:</td>
      <td><input type="text" name="sex" value="<?= isset($Sex) ? $Sex : '' ?>"></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><input type="text" name="address" value="<?= isset($Address) ? $Address : '' ?>"></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="text" name="email" value="<?= isset($Email) ? $Email : '' ?>"></td>
    </tr>
    <tr>
      <td>Username:</td>
      <td><input type="text" name="user_id" value="<?= isset($Username) ? $Username : '' ?>"></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="password" name="password" value="<?= isset($Password) ? $Password : '' ?>"></td>
    </tr>
    <tr>
      <td>Permis:</td>
      <td><input type="text" name="permis" value="<?= isset($Permis) ? $Permis : '' ?>"></td>
    </tr>
    <tr>
      <td>Pstno:</td>
      <td><input type="text" name="pstno" value="<?= isset($Pstno) ? $Pstno : '' ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="<?= isset($OldId) ? 'Edit' : 'Save' ?>"
          value="<?= isset($OldId) ? 'Edit' : 'Save' ?>"></td>
    </tr>
  </table>
</form>