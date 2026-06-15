<?php
    include 'fonction.php';
    $id= $_GET['id'];
    $employees = recherche_personne_dans_departement($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Employees in Department <?php echo $id; ?></h1>
    <ul>
        <?php foreach ($employees as $employee): ?>
            <li><a href="fiche.php?emp_no=<?php echo $employee['emp_no']; ?>">
                <?php echo $employee['first_name'].' '.$employee['last_name']; ?></a>
                </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>