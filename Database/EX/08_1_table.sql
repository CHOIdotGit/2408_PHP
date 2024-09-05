-- Data Base(DB) 생성
-- CREATE DATABASE shop;

-- DB 선택 방법
USE shop;

-- DB 삭제 방법
-- DROP DATABASE shop;

-- -----------
-- 테이블 생성
-- -----------

CREATE TABLE users (
	id 			BIGINT(20) 	 PRIMARY KEY AUTO_INCREMENT
	,NAME 		VARCHAR(50)  NOT NULL
	,addr 		VARCHAR(150) NOT NULL
	,gender 		CHAR(1) 		 NOT NULL COMMENT 'M = 남자, F = 여자'
	,tel 			VARCHAR(20)  NOT NULL COMMENT '-제외 숫자만'
	,created_at TIMESTAMP 	 NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP 	 NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP
);

CREATE TABLE products (
	id 			  BIGINT(20) 	PRIMARY KEY AUTO_INCREMENT
	,product_name VARCHAR(100) NOT NULL 
	,price 		  BIGINT(20)   NOT NULL
	,created_at   TIMESTAMP 	NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at   TIMESTAMP 	NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at   TIMESTAMP
);

CREATE TABLE orders (
	id 			 BIGINT(20)  PRIMARY KEY AUTO_INCREMENT
	,user_id 	 BIGINT(20)  NOT NULL
	,order_id 	 VARCHAR(50) NOT NULL
	,total_price BIGINT(20)  NOT NULL
	,created_at  TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at  TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at  TIMESTAMP
);

-- -------------
-- 테이블 제거
-- -------------
-- DROP TABLE orders;
-- DROP TABLE users, productsshop;

-- DBL 데이터 싹 다 날리는 방법
-- 이력도 남기지 않아서 지우면 되돌릴 수 없다.
-- 우클릭의 테이블 비우기와 동일한 작업 수행
-- TRUNCATE users;

-- -----------------------------------
-- ALTER : 테이블의 구조를 수정하는 문
-- 가끔 가다 한 번 볼 정도의 빈도
-- -----------------------------------

-- FK 추가 방법 / 제약 조건 : constraint
-- ALTER TABLE [테이블명] 
-- ADD CONSTRAINT [Constraint명] 
-- FOREIGN KEY (Constraint 부여 컬럼명) 
-- REFERENCES 참조테이블명(참조테이블의 컬럼명) 
-- [ON DELETE 동작 / ON UPDATE 동작];

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users(id);

-- -----------
-- 컬럼 수정
-- -----------
-- 테이블을 수정하는 것이라 alter table까진 같다.
-- 수정할 테이블을 선택한다.
-- 다만, primary key는 modify 불가능하다.
ALTER TABLE users
MODIFY COLUMN addr VARCHAR(100) NOT NULL;

-- -----------
-- 컬럼 추가
-- -----------
ALTER TABLE users
ADD COLUMN birth DATE NOT NULL;

-- -----------
-- 컬럼 제거
-- -----------
ALTER TABLE users
DROP COLUMN birth;

-- pk 부호없음 추가
ALTER TABLE orders
DROP CONSTRAINT fk_orders_user_id;

ALTER TABLE users
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT;

ALTER TABLE orders
MODIFY COLUMN user_id BIGINT(20) UNSIGNED NOT NULL;

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users(id);

ALTER TABLE orders
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT;

ALTER TABLE products
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT;