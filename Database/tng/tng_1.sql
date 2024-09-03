-- 1번 직급테이블의 모든 정보를 조회
SELECT titles.*
FROM titles;

-- 2번 급여가 60,000,000 이하인 사원의 사번을 조회
SELECT salaries.emp_id
FROM salaries
WHERE salary <= 60000000;
-- distinct를 select에 넣어 사용할 수 있음

-- 3번 급여가 60,000,000에서 70,000,000인 사원의 사번을 조회
SELECT salaries.emp_id
FROM salaries
WHERE salary >= 60000000 and salary <= 70000000;
-- between a to b를 이용할 수 있음
-- where에 salary between 60000000 and 70000000

-- 4번 사원번호가 10001, 10005인 사원의 사원테이블의 모든 정보를 조회
SELECT employees.*
FROM employees
WHERE 
	employees.emp_id = 10001
	or employees.emp_id = 10005;
-- where emp_id in (10001, 10005)로도 사용할 수 있다.

-- 5번 직급에 '사'가 포함된 직급코드와 직급명 조회
SELECT titles.title_code, titles.title
FROM titles
WHERE 
	titles.title LIKE '%사%';
	
-- 6번 사원 이름 오름차순으로 정렬해서 조회
SELECT employees.name
FROM employees
ORDER BY NAME ASC;

-- 7번 사원별 전체 급여의 평균을 조회
SELECT 
	employees.emp_id
	,employees.name
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		where
			employees.emp_id = salaries.emp_id
	)	AS avg_sal
FROM employees;
-- select emp_id, avg(salary) avg_sal from salaries group by emp_id;
SELECT emp_id, AVG(salary) avg_sal 
FROM salaries 
GROUP BY emp_id;

-- 8번 사원별 전체 급여의 평균이 30,000,000 ~ 50,000,000인, 사원번호와 평균급여를 조회
SELECT 
	employees.emp_id
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		where
			salary >= 30000000 and salary <= 50000000
	)	AS avg_sal
FROM employees;

SELECT 
	emp_id
	,AVG(salary) avg_sal
FROM salaries
GROUP BY emp_id
	HAVING avg_sal BETWEEN 30000000 AND 50000000
;
-- select에서 AVG의 별칭을 사용하고 있고 group by절 having에서
-- 같은 AVG를 사용한다면 뒤에 AVG대신 그 별칭을 사용할 수 있다.


-- 9번 사원별 전체 급여 평균이 70,000,000이상인, 사원의 사번, 이름, 성별을 조회
SELECT 
	employees.emp_id
	,employees.name
	,employees.gender
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		where
			salary >= 70000000 AND employees.emp_id = salaries.emp_id
	)	AS avg_sal
FROM employees;

SELECT 
	employees.emp_id
	,employees.name
	,employees.gender
FROM employees
WHERE 
	employees.emp_id IN (
		SELECT salaries.emp_id
		FROM salaries
		GROUP BY salaries.emp_id
			HAVING AVG(salary) >= 70000000
	);

-- 10번 현재 직책이 'T005'인, 사원의 사원번호와 이름을 조회
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE
	employees.emp_id IN (
		SELECT title_emps.emp_id
		FROM title_emps
		where
			title_emps.end_at IS null
			AND title_emps.title_code = 'T005'
	);
