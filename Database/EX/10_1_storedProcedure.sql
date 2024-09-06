-- 프로시저 생성 / 선택실행 필수
DELIMITER $$ 

CREATE PROCEDURE add_emp()
BEGIN 
	SELECT * FROM employees WHERE emp_id = 1;
END $$

DELIMITER ;

-- DELIMITER와 세미콜론은  한 칸 띄워쓰기 꼭 해야한다.
-- 현재 쿼리 실행 말고 선택 실행으로 해야 한다.

-- 프로시저 실행(불러오기)
CALL add_emp();

-- 프로시저 삭제
DROP PROCEDURE add_emp;

-- 예문
DELIMITER $$ 

CREATE PROCEDURE add_emp(
	IN param_name VARCHAR(50)
	,IN param_birth VARCHAR(10)
	,IN param_gender CHAR(1)
)
BEGIN 
	DECLARE cup INT;
	
-- 사원 테이블 입력

	INSERT INTO employees (
		name
		,birth
		,gender
		,hire_at
	)
	VALUES (
		param_name
		,param_birth
		,param_gender
		,DATE(NOW())
	);
	
	--  방급 입력한 사원 번호 조회
	SELECT emp_id
	INTO @cup
	FROM employees
	ORDER BY emp_id desc
	LIMIT 1
	;
	
	--  급여테이블 데이터 작성
	INSERT INTO salaries (
		emp_id
		,salary
		,start_at
	)
	VALUES (
		@cup
		,25000000
		,DATE(NOW())
	);
	
END $$

DELIMITER ;

-- 프로시저 실행
CALL add_emp('고양이', '2000-01-01', 'M');

-- 프로시저 삭제
DROP PROCEDURE add_emp;