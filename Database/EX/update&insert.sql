-- 100000번 사원의 연봉을 4천 만 원으로 변경
UPDATE salaries
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE 
	sal_id = (	SELECT sal_id
					FROM salaries
					WHERE emp_id = 100000
					ORDER BY start_at DESC
					LIMIT 1
				)
;
	
INSERT INTO salaries(
	emp_id
	,salary
	,start_at
)
VALUES (
	100000
	,35000000
	,DATE(NOW())
);

SELECT sal_id
FROM salaries
WHERE emp_id = 100000
ORDER BY start_at DESC
LIMIT 1;

BEGIN
	DELETE FROM department_emps WHERE emp_id = OLD.emp_id;
	DELETE FROM department_managers WHERE emp_id = OLD.emp_id;
	DELETE FROM salaries WHERE emp_id = OLD.emp_id;
	DELETE FROM title_emps WHERE emp_id = OLD.emp_id;
END