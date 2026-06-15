<?php
// Fonction de connexion
function dbconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (! $connect) {
            die('erreur : ' . mysqli_connect_error());

        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}

function getAllLine($sql)
{
    $result = mysqli_query(dbconnect(), $sql);
    $return = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    mysqli_free_result($result);
    return $return;
}

function getOneLine($sql)
{
    $result = mysqli_query(dbconnect(), $sql);
    return mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $return;
}

function getDepartement()
{
    $sql    = "SELECT * FROM departments";
    $result = getAllLine($sql);
    return $result;
}

function getDepartment_Manager()
{
    $sql = "SELECT departments.dept_no as num, departments.dept_name as name, employees.first_name as first_name, employees.last_name as last_name, employees.emp_no as num_emp  FROM departments
    LEFT JOIN dept_manager
    ON departments.dept_no=dept_manager.dept_no
    LEFT JOIN employees
    ON dept_manager.emp_no=employees.emp_no
    WHERE dept_manager.to_date > CURTIME()";

    $result = getAllLine($sql);
    return $result;
}

function recherche_personne_dans_departement($dept_no)
{
    $sql = " select dept_emp.emp_no , employees.first_name, employees.last_name
            from dept_emp
            join employees on dept_emp.emp_no = employees.emp_no
            WHERE dept_no = '%s'";
    $sql = sprintf($sql, $dept_no);

    // echo $sql; // Affiche la requête SQL pour le débogage
    return getAllLine($sql);
}

function default_search($dept, $emp, $min, $max)
{

    $sql    = "SELECT *  FROM v_dept_emp WHERE department LIKE '%s%s%s' AND age > %s AND age < %s AND (v_dept_emp.first LIKE '%s%s%s' OR v_dept_emp.last LIKE '%s%s%s')";
    $sql    = sprintf($sql, "%", $dept, "%", $min, $max, "%", $emp, "%", "%", $emp, "%");
    $result = getAllLine($sql);
    return $result;
}


// fonction pour faire apparaitre les fiches de l'employee
//function get_Employee_Profile($emp_no) {
//    $sql = "SELECT * FROM employees
//            WHERE employees.emp_no = '%s'";
//    $sql = sprintf($sql, $emp_no);
//
//   // echo $sql; // Affiche la requête SQL pour le débogage
//
//    return getOneLine($sql);
//}

function get_Employee_Profile($emp_no) {
    $sql = "SELECT employees.emp_no ,employees.birth_date ,employees.hire_date ,employees.first_name ,employees.last_name ,
    employees.gender ,salaries.salary
    FROM employees
    join salaries on employees.emp_no = salaries.emp_no
            WHERE employees.emp_no = '%s'";
    $sql = sprintf($sql, $emp_no);

    return getOneLine($sql);
}

function historique($emp_no) {
    $sql = "SELECT * from salaries
            WHERE emp_no = '%s' ";
    $sql = sprintf($sql, $emp_no);

    return getAllLine($sql);
}

function historique_titre($emp_no) {
    $sql = "SELECT * from titles
            WHERE emp_no = '%s' ";
    $sql = sprintf($sql, $emp_no);

    return getAllLine($sql);
}


?>
