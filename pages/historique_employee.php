<?php
    include "../inc/fonction.php";
    $all_depts = get_job_stats();
    $selected_dept = isset($_GET['dept_no']) ? $_GET['dept_no'] : null;
    $stats = $selected_dept ? get_job_stats($selected_dept) : null;
?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Entreprise</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/font/bootstrap-icons.css">
</head>
<body>
    <main class="container py-4">
        <a href="javascript:history.back()"><button class="btn btn-outline-secondary btn-sm mb-3"><i class="bi bi-arrow-left"></i> Retour</button></a>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title mb-3"><i class="bi bi-building"></i> Sélectionner une Entreprise</h2>
                <div class="list-group">
                    <?php foreach ($all_depts as $dept): ?>
                        <a href="?dept_no=<?php echo $dept['dept_no']; ?>" class="list-group-item list-group-item-action <?php echo ($selected_dept === $dept['dept_no']) ? 'active' : ''; ?>">
                            <?php echo $dept['dept_name']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if ($stats): ?>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4"><i class="bi bi-bar-chart"></i> Statistiques - <?php echo $stats['dept_name']; ?></h1>
                <div class="table-responsive">
                    <table class="table table-dark table-bordered">
                        <thead class="table table-active">
                            <tr>
                                <th>Nombre d'Hommes</th>
                                <th>Nombre de Femmes</th>
                                <th>Moyenne des Salaires</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong><?php echo $stats['count_men']; ?></strong></td>
                                <td><strong><?php echo $stats['count_women']; ?></strong></td>
                                <td><strong><?php echo number_format($stats['avg_salary'], 2, ',', ' '); ?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>