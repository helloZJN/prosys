CONN sys/change_on_install AS SYSDBA ;
-- 创建c##scott用户
CREATE USER c##scott IDENTIFIED BY tiger ;
-- 为用户授权
GRANT CONNECT,RESOURCE,UNLIMITED TABLESPACE TO c##scott CONTAINER=ALL ;
-- 设置用户使用的表空间
ALTER USER c##scott DEFAULT TABLESPACE USERS;
ALTER USER c##scott TEMPORARY TABLESPACE TEMP;
-- 使用c##scott用户登录
CONNECT c##scott/tiger
create table student(
	stuid varchar(20),
	stuname varchar(20),
	email varchar(20),
	password varchar(20)
);
create table teacher(
	teaid varchar(20),
	teaname varchar(20),
	email varchar(20),
	password varchar(20)
);
create table admin(
	admid varchar(20),
	password varchar(20)
);
create table info(
	infoid varchar(20),
	teaname varchar(20),
	teaid varchar(20),
	title varchar(50),
	content varchar(300),
	infotime date
);
create table stufile(
	fileid varchar(20),
	teaname varchar(20),
	teaid varchar(20),
	title varchar(50),
	stuname varchar(20),
	stuid varchar(20),
	folderid varchar(20),
	foldername varchar(20),
	filecontent varchar(50)
);
create table folder(
	foldid varchar(20),
	foldname varchar(20),
	teaid varchar(20)
);


