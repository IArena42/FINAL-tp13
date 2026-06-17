<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
require "../inc/fonction.php";
$emp_no = $_GET["emp_no"];
$department = getDepartment_Manager_NbEmp();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de departement</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/font/bootstrap-icons.css">
</head>
<body>
    <main class="container py-4">
        
    <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title mb-3">Modification de departement</h1>
                <form action="../inc/traitement_modif.php" method="get" class="row g-3">
                    <div class="col-md-6">
                        <label for="dept" class="form-label">Departement</label>
                        <select name="dept" class="form-select" aria-placeholder="Dept">
                            <?php foreach ($department as $d) {
                                ?>
                                <option value="<?= $d["num"] ?>"><?= $d["name"] ?></option>
                                <?php 
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date de debut</label>
                        <input type="date" class="form-control" name="date" placeholder="Date">
                    </div>
                    <div class="col-md-12 d-flex form-control align-items-end">
                        <input type="number" name="emp_no" value="<?= $emp_no?>" hidden>
                        <input type="submit" value="Modifier" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>