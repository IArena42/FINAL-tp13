<<<<<<< HEAD
# tp13
hello 
hayyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy
Devoir atao :)

CREATE OR REPLACE VIEW v_dept_emp AS  SELECT departments.dept_name as department, employees.first_name as first, employees.last_name as last, (2026-YEAR(birth_date)) as age  FROM dept_emp     JOIN employees     ON dept_emp.emp_no=employees.emp_no     JOIN departments     ON dept_emp.dept_no=departments.dept_no;

=======
# FINAL-tp13
>>>>>>> 3daa1e0fc2f031bb18d699b0507edce764754929
