-- JOIN문
-- inner join을 많이 사용하며 left outer join도 자주 사용한다.
-- full outer join은 이론적으로 존재 / mariaDB에서는 존재하지 않는다.
-- 그 다음으로 self join이 사용된다.

-- inner join
-- A와 B 두 테이블이 공통적으로 가지고 있는 부분을 가져온다(교집합).
-- on : join에서 두 테이블을 어떤 조건을 가지고 연결할건지

-- 사원 번호, 이름, 소속부서코드를 출력
SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
WHERE
	department_emps.end_at IS NULL;
-- ON 뒤에 AND를 넣어 where을 생략할 수 있다.
-- 위 코드에서 부서명도 가져오고 싶다면
-- JOIN을 한번 더 사용하면 된다.
-- ...join departments ON departments.dept_code = department_emps.dept_code;
-- select에 departments.dept_name을 추가하면 된다.

SELECT
	employees.emp_id
	,employees.name
	,department_emps.dept_code
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		AND department_emps.end_at IS NULL;
	JOIN departments
		ON departments.dept_code = department_emps.dept_code;
-- on뒤에 오는 테이블명과 그 상위 join의 테이블 명이 같아야함


-- ----------------
-- left outer join
-- ----------------

-- left join으로 줄여서 사용하기도 한다.
-- 왼쪽 테이블을 기준 테이블로 설정하여 join을 실행한다.
-- 기준 테이블의 모든 데이터를 출력하고
-- JOIN 대상 테이블에 없는 값은 NULL로 출력한다.
-- 오래된 코드를 유지보수할 때 쓰인다.
-- null 값은 join의 대상이 아니다.

-- 사원의 사번, 이름, 부서장 시작 날짜
SELECT 
	employees.emp_id
	,employees.name
	,department_managers.start_at
FROM employees
	LEFT JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
WHERE
	department_managers.end_at IS NULL
ORDER BY department_managers.start_at DESC	
;

-- right outer join
-- 현업에서는 코드의 통일성 같은 이유로 outer join을 할 때
-- left outer join을 사용한다.
-- join의 오른쪽에 적혀있는 테이블을 기준으로 두고 실행 
SELECT
	employees.emp_id
	,employees.name
	,department_managers.start_at
FROM department_managers
	RIGHT JOIN employees
		ON department_managers.emp_id = employees.emp_id
WHERE
	department_managers.end_at IS NULL
ORDER BY department_managers.start_at DESC;

-- full outer join
-- union을 사용해 left, right join을 이용해 출력 가능


-- union : 중복 제거 / union all : 중복 제거 안 함
-- 커리가 두 개 있는데 그 두 개의 쿼리를 합친다.
SELECT * FROM employees WHERE emp_id IN(1, 3)
UNION
SELECT * FROM employees WHERE emp_id IN(3, 6);
-- union뒤에 all이라는 레코드를 붙이면 중복되는 데이터도
-- 다 가져온다.

-- self join
-- 자기 자신을 join한다. - 합친다(?)
-- 슈퍼바이저(감독-관리)인 사원의 정보 출력
SELECT
	emp1.emp_id
	,emp1.name
	,emp2.emp_id
	,emp2.name
FROM employees emp1
 	JOIN employees emp2 
		ON emp1.emp_id = emp2.sup_id;

SELECT 
	employees.emp_id
	,employees.name
	,employees.sup_id
FROM employees;