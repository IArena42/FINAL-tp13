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

function getOneLine($sql) {
    $result = mysqli_query(dbconnect(), $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $row;
}
function getDepartement()
{
    $sql    = "SELECT * FROM departments";
    $result = getAllLine($sql);
    return $result;
}

function getDepartment_Manager_NbEmp()
{
    $sql = "SELECT departments.dept_no as num, departments.dept_name as name, employees.first_name as first_name, employees.last_name as last_name, employees.emp_no as num_emp, v_dept_nbEmp.nb as nb_emp
    FROM departments
    LEFT JOIN dept_manager
    ON departments.dept_no=dept_manager.dept_no
    LEFT JOIN employees
    ON dept_manager.emp_no=employees.emp_no
    JOIN v_dept_nbEmp
    ON departments.dept_no=v_dept_nbEmp.dept_no
    WHERE dept_manager.to_date > CURTIME()
    ORDER BY num ASC";

    $result = getAllLine($sql);
    return $result;
}

function getDepartment_byID($id){
    $sql = "SELECT * FROM departments WHERE dept_no='%s' ";
    $sql = sprintf ($sql, $id);

    $result = getOneLine($sql);
    return $result;

}

function recherche_personne_dans_departement($dept_no)
{
    $sql = " select dept_emp.emp_no , employees.first_name, employees.last_name
            from dept_emp
            join employees on dept_emp.emp_no = employees.emp_no
            WHERE dept_no = '%s'";
    $sql = sprintf($sql, $dept_no);

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

 //calculer l'age de travail maximum de l'employé dans l'entreprise

function age_travail($emp_no) {
    $sql = "SELECT MAX(
    (CASE WHEN YEAR(to_date) = '9999' THEN YEAR(CURTIME()) ELSE YEAR(to_date) END) - YEAR(from_date)) AS annees_travaillees
    FROM titles  
    WHERE emp_no = '%s'";
    $sql = sprintf($sql, $emp_no);      
    return getOneLine($sql);
}

function getActualdept ($emp_no){
    $sql = "SELECT * from dept_emp
            WHERE emp_no = '%s'
            ORDER BY to_date DESC
            LIMIT 1";

    $sql = sprintf($sql, $emp_no);      
    return getOneLine($sql);
    
}

function runQuery($sql) {
    $result = mysqli_query(dbconnect(), $sql);
    if ($result === false) {
        return false;
    }
    return $result;
}
function addDept($d, $emp_no, $date){
    $actual = getActualdept($emp_no);
    if ($date > $actual["from_date"] && $d != $actual["dept_no"]){
    $sql="DELETE FROM dept_emp WHERE (YEAR(to_date)='9999' AND emp_no='%s')";
    $sql = sprintf($sql, $emp_no);      
    $del=runQuery($sql);

    $sql="INSERT INTO dept_emp VALUES
    ('%s' , '%s', '%s', '%s')";
    $sql= sprintf($sql,$emp_no ,$actual["dept_no"], $actual["from_date"], $date);
    $update=runQuery($sql);

    $sql="INSERT INTO dept_emp VALUES
    ('%s' , '%s', '%s', '%s')";
    $sql= sprintf($sql,$emp_no ,$d, $date, $actual["to_date"]);
    $new=runQuery($sql);

    if($del===true && $update===true && $new=== true) 
        { return 1;}
    else if($del === false){
        return"del";
    }
    else if($update === false){
        return"update";
    }if($new === false){
        return "new";
    }
    } 
    else{
        return 0;
    }
    fhjkdls
}
