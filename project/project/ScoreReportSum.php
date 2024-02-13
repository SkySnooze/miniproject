<?php require 'logo.html';
$con = @mysqli_connect('localhost', 'computer', 'computerabc123$', 'miic1327') or die('Connection Error ');

mysqli_query($con, "SET NAMES utf8") or die('Exec Error');

?>
<style>
    table {
        width: 100%;
    }
</style>
<?php
$link = mysqli_query($con, "SELECT *, SUM(technical + leaning + creator + hum_rela) AS Score,AVG(technical + leaning + creator + hum_rela) AS ScoreAvg ,SUM(y_n = 'y') AS Pass ,SUM(y_n = 'n') AS RePortN 
FROM score_nemp_KFC, employee_KFC, new_emp_KFC
WHERE (new_emp_KFC.id_nemp = score_nemp_KFC.NewEmp) AND (score_nemp_KFC.emp_intv = employee_KFC.id_emp) 
GROUP BY new_emp_KFC.id_nemp
ORDER BY new_emp_KFC.id_nemp ASC ") or die('Exec Error');
echo '<table border="1">';
echo '<th>id</th><th>name</th><th>Lname</th><th>Position</th><th>Pass</th><th>ReportN</th><th>Score</th><th>ScoreAVG</th>';
while ($row = mysqli_fetch_array($link)) {
    echo '<tr>';

    echo '<td>' . $row['id_nemp'] . '</td><td>' . $row['name_nemp'] . '</td><td>' . $row['lname_nemp'] . '</td><td>' . $row['position_applied_for'] . '</td><td>' . $row['Pass'] . '</td><td>' . $row['RePortN'] . '</td><td>' . $row['Score'] . '</td><td>' . $row['ScoreAvg'] . '</td>';
    echo '</tr>';
}
echo '</table>';

?>
<?php
$link = mysqli_query($con, "SELECT SUM(technical + leaning + creator + hum_rela) AS ScoreSum,AVG(technical + leaning + creator + hum_rela) AS ScoreAvg  FROM `score_nemp_KFC`") or die('Exec Error');
while ($row = mysqli_fetch_array($link)) {
    echo '<p>คะแนนรวม ' . $row['ScoreSum'] . '</p><p>คะแนนเฉลี่ย ' . $row['ScoreAvg'] . '</p>';

}
$link = mysqli_query($con, "SELECT 
COUNT(*) AS pass_count
FROM 
(
    SELECT 
        SUM(y_n = 'y') AS Pass,
        SUM(y_n = 'n') AS ReportN 
    FROM 
        score_nemp_KFC, employee_KFC, new_emp_KFC
    WHERE 
        (new_emp_KFC.id_nemp = score_nemp_KFC.NewEmp) AND 
        (score_nemp_KFC.emp_intv = employee_KFC.id_emp) 
    GROUP BY 
        score_nemp_KFC.NewEmp
    HAVING 
        Pass > ReportN
) AS subquery;") or die('Exec Error');
while ($row = mysqli_fetch_array($link)) {
    echo '<p>จำนวนคนผ่าน ' . $row['pass_count'] . '</p>';

}
?>