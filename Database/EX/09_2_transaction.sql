-- TRANSACTION 시작
START TRANSACTION;

-- INSERT 
INSERT INTO employees(
	NAME, birth, gender, hire_at
)
VALUES(
	'고양이', '2000-01-01', 'M', DATE(NOW())
);

-- select
SELECT *
FROM employees
WHERE emp_id >= 100001;

-- ROLLBACK 
ROLLBACK;

-- commit
COMMIT;