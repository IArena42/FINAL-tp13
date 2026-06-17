<?php
    include ("../inc/fonction.php");
    $fiche = get_Employee_Profile($_GET['emp_no']);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche employé</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/font/bootstrap-icons.css">
</head>
<body>
    <main class="container py-4">
        <a href="javascript:history.back()" class="btn btn-outline-secondary btn-sm mb-3"><i class="bi bi-arrow-left"></i> Retour</a>

        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title mb-3"><i class="bi bi-person-vcard"></i> Fiche de l'employé "<?php echo $fiche['first_name']." ".$fiche['last_name']; ?>"</h1>
                <div class="table-responsive">
                    <table class="table table-dark table-bordered ">
                        <thead class="table table-active">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth date</th>
                                <th>Hire date</th>
                                <th>Emp no</th>
                                <th>Gender</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $fiche['first_name']; ?></td>
                                <td><?php echo $fiche['last_name']; ?></td>
                                <td><?php echo $fiche['birth_date']; ?></td>
                                <td><?php echo $fiche['hire_date']; ?></td>
                                <td><?php echo $fiche['emp_no']; ?></td>
                                <td><?php echo $fiche['gender']; ?></td>
                                <td><?php echo $fiche['salary']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title mb-3"><i class="bi bi-cash-coin"></i> Historique des salaires</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead class="table table-active">
                            <tr>
                                <th>Salary</th>
                                <th>From Date</th>
                                <th>To Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (historique($_GET['emp_no']) as $row): ?>
                                <tr>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td><?php echo $row['from_date']; ?></td>
                                    <td><?php echo $row['to_date']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-3"><i class="bi bi-briefcase"></i> Historique d'emploi</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead class="table table-active">
                            <tr>
                                <th>Title</th>
                                <th>From Date</th>
                                <th>To Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (historique_titre($_GET['emp_no']) as $row): ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['from_date']; ?></td>
                                    <td><?php echo $row['to_date']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>