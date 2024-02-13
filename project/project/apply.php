<?php
include("condb.php");

// ดึงค่าจากฟอร์ม
if (isset($_POST['submit'])) {
    $name_nemp = mysqli_real_escape_string($con, $_POST['name_nemp']);
    $lname_nemp = mysqli_real_escape_string($con, $_POST['lname_nemp']);
    $position_applied_for = mysqli_real_escape_string($con, $_POST['position_applied_for']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
    $race = isset($_POST['race']) ? mysqli_real_escape_string($con, $_POST['race']) : null;
    $religion = mysqli_real_escape_string($con, $_POST['religion']);

    $sql = "INSERT INTO new_emp_KFC (name_nemp, lname_nemp, position_applied_for, address, email, birthdate, gender, nationality, race, religion)
            VALUES ('$name_nemp', '$lname_nemp', '$position_applied_for', '$address', '$email', '$birthdate', '$gender', '$nationality', '$race', '$religion')";

    if (mysqli_query($con, $sql)) {
        header('location: apply.html');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);


