-- INDEX 확인
SHOW INDEX FROM employees;

-- 이름으로 사번 검색? - 인덱스 부여 전 0.031초 / 후 0.000초
SELECT * FROM employees WHERE NAME = '주정웅';

-- INDEX 생성
ALTER TABLE employees 
ADD INDEX idx_employees_name (NAME);

-- INDEX 제거
DROP INDEX idx_employees_name ON employees;