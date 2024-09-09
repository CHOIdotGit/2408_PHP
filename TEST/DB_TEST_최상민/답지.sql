-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees(
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
	'최상민'
	,'2000-01-01'
	,'M'
	,'2024-09-09'
	,NULL
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM employees
WHERE emp_id = 100001;
-- 2. 월급, 직급, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
-- 월급정보 삽입
INSERT INTO salaries(
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100001
	,27000000
	,'2024-09-09'
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM salaries
WHERE emp_id = 100001;

-- 직급 정보 삽입
INSERT INTO title_emps(
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100001
	,'T001'
	,'2024-09-09'
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM title_emps
WHERE emp_id = 100001;

-- 소속부서 정보 삽입
INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100001
	,'D002'
	,'2024-09-09'
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM department_emps
WHERE emp_id = 100001;

-- 3. 짝궁의 것도 넣어주세요.
-- 짝궁의 사원테이블 정보 삽입
INSERT INTO employees(
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
	'김현석'
	,'2000-01-01'
	,'M'
	,'2024-09-09'
	,NULL
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM employees
WHERE emp_id = 100002;

-- 월급정보 삽입
INSERT INTO salaries(
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100002
	,35000000
	,'2024-09-09'
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM salaries
WHERE emp_id = 100002;

-- 직급 정보 삽입
INSERT INTO title_emps(
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100002
	,'T002'
	,'2024-09-09'
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM title_emps
WHERE emp_id = 100002;

-- 소속부서 정보 삽입
INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100002
	,'D002'
	,'2024-09-09'
	,NULL
	,'2024-09-09 00:00:00'
	,'2024-09-09 00:00:00'
	,NULL
);

SELECT *
FROM department_emps
WHERE emp_id = 100002;

-- 4. 나와 짝궁의 소속 부서를 D009로 변경해 주세요.
UPDATE department_emps
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE emp_id = 100001;

UPDATE department_emps
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE emp_id = 100002;

INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at
)
VALUES (
	100001
	,'D009'
	,DATE(NOW())
);

SELECT *
FROM department_emps
WHERE emp_id = 100001;

INSERT INTO department_emps(
	emp_id
	,dept_code
	,start_at
)
VALUES (
	100002
	,'D009'
	,DATE(NOW())
);	

SELECT *
FROM department_emps
WHERE emp_id = 100002;

-- 5. 짝궁의 모든 정보를 삭제해 주세요.
-- 짝궁의 소속부서 정보 삭제 
SELECT *
FROM department_emps
WHERE emp_id = 100002;

DELETE
FROM department_emps
WHERE emp_id = 100002;

SELECT *
FROM department_emps
WHERE emp_id = 100002;

-- 짝궁의 직급 정보 삭제
SELECT *
FROM title_emps
WHERE emp_id = 100002;

DELETE
FROM title_emps
WHERE emp_id = 100002;

SELECT *
FROM title_emps
WHERE emp_id = 100002;

-- 짝궁의 월급 정보 삭제
SELECT *
FROM salaries
WHERE emp_id = 100002;

DELETE
FROM salaries
WHERE emp_id = 100002;

SELECT *
FROM salaries
WHERE emp_id = 100002;

-- 짝궁의 사원 테이블 정보 삭제
SELECT *
FROM employees
WHERE emp_id = 100002;

DELETE
FROM employees
WHERE emp_id = 100002;

SELECT *
FROM employees
WHERE emp_id = 100002;

-- 6. 'D009'부서의 관리자를 나로 변경해 주세요.
UPDATE department_managers
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE emp_id = 37107;

SELECT *
FROM department_managers
WHERE emp_id = 37107;

INSERT INTO department_managers(
	emp_id
	,dept_code
	,start_at
)
VALUES (
	100001
	,'D009'
	,DATE(NOW())
);

SELECT *
FROM department_managers
WHERE emp_id = 100001;

-- 7. 오늘 날짜부로 나의 직책을 '대리'로 변경해 주세요.
SELECT * 
FROM title_emps
WHERE emp_id = 100001;

UPDATE title_emps
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE emp_id = 100001;

SELECT * 
FROM title_emps
WHERE emp_id = 100001;

INSERT INTO title_emps(
	emp_id
	,title_code
	,start_at
)
VALUES (
	100001
	,'T002'
	,DATE(NOW())
);

SELECT 
	title_emps.emp_id
	,titles.title	
	,title_emps.title_code
	,title_emps.start_at
	,title_emps.end_at
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
WHERE emp_id = 100001;

-- 8. 최저 연봉 사원의 사번과 이름, 연봉을 출력해 주세요.
SELECT 
	salaries.emp_id
	,employees.name
	,MIN(salary)
FROM salaries
	JOIN employees
		ON salaries.emp_id = employees.emp_id
			AND salaries.end_at IS NULL
GROUP BY emp_id
ORDER BY salary ASC
LIMIT 1;

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT 
	salaries.emp_id
	,AVG(salaries.salary) avg_sal
FROM salaries
WHERE salaries.end_at IS NULL
GROUP BY emp_id;

-- 10. 사번이 54321인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	salaries.emp_id
	,AVG(salaries.salary) avg_sal
FROM salaries
WHERE 
	salaries.emp_id = 54321;
	
-- 아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.
-- 01번
-- CREATE DATABASE test;

-- USE test;

CREATE TABLE users (
	userid INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
	,username VARCHAR(30) NOT NULL
	,authflg CHAR(1) DEFAULT '0'
	,birthday DATE NOT NULL 
	,created_at DATETIME DEFAULT CURRENT_DATE
);

-- 02번01에서 만든 테이블에 아래 데이터를 입력해 주세요.
INSERT INTO users(
	userid
	,username
	,authflg
	,birth
	,created_at
)
VALUES (
	AUTO_INCREMENT
	,'그린'
	,0
	,'2024-01-26'
	,DATE(NOW())
;

-- 03번 02에서 만든 레코드를 아래 데이터로 갱신해 주세요.
UPDATE users
	username = '테스터'
	,authflg = 1
	,birth = '2007-03-01'
WHERE username = '그린'


-- 04번 02에서 만든 레코드를 삭제해 주세요.
SELECT * 
FROM users 
WHERE username = '테스터';

DELETE 
FROM users
WHERE username = '테스터';

SELECT * 
FROM users 
WHERE username = '테스터';

-- 05번 01에서 만든 테이블에 아래 Column을 추가해 주세요.
ALTER TABLE users
ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';

-- 06번 01에서 만든 테이블을 삭제해 주세요.
DROP TABLE users;

-- 07번 아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.
SELECT
	users.username
	,users.birthday
	,rankmanagement.rankname
FROM users
	JOIN rankmanagement
		ON users.userid = rankmanagement.userid;