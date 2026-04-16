<?php

session_start();

if($_SESSION['role']!="admin")
{
header("Location:dashboard.php");
}

$file="reports/".$_GET['file'];

unlink($file);


/* log */

$log=fopen("logs/transaction.txt","a");

fwrite($log,
date("d-m-Y h:i A").
" admin deleted ".$file."\n"
);

fclose($log);

header("Location:view_report.php");

?>