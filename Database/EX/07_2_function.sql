-- 내장함수 : 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터 타입)
-- CONVERT(값, 데이터 타입)
SELECT 
	1234
	,CAST(1234 AS CHAR(4))
	,CONVERT(1234, CHAR(4))dbsample
;

-- 제어 흐름 함수
-- IF(수식-값or컬럼, 참일 때, 거짓일 때)
-- 수식의 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT 
	emp_id
	,gender
	,IF(gender = 'M', '남자', '여자' ) AS ko_gender
FROM employees;

-- IFNULL(수식1-컬럼, 수식2-결과)
-- 수식1이 NULL이면 수식2를 변경
-- 수식1이 NULL이아니면 수식1을 반환
SELECT
	emp_id
	,fire_at
	,IFNULL(fire_at, '9999-01-01') AS fire_at_not_null
FROM employees;

-- NULLIF(수식1, 수식2)
-- 수식1과 수식2가 같은지 (일치하는) 체크를 하고
-- 참이면 NULLL을 반환, 거짓이면 수식1을 반환
SELECT
	emp_id
	,gender
	,NULLIF(gender, 'F')
FROM employees;

-- CASE 문 : 다중 분기
-- CASE 체크하려는 수식이 들어간다
-- when 분기 수식1 then 결과1
-- when 분기 수식2 then 결과2
-- Else 결과4
-- END
SELECT
	emp_id
	,case gender
		when 'M' then '남자'
		when 'F' then '여자'
		ELSE '모름'
	END AS ko_gender
FROM employees;

SELECT
	emp_id
	,salary
	,case
		when salary <= 30000000
			then '평범'
		ELSE	'많다'
	END AS '조사'
FROM salaries;


-- -------------------------
-- 문자열 함수
-- -------------------------

-- concat(문자열1, 문자열2, ...) / 문자열을 연결한다
SELECT CONCAT('안녕하세요.', 'DB입니다.');

-- concat_ws(구분자, 문자열1, 문자열2, ...)
-- 문자열 사이에 구분자를 넣어서 연결하는 함수
SELECT CONCAT_WS(', ', '딸기', '바나나', '수박', '자두');
-- 마지막 문자에는 구분문자가 들어가지 않는다
-- 문자열과 문자열의 사이에만 구분자가 들어간다

-- format(숫자, 소숫점 자릿수)
-- 숫자에 ','를 넣고, 소숫점 자릿수까지 표현한다.
SELECT FORMAT(50000, 0);
SELECT FORMAT(50000, 2); 
-- 소숫점을 넣고싶지 않다면 0을 입력

-- left(문자열, 길이)
-- 문자열을 왼쪽부터 숫자 길이 만큼 잘라 반환
SELECT LEFT('abcde', 2);
-- ab만 나타나게 된다

-- right(문자열, 길이)
-- 문자열을 오른쪽부터 숫자 길이 만큼 잘라 반환
SELECT RIGHT('abcde', 2);
-- de만 나타나게 된다.

-- upper(문자열)
-- 소문자를 대문자로 변경한다.
SELECT UPPER('abcde');
-- ABCDE로 나타남

-- lower(문자열)
-- 대문자를 소문자로 변경한다.
SELECT LOWER('ABCDE');
-- abcde로 나타남

-- lpad(문자열, 길이, 채울 문자열)
-- 문자열을 포함해 길이만큼 채울 문자열을
-- 왼쪽에 삽입해 반환
SELECT LPAD('321', 5, '0');
-- 00321로 나타남
SELECT LPAD(emp_id, 10, '0') FROM employees;

-- rpad(문자열, 길이, 채울 문자열)
-- 문자열을 포함해 길이만큼 채울 문자열을
-- 오른쪽에 삽입해 반환
SELECT RPAD('321', 5, '0');
-- 32100로 나타남

-- trim(문자열) / 좌우 공백을 제거한다.
SELECT TRIM(' abcd ');
-- 'abcd'로 나타남

