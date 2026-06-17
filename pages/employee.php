<?php
    include '../inc/fonction.php';

    $id= $_GET['id'];
    $department = getDepartment_byID($id);
    $employees = recherche_personne_dans_departement($id);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/font/bootstrap-icons.css">
</head>
<body>
    <main class="container py-4">
        <a href="../index.php" class="btn btn-outline-secondary btn-sm mb-3"><i class="bi bi-arrow-left"></i> Retour</a>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-3"><i class="bi bi-people"></i> Employes dans <?= $department["dept_name"] ?></h1>
                <ul class="list-group">
                    <?php foreach ($employees as $employee): ?>
                        <li class="list-group-item bg-dark">
                            <a href="fiche.php?emp_no=<?php echo $employee['emp_no']; ?>" class="link-info text-decoration-none text-light">
                                <i class="bi bi-person-fill"></i> <?php echo $employee['first_name'].' '.$employee['last_name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>