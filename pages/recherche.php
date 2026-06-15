<?php
require ("fonction.php");
$dept = $_GET["dept"] ?? "";
$emp = $_GET["emp"] ?? "";
$min =  $_GET["min"] == "" ? 0 : $_GET["min"];
$max =  $_GET["max"] == "" ? 120 : $_GET["max"];

$result = default_search($dept, $emp, $min, $max);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <table>
            <tr>
                <th>Dept</th>
                <th>Nom</th>
                <th>Age</th>
            </tr>
            <?php foreach ($result as $d) {
                ?>
            <tr>
                <td><?= $d["department"] ?></td>
                <td><?= $d["first"]." ".$d["last"] ?></td>
                <td><?= $d["age"] ?></td>
            </tr>
            <?php
        } ?>
        </table>

</main>
</body>
</html>











