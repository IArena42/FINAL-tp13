#TP-13

v_dept_emp
CREATE OR REPLACE VIEW v_dept_emp AS 
SELECT departments.dept_name as department, employees.first_name as first, employees.last_name as last, (2026-YEAR(birth_date)) as age
FROM dept_emp
JOIN employees ON dept_emp.emp_no=employees.emp_no 
JOIN departments ON dept_emp.dept_no=departments.dept_no;

v_dept_nbEmp
CREATE OR REPLACE VIEW v_dept_nbEmp AS 
select dept_no, (COUNT(emp_no)) as nb from dept_emp group by dept_no;
