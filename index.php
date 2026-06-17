<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
require "inc/fonction.php";
$department = getDepartment_Manager_NbEmp();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de departement</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/font/bootstrap-icons.css">
</head>
<body>
    <main class="container py-4">
        
    <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title mb-3"><i class="bi bi-search"></i> Recherche</h1>
                <form action="pages/recherche.php" method="get" class="row g-3">
                    <div class="col-md-3">
                        <label for="dept" class="form-label">Departement</label>
                        <select name="dept" class="form-select" aria-placeholder="Dept">
                            <?php foreach ($department as $d) {
                                ?>
                                <option value="<?= $d["name"] ?>"><?= $d["name"] ?></option>
                                <?php 
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="emp" class="form-label">Employe</label>
                        <input type="text" class="form-control" name="emp" placeholder="Employe">
                    </div>
                    <div class="col-md-2">
                        <label for="min" class="form-label">Min</label>
                        <input type="number" class="form-control" name="min" placeholder="Min">
                    </div>
                    <div class="col-md-2">
                        <label for="max" class="form-label">Max</label>
                        <input type="number" class="form-control" name="max" placeholder="Max">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <input type="submit" value="Rechercher" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-3"><i class="bi bi-building"></i> Liste departement</h1>
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Manager</th>
                                <th>Nb d'employees</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($department as $d) {
                                ?>
                                <tr>
                                    <td><a href="pages/employee.php?id=<?= $d["num"] ?>" class="link-info text-decoration-none"><?= $d["num"] ?></a></td>
                                    <td><a href="pages/employee.php?id=<?= $d["num"] ?>" class="link-info text-decoration-none"><?= $d["name"] ?></a></td>
                                    <td>ID:<?= $d["num_emp"]." - " ?><?= $d["first_name"]." ".$d["last_name"] ?></td>
                                    <td><?= $d["nb_emp"] ?></td>
                                </tr>
                                <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>