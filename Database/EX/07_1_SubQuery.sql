-- 서브쿼리(SubQuery)


-- where 절에서 사용하는 subQuery
-- D001 부서장의 사번과 이을 출력
-- 단일행 서브쿼리
SELECT emp_id, NAME
FROM employees
WHERE emp_id = 4616;

SELECT emp_id
FROM department_managers
WHERE
	end_at IS NULL
	AND dept_code = 'D001';
	
SELECT employees.emp_id, employees.NAME
FROM employees
WHERE 
	employees.emp_id = (
		SELECT department_managers.emp_id
		FROM department_managers
		WHERE
				department_managers.end_at IS NULL
			AND department_managers.dept_code = 'D001'
	)
;
-- from에 AS를 사용해 약어로 사용할 수 있다.

-- 전체 부서장의 사번과 이름 출력
SELECT employees.emp_id, employees.name
FROM employees
WHERE 
	employees.emp_id IN (
		SELECT department_managers.emp_id
		FROM department_managers
		WHERE
			department_managers.end_at IS NULL
	);
	
-- 현재 직책이 T006인 사원의 사번과 이름, 생일을 출력
SELECT 
	employees.emp_id, employees.NAME, employees.birth
FROM employees
WHERE 
	employees.emp_id IN (
		SELECT title_emps.emp_id
		FROM title_emps
		WHERE 
			title_emps.end_at IS null
		AND title_emps.title_code = 'T006'
	);	
-- T006인 사원을 찾아야 하는데 T001인 사원을 출력함	

-- 위 문제의 정답
SELECT 
	employees.emp_id
	,employees.NAME
	,employees.birth
FROM employees
WHERE 
	employees.emp_id IN(
		SELECT title_emps.emp_id
		FROM title_emps
		WHERE 
			title_emps.end_at IS null
			AND title_emps.title_code = 'T006'
	)
;

-- 현재 D002의 부서장이 해당 부서에 소속된 날짜 출력
-- 다중문 보다 JOIN문을 사용하는것이 편리
SELECT 
	department_emps.*
FROM department_emps
WHERE
	(department_emps.emp_id, department_emps.dept_code) IN (
		SELECT 
			department_managers.emp_id
			,department_managers.dept_code
		FROM department_managers
		WHERE
			department_managers.end_at IS null
			AND department_managers.dept_code = 'D002'
	)
;

-- 연관 서브쿼리
SELECT
	employees.*
FROM employees
WHERE
	employees.emp_id IN (
		SELECT department_managers.emp_id
		FROM department_managers
		where
			department_managers.emp_id = employees.emp_id
	);
-- 상위 쿼리의 from의 위치와 서브 쿼리의 where절에서 '=' 이후의
-- 위치가 같아야 한다(?)

-- -------------------------------
-- select절에서 사용되는 subQuery
-- -------------------------------

-- 사원별 평균 연봉과 사번, 이름을 출력
SELECT 
	employees.emp_id
	, employees.name
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		WHERE
			employees.emp_id = salaries.emp_id	
	)  AS avg_sal
FROM employees;
-- 서브쿼리의 select문에서 단 하나의 컬럼만 있어야 한다.
-- AVG를 구할 때

-- -------------------------------
-- from절에 사용되는 subQuery
-- -------------------------------

-- 가장 많이 사용된 것 중 하나

SELECT
	tmp.*
FROM (
	select 
		employees.emp_id
		,employees.name
	FROM employees
) AS tmp
;

-- insert문에서 subquery 사용
INSERT INTO employees (
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	(SELECT emp.NAME FROM employees emp WHERE emp_id = 1000)
	,'2000-01-01'
	,'M'
	,DATE(NOW())
	,null
	,null
	,NOW()
	,NOW()
	,NULL
);


-- -------------------------------
-- update문에서 subQuery 사용 
-- -------------------------------
UPDATE employees
SET
	employees.gender = (
		SELECT emp.gender
		FROM employees emp
		WHERE emp.emp_id = 100000
	)
WHERE
	employees.emp_id = (
		SELECT MAX(emp2.emp_id)
		FROM employees emp2
	)
;
