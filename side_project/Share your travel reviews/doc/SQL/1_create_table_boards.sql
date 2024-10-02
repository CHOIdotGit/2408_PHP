CREATE DATABASE IF NOT EXISTS sytr_boards;

USE sytr_boards;

CREATE TABLE boards (
	id				BIGINT(20) 	UNSIGNED PRIMARY KEY AUTO_INCREMENT
	,user_id 	BIGINT(10)	UNSIGNED NOT NULL 
	,title 		VARCHAR(20)	NOT NULL
	,img			VARCHAR(1000)		
	,content 	VARCHAR(40) NOT NULL
	,created_at TIMESTAMP 	NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP 	NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP
);