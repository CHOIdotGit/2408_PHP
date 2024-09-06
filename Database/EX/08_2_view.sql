-- 사원의 사번, 이름, 현재 직급 이름,
-- 현재 소속 부서 이름, 현재 연봉 조회

SELECT 
	employees.emp_id
	,employees.name
	,titles.title
	,departments.dept_name
	,salaries.salary
FROM department_emps
	JOIN employees
		ON department_emps.emp_id = employees.emp_id
			AND department_emps.end_at IS NULL
	JOIN salaries
		ON department_emps.emp_id = salaries.emp_id
			AND salaries.end_at IS NULL
	JOIN departments
		ON department_emps.dept_code = departments.dept_code
			AND departments.end_at IS NULL
	JOIN title_emps
		ON department_emps.emp_id = title_emps.emp_id
			AND title_emps.end_at IS NULL
	JOIN titles
		ON	title_emps.title_code = titles.title_code
;
		
-- view 생성
CREATE VIEW view_emp_now_data
AS
SELECT 
	employees.emp_id
	,employees.name
	,titles.title
	,departments.dept_name
	,salaries.salary
FROM department_emps
	JOIN employees
		ON department_emps.emp_id = employees.emp_id
			AND department_emps.end_at IS NULL
	JOIN salaries
		ON department_emps.emp_id = salaries.emp_id
			AND salaries.end_at IS NULL
	JOIN departments
		ON department_emps.dept_code = departments.dept_code
			AND departments.end_at IS NULL
	JOIN title_emps
		ON department_emps.emp_id = title_emps.emp_id
			AND title_emps.end_at IS NULL
	JOIN titles
		ON	title_emps.title_code = titles.title_code
;


-- view 사용
SELECT *
FROM view_emp_now_data;
-- 다만 인덱스를 사용하지 못하기 때문에 로딩하는데
-- 시간이 오래 걸린다.

-- view 삭제
DROP VIEW view_emp_now_data;