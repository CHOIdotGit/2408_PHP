/*
	SELECT문
	데이터를 조회하기 위해 사용하는 쿼리
*/

-- 테이블에서 특정 컬럼만 조회하는 방법
-- SELECT 컬럼명, 컬럼명
SELECT emp_id, name
-- FROM 테이블명
FROM employees
;

-- 테이블의 모든 컬럼의 데이터 조회
-- *(Asterisk)
SELECT *
FROM employees
;

-- 직급 테이블의 모든 데이터를 조회
SELECT *
FROM titles
;

-- 모든 사원의 직급코드와 사번을 조회
SELECT emp_id, title_code
FROM title_emps
;

/*
	WHERE 절 : 특정 조건의 데이터를 조회할 때 사용
*/
-- 사번이 10000번인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE emp_id = 10000
;

-- 이름이 '김철수'인 사원을 조회
SELECT *
FROM employees
WHERE NAME = '원성현'
;

-- 비교연산자 : >, <, =, >=, <=, !=
-- 사번이 6번 이상인 사원의 정보를 조회

SELECT *
FROM employees
WHERE emp_id >= 6;

-- 생일이 1990-01-01 이후인 사원을 조회
SELECT *
FROM employees
WHERE birth >= '1990-01-01';

-- AND(~고), OR(~나) : 복수의 조건을 적용시키는 키워드
-- 생일이 1990-01-01 이후이고, 남자 사원을 조회
SELECT *
FROM employees
WHERE birth >= '1990-01-01' AND gender = 'M';

-- 이름이 원성현 이거나 반승현인 사원을 조회
SELECT *
FROM employees
WHERE NAME = '원성현' OR NAME = '반승현';

-- 이름이 원성현 또는 반승현이고 생일이 1990-01-01 이후인 사원을 조회
SELECT *
FROM employees
WHERE (
		NAME = '원성현' 
	OR NAME = '반승현') 
		AND birth >= '1990-01-01';
		
-- 이름이 원성현이고 생일이 1990-01-01 이후 이거나
-- 이름이 반승현인 사원 조회
SELECT *
FROM	employees
WHERE
	(NAME = '원성현'
	AND birth >= '1990-01-01')
	OR NAME = '반승현';
	
-- 직급 코드가 T001 또는 T002이고,
-- 직급 시작일자가 2000-01-01 이후인 사원의 사번과 
-- 직급코드를 조회
-- SELECT *
-- FROM title_emps
-- WHERE
-- 	(title_code = 'T001' OR title_code = 'T002')
-- 	AND (hire_at >= '2000-01-01' AND emp_id AND 
-- 	title_code;
	
SELECT emp_id, title_code
FROM title_emps
WHERE (title_code = 'T001' OR title_code = 'T002')
	AND start_at >= '2000-01-01';
	
-- 생일이 2000-01-01 ~ 2001-01-01 사원 정보 조회
SELECT *
FROM employees
WHERE birth >= '2000-01-01' 
	AND birth <= '2001-01-01';
	
-- in 연산자 : 지정한 값과 일치한 데이터 조회
-- in 연산자로 묶을 경우 or을 여러 개 묶는 효과(?)

-- 이름이 염문창, 지도연, 안소정인 사원정보 조회
SELECT *
FROM employees
WHERE 
	NAME IN('염문창', '지도연', '안소정');
	
-- between 연산자 : 지정한 범위의 데이터 조회
-- 생일이 2000-01-01 ~ 2001-01-01 사원 정보 조회
SELECT *
FROM employees
WHERE 
	birth BETWEEN '2000-01-01' 
	and '2001-01-01';
	
-- LIKE 연산자 : 문자열의 내욜을 조회할 때 사용
-- (대소문자 구문 X)
-- % : 글자 수 상관없이 조회
-- %염 = 염으로 끝나는 이름 또는 단어
-- %염% = 몇글자든 간에 '염'인 글자포함(첫글자, 끝글자도 포함) 
-- 염씨인 사원 정보 획득
SELECT *
FROM employees
WHERE 
	NAME LIKE '염%';
	
-- _(underbar) : 언더바의 개수만큼 글자개수를 제한해서 조회
-- _염_ : 가운데가 염인 글자
-- 염__ : 염으로 시작하는 세글자
-- '염'으로 시작하는 두글자
SELECT *
FROM employees
WHERE 
	NAME LIKE '염_';
	
SELECT *
FROM employees
WHERE 
	NAME LIKE '_염_';
	
SELECT *
FROM employees
WHERE 
	NAME LIKE '__염';
	
/*
	ORDER BY 절 : 데이터를 정렬
*/ 

-- asc : 오름차순(ㄱㄴㄷ순) 내림차순은 desc
-- 모든 사원 출력
SELECT *
FROM employees
ORDER BY NAME ASC;

-- 여자 사원의 이름을 오름차순으로 정렬
SELECT *
FROM employees
WHERE gender = 'f'
ORDER BY NAME ASC;

-- asc는 디폴트 값이라 생략 가능(?)
-- 여자 사원의 이름과 생일을 오름차순으로 정렬
SELECT *
FROM employees
WHERE gender = 'f'
ORDER BY NAME asc, birth ASC;

-- distinct 키워드 : 검색 결과에서 중복되는 레코드를 제거.
-- 직급 테이블에서 사원 번호 조회
SELECT DISTINCT 
emp_id, title_code
FROM title_emps;

/*
	group by 절 : 그룹으로 묶어서 조회
	having 절 :  group by 절의 조건절
	
	집계함수
		max() : 최댓값
		min() : 최솟값
		count() : 개수
		avg() : 평균
		sum() : 합계
*/

-- 사원별 최고 연봉 조회
SELECT emp_id, max(salary)
FROM salaries
GROUP BY emp_id;

-- 최고 연봉이 5천만 원 이상 사원 조회
SELECT emp_id, MAX(salary)
FROM	salaries
GROUP BY emp_id 
	HAVING MAX(salary) >= 50000000;
	
/*	
	값이 null인 데이터 검색
		[컬럼명 is null]
   값이 null이 아닌 데이터 검색
		[컬럼명 is not null] 
*/
-- 사원의 현재 소속 부서 코드 조회(null 검색)
SELECT *
FROM department_emps
WHERE
	end_at IS NULL;
	
/*
	as : 컬럼 또는 테이블에 별칭을 부여하는 키워드
*/
	
-- 부서별 소속 사원의 수를 구해 / 컬럼 이름을 변경할 때 ''를 적용하지 않는다
SELECT dept_code, COUNT(*) AS cnt
FROM department_emps
WHERE end_at IS NULL
GROUP BY dept_code;
-- 위 count(*)에서 *는 null값도 포함시켜서 나타나개 함
-- count할 때 *를 많이 사용한다.

-- Limit, offset : 출력하는 데이터의 개수 제한
-- offset : 2라고 가정하면 2개를 건너뛰고 3부터 출력
SELECT *
FROM employees
ORDER BY emp_id ASC 
LIMIT 5 OFFSET 10;

-- 현재 받고 있는 급여중 사원의 연봉 상위 5명 조회
SELECT emp_id, MAX(salary) 
FROM salaries
WHERE end_at IS NULL
GROUP BY emp_id
LIMIT 5;

SELECT *
FROM salaries
WHERE end_at IS NULL
ORDER BY salary DESC
LIMIT 5;

-- select 기본 구조
SELECT [DISTINCT] [컬럼명]
FROM [테이블명]
WHERE [쿼리 조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC || 컬럼명 DESC]
LIMIT [n] OFFSET [n]