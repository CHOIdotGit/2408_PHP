-- 1. 사원의 사원번호, 이름, 직급코드를 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.name
	,title_emps.title_code
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
;
-- AND title_emps.end_at IS NULL을 추가하여
-- 현재 재직중인 사원들만 볼 수 있다.
-- join에서는 where보다 and로 적는 것이 효과적

-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.gender
	,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
WHERE salaries.end_at IS NULL;
-- WHERE 대신 AND

-- 3. 10010 사원의 이름과 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT
	employees.name
	,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
WHERE employees.emp_id = 10010;
-- WHERE 대신 AND / 10010을 salaries.emp_id로 불러와도 됨

-- 4. 사원의 사원번호, 이름, 소속부서명을 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.name
	,department_emps.dept_code
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
WHERE department_emps.end_at IS NULL;

SELECT
	employees.emp_id
	,employees.name
	,departments.dept_name
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS NULL
	JOIN departments
		ON department_emps.dept_code = departments.dept_code;

-- 5. 현재 월급의 상위 10위까지 사원의 사번, 이름, 월급을 출력해 주세요.
SELECT 
	employees.emp_id
	,employees.name
	,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
WHERE salaries.end_at IS NULL
ORDER BY salary DESC
LIMIT 10;
-- WHERE -> AND
-- DENSE_RANK()를 사용하면 공동점수를 달성했을 때
-- 1, 1, 2, 3, 4, ...로 적용된다. 

-- 6. 현재 각 부서의 부서장의 부서명, 이름, 입사일을 출력해 주세요.
SELECT
	departments.dept_name
	,employees.name
	,employees.hire_at
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS NULL
	JOIN departments
		ON department_emps.dept_code = departments.dept_code
		AND departments.end_at IS NULL;
		
SELECT
	departments.dept_name
	,employees.name
	,employees.hire_at
FROM employees
	JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
		AND department_managers.end_at IS NULL 
	JOIN departments
		ON department_managers.dept_code = departments.dept_code
;
	
-- 7. 현재 직급이 "부장"인 사원들의 월급 평균을 출력해 주세요.
SELECT
	AVG(salaries.salary) avg_sal
	,titles.title	
FROM titles
	JOIN title_emps
		ON titles.title_code = title_emps.title_code
		AND title_emps.end_at IS NULL
	JOIN salaries
		ON title_emps.emp_id = salaries.emp_id
		AND salaries.end_at IS NULL
WHERE titles.title = '부장';
-- GROUP BY title_emps.emp_id;
-- 금색 열쇠로만 연결할 수 있는게 아니라
-- 분홍색 열쇠로도 연결할 수 있다
-- WHERE절을 AND로 바꾸고 JOIN title_emps 뒤에 쓸 수 있다.
-- 직급이 부장인 사람들의 평균 연봉을 각각 알고 싶다면
-- 그룹으로 묶어야 한다
-- 위의 코드에서 표준문법에 맞추려면 group by titles.title
-- 그룹으로 묶어야 한다.
-- select에 집계함수를 넣으려면 group by로 묶어야 한다.
SELECT 
	employees.emp_id
	,employees.name
	,avg_table.emp_id
FROM employees
	JOIN	(
		SELECT
			title_emps.emp_id
			,AVG(salaries.salary) avg_sal
		FROM title_emps
			JOIN titles
				ON title_emps.title_code = titles.title_code
				AND titles.title = '부장'
				AND title_emps.end_at IS NULL
			JOIN salaries
				ON title_emps.emp_id = salaries.emp_id
		GROUP BY title_emps.emp_id
	) avg_tabel
		ON employees.emp_id = avg_table.emp_id

-- 8. 부서장직을 역임했던 모든 사원의 이름과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT
	employees.name
	,employees.hire_at
	,employees.emp_id
	,department_emps.dept_code
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
	JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
WHERE department_managers.dept_mgr_id;
-- --------------------------------------------------
SELECT
	employees.name
	,employees.hire_at
	,employees.emp_id
	,department_managers.dept_code
FROM employees
	JOIN department_managers
		ON employees.emp_id = department_managers.emp_id;

-- 9. 현재 각 직급별 평균연봉 중 60,000,000이상인 직급의 직급명, 평균월급(정수)를을 내림차순으로 출력해 주세요.
SELECT
	titles.title_code
	,titles.title
	,CEILING(AVG(salaries.salary)) avg_sal
FROM titles
	JOIN title_emps
		ON titles.title_code = title_emps.title_code
		AND title_emps.end_at IS NULL
	JOIN employees
		ON title_emps.emp_id = employees.emp_id 
		AND employees.fire_at IS NULL
	JOIN salaries
		ON employees.emp_id = salaries.emp_id	
		AND salaries.end_at IS NULL
GROUP BY title_code
	HAVING avg_sal >= 60000000
ORDER BY avg_sal DESC; 

-- ------------------------------------------------------
SELECT
	titles.title
	,CEILING((salaries.salary)) AS avg_sal
FROM salaries
	JOIN title_emps
		ON salaries.emp_id = title_emps.emp_id
			AND salaries.end_at IS NULL
			AND title_emps.end_at IS NULL
	JOIN titles
		ON title_emps.title_code = titles.title_code
GROUP BY titles.title
	HAVING avg_sal >= 60000000
ORDER BY avg_sal DESC;


-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT
	title_emps.title_code
	,COUNT(*)
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
WHERE gender = 'F'
GROUP BY title_code;

-- AND title_emps.end_at IS NULL
-- AND employees.fire_at IS NULL
-- WHERE -> AND employees.gender = 'F'