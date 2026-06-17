<?php
require ("../inc/fonction.php");
$dept = $_GET["dept"] ?? "";
$emp = $_GET["emp"] ?? "";
$min =  $_GET["min"] == "" ? 0 : $_GET["min"];
$max =  $_GET["max"] == "" ? 120 : $_GET["max"];

$result = default_search($dept, $emp, $min, $max);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/font/bootstrap-icons.css">
</head>
<body>
    <main class="container py-4">
        <a href="../index.php" class="btn btn-outline-secondary btn-sm mb-3"><i class="bi bi-arrow-left"></i> Retour</a>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-3"><i class="bi bi-search"></i> Résultats de recherche</h1>
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle">
                        <thead class="table table-active">
                            <tr>
                                <th>Dept</th>
                                <th>Nom</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $d) {
                                ?>
                            <tr>
                                <td><?= $d["department"] ?></td>
                                <td>
                                    <a href="fiche.php?emp_no=<?php echo $d['emp_no']; ?>" class="link-info text-decoration-none text-light">
                                        <?= $d["first"]." ".$d["last"] ?>
                                    </a>
                                </td>
                                <td><?= $d["age"] ?></td>
                            </tr>
                            <?php
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>