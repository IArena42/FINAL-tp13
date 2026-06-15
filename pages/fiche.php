<?php
    include ("fonction.php");
    $fiche = get_Employee_Profile($_GET['emp_no']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Fiche de l'employé "<?php echo $fiche['first_name']; ?>"</p>
    <table border="1">

        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>birth date</th>   
            <th>hire date</th>
            <th>emp no</th>   
            <th>gender</th>   
            <th>salary</th> 
        </tr>
        <tr>
            <td><?php echo $fiche['first_name']; ?></td>
            <td><?php echo $fiche['last_name']; ?></td>
            <td><?php echo $fiche['birth_date']; ?></td>
            <td><?php echo $fiche['hire_date']; ?></td>
            <td><?php echo $fiche['emp_no']; ?></td>
            <td><?php echo $fiche['gender']; ?></td>
            <td><?php echo $fiche['salary']; ?></td>

        </tr>  

    </table>

    <p>Historique des salaires :</p>
    <table border="1">
        <tr>
            <th>Salary</th>
            <th>From Date</th>
            <th>To Date</th>
        </tr>
        <?php foreach (historique($_GET['emp_no']) as $row): ?>
            <tr>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['from_date']; ?></td>
                <td><?php echo $row['to_date']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>historique </p>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>From Date</th>
            <th>To Date</th>
        </tr>
        <?php foreach (historique_titre($_GET['emp_no']) as $row): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['from_date']; ?></td>
                <td><?php echo $row['to_date']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>