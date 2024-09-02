-- delete 문 : 기존 데이터를 삭제한다

-- 기본 구조
-- delete from 테이블명 -> 여기까지는 테이블에 있는 모든 데이터 삭제
-- where 조건을 넣어 해당 테이블에만 적용

-- 나의 급여 정보 삭제
SELECT * FROM salaries WHERE emp_id = 100002;

DELETE 
FROM salaries
WHERE emp_id = 100002;

SELECT * FROM salaries WHERE emp_id = 100002;

-- 자신의 직급 정보 삭제
SELECT * FROM title_emps WHERE emp_id = 100002;

DELETE 
FROM title_emps
WHERE emp_id = 100002;

SELECT * FROM title_emps WHERE emp_id = 100002;