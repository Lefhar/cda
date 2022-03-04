<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1. Mois de l'année non bissextile</title>
    <style> table, tr, td, th
        {
            border: 1px solid #000000;
        }
    </style>
</head>
<body>
<?php
$tabmonth = array("janvier"=>1,"fevrier"=>2,"mars"=>3,"avril"=>4,"mai"=>5,"juin"=>6,"juillet"=>7,"aout"=>8,"septembre"=>9,"octobre"=>10,"novembre"=>11,"decembre"=>12);
echo '<table>';
foreach ($tabmonth as $key => $row){
    echo '<tr><td>'.$key.'</td><td>'.cal_days_in_month(CAL_GREGORIAN, $row, date('Y')).'</td></tr>';
}
echo '</tables>';
?>
</body>
</html>
