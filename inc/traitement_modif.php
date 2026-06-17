<?php
require("fonction.php");
$emp_no=$_GET["emp_no"];
$d=$_GET["dept"];
$date=$_GET["date"];

echo $emp_no." ".$d." ".$date;
$ok= addDept($d, $emp_no, $date);

if ($ok ==1 ){
    header("Location:../pages/fiche.php?emp_no=".$emp_no);
} else{
    header("Location:../pages/modifDept.php?emp_no=".$emp_no);
} 
?> 