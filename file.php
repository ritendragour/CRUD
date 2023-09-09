<?php
include('db.php');

$sqlLogin= $conn->query("SELECT * FROM `info`")->fetchall();

       $filename =  "rg".time().".xls";      
       header("Content-Type: application/vnd.ms-excel");
       header("Content-Disposition: attachment; filename=\"$filename\"");

       ExportFile($sqlLogin);
       function ExportFile($records) {
           $heading = false;
               if(!empty($records))
                 foreach($records as $row) {
                   if(!$heading) {
                     // display field/column names as a first row
                     echo implode("\t", array_keys($row)) . "\n";
                     $heading = true;
                   }
                   echo implode("\t", array_values($row)) . "\n";
               }
           exit;
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="get">
        <input type="file" id="myFile">
        <input type="submit">
</form>
</body>
</html>