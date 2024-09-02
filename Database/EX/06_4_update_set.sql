-- update 문: 기존 데이터를 수정

-- 기본 구조
-- update 테이블명
-- set 컬럼1 = 값1, 컬럼2 = 값2, ...
-- where 절을 사용하지 않으면 나머지가 전부 업데이트 됨
-- where 절로 업데이트할 데이터를 골라서 그것만 업데이트

UPDATE salaries
SET
	salary = 900000000
	,updated_at = NOW()
WHERE emp_id = 100002;

-- 나의 직급을 'T005'로 변경
UPDATE title_emps
SET
	title_code = 'T005'
	,updated_at = NOW()
WHERE emp_id = 100002;

-- 현재 급여가 26,000,000 원 이하인 직원의 급여를
-- 50,000,000 원으로 수정

UPDATE salaries
SET
	salary = 50000000
	,updated_at = NOW()
WHERE salary <= 26000000;
-- where 절에 end_at is null

SELECT *
FROM salaries
WHERE salary = 50000000;