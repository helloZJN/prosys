CONN sys/change_on_install AS SYSDBA;
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
	stuid varchar(20) primary key,
	stuname varchar(20),
	email varchar(20),
	password varchar(20)
);
create table teacher_info(
	teaid varchar(20) primary key,
	teaname varchar(20),
	email varchar(20),
	password varchar(20)
);
create table admin(
	admid varchar(20) primary key,
	password varchar(20)
);
create table info(
	infoid varchar(20) primary key,
	teaname varchar(20),
	teaid varchar(20),
	title varchar(50),
	content varchar(2000),
	infotime date,
	readtimes int
);
create table stufile(
	fileid varchar(2000) primary key,
	teaid varchar(20),
	stuid varchar(20),
	folderid varchar(20),
	foldername varchar(2000),
	filepath varchar(2000)
);
create table folder(
	foldid varchar(20) primary key,
	foldname varchar(20),
	teaid varchar(20),
	CONSTRAINT fk_column1 FOREIGN KEY  (teaid) REFERENCES teacher_info(teaid)
);


create sequence seq_m 
increment by 1 
start with 1  
nomaxvalue  
nominvalue  
nocache;

Create Trigger m_test Before Insert On info
For Each Row 
Begin 
Select seq_cdpt.nextval Into:new.infoid From dual;  
End;  


insert into admin values('000000','000000');

alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss';



insert into teacher_info (teaid,teaname,password) values('111111','李发','123456');
insert into teacher_info (teaid,teaname,password) values('222222','张杰','123456');
insert into teacher_info (teaid,teaname,password) values('333333','赵来','123456');
insert into teacher_info (teaid,teaname,password) values('444444','周有','123456');
insert into teacher_info (teaid,teaname,password) values('555555','张怕','123456');
insert into teacher_info (teaid,teaname,password) values('666666','李华','123456');

insert into student (stuid,stuname,password) values('1829220001','郑宇','123456');
insert into student (stuid,stuname,password) values('1829220002','云丁畅','123456');
insert into student (stuid,stuname,password) values('1829220003','方春米','123456');
insert into student (stuid,stuname,password) values('1829220004','王来','123456');
insert into student (stuid,stuname,password) values('1829220005','康畅','123456');
insert into student (stuid,stuname,password) values('1829220006','姚加一','123456');


commit;


