<style> table, tr, td, th
    {
        border: 1px solid #000000;
    }
</style><?php
$fichier = file('http://bienvu.net/misc/customers.csv');

echo '<table>';
echo '<tr><th>Surname</th><th>Firstname</th><th>Email</th><th>Phone</th><th>City</th><th>State</th></tr>';
foreach ($fichier as $row){
    $col = explode(',',$row);
    echo '<tr>';
    foreach ($col as $case){
        echo '<td>'.$case.'</td>';
    }
    echo '</tr>';
}
echo '</tables>';