-- insert 문 : 신규 데이터를 저장

-- 기본 구조
-- insert  into 테이블명 (컬럼1, 컬럼2, ...)
-- values (값1, 값2, ...);

INSERT INTO employees(
	NAME
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
	,'2024-09-02'
	,NULL 
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL	
);

-- select insert(vlaues 대신 select) / 숫자는 ''에 넣지 말길
INSERT INTO employees(
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at	
)
SELECT 
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
FROM employees
WHERE emp_id = 100002;

-- 자신의 직급정보 삽입
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
	,'T009'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
);
SELECT * FROM title_emps WHERE emp_id = 100002;
-- 자신의 급여 정보 삽입
INSERT into salaries(
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
	,25000000
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
);

-- 자신의 소속부서 삽입
INSERT into department_emps(
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
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,null
);

-- INSERT titles(
-- 	title
-- 	,created_at
-- 	,updated_at
-- 	,deleted_at
-- )
-- VALUES (
-- 	'사원'
-- 	,'2024-09-02 00:00:00'
-- 	,'2024-09-02 00:00:00'
-- 	,null
-- );

-- 테이블 단위로 하나씩 입력해야한다
-- 여러 테이블에 내가 원하는 값을 한번에 삽입할 수 없음

-- 삽입한 값을 수정하거나 삭제는 어떻게 할까?
