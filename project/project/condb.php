<?php 
$con = @mysqli_connect('localhost', 'computer', 'computerabc123$', 'miic1327') or die('Connection Error ');

mysqli_query($con, "SET NAMES utf8") or die('Exec Error');
?>