-- ltrim(문자열) / 왼쪽 공백을 제거한다.
SELECT LTRIM('    sd sd   ');

-- rtrim(문자열) / 오른쪽 공백을 제거한다.
SELECT LTRIM('    sd sd   ');

-- trim(방향 문자열1 from 문자열2)
-- 방향을 지정해 문자열2에서 문자열1을 제거하여 반환
-- 방향은 leading(좌), both(좌우), 
-- trailing(우)지정 가능
select TRIM(LEADING 'ab' FROM 'abcdeab');
select TRIM(BOTH 'ab' FROM 'abcdeab');
select TRIM(TRAILING 'ab' FROM 'abcdeab');

-- substring(문자열, 시작 위치, 길이)
-- 문자열을 시작 위치에서 길이만큼 잘라서 반환
SELECT SUBSTRING('abcdef', 3, 2);
-- cd를 반환한다.

-- substring_index(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수 번째가 나오면
-- 그 이후부터 버린다.
-- 횟수가 음수로 설정시 오른쪽부터 적용한다.
SELECT SUBSTRING_INDEX('미어캣_그린_테스트', '_', 1);

-- 수학 함수

-- ceiling(값) : 올림
-- floor(값) : 버림
-- round(값) : 반올림
SELECT CEILING(1.2), FLOOR(1.9), ROUND(1.5);

-- truncate(값, 정수)
-- 소숫점 기준으로 정수 위치까지 구하고 나머지는 버림
SELECT TRUNCATE(1.2345, 2);

-- ------------------------- 
-- 날짜 및 시간 함수
-- -------------------------

-- now()
-- 현재 날짜/ 시간으로 변환한다.
-- (yyyy-mm-dd hh:mi:ss)
SELECT NOW();
-- now() 괄호 안에 밀리초까지 6자리로 나온다.

-- date(데이트 형식의 값)
-- 해당 값을 yyyy-mm-dd 형식으로 변환해준다.
SELECT DATE(NOW());

-- ADDdate(날짜1, interval 날짜2)
-- 날짜1에서 날짜2를 더한 날짜를 반환(표기)한다.
SELECT ADDDATE('2024-01-01', INTERVAL 1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL 1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL 1 WEEK);
SELECT ADDDATE('2024-01-01', INTERVAL -1 WEEK);
SELECT ADDDATE('2024-01-01', INTERVAL 1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL -1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL 1 HOUR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 HOUR);
SELECT ADDDATE('2024-01-01', INTERVAL 1 MINUTE);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MINUTE);
SELECT ADDDATE('2024-01-01', INTERVAL 1 SECOND);
SELECT ADDDATE('2024-01-01', INTERVAL -1 SECOND);

-- ------------------------- 
-- 집계함수
-- -------------------------

-- sum(컬럼) : 해당 컬럼의 합계 출력
-- max(컬럼) : 해당 컬럼의 최댓값  출력
-- min(컬럼) : 해당 컬럼의 최소값  출력
-- avg(컬럼) : 해당 컬럼의 평균 출력

SELECT 
	SUM(salary)
	,MAX(salary)
	,MIN(salary)
	,AVG(salary)
	,COUNT(salary)
FROM salaries;

-- count(*) : 검색 결과의 총 레코드 수를 출력
-- count(컬럼) : 해당 컬럼의 총 수를  출력
SELECT
	COUNT(fire_at)
	,COUNT(*)
FROM employees;


-- -------------------------
-- 순위 함수(자주 사용하지는 않음 / limit로 대체 가능)
-- -------------------------

-- rank() over(order by 컬럼 desc/asc)
SELECT 
	emp_id
	,salary
	,RANK() OVER(ORDER BY salary DESC) AS sal_rank
FROM salaries
LIMIT 5;

-- row_number() over(order by 속성명 desc/asc)
SELECT 
	emp_id
	,salary
	,ROW_NUMBER() OVER(ORDER BY salary ASC) AS sal_rank
FROM salaries
LIMIT 5;