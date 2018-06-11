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
	fileid varchar(20) primary key,
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
	foldid varchar(20) primary key,
	foldname varchar(20),
	teaid varchar(20)
);

insert into admin values('000000','0');
insert into admin values('000001','1');
insert into admin values('000002','2');
insert into admin values('000003','3');

alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss';

insert into info values('1','lh','0000','关于邱盼威小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('2','lh','0000','关于张晋男小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('3','lh','0000','关于童冰小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('4','lh','0000','关于邱盼威小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('5','lh','0000','关于邱盼威小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('2','lh','0000','关于张晋男小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('3','lh','0000','关于童冰小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('4','lh','0000','关于邱盼威小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);
insert into info values('5','lh','0000','关于邱盼威小组的加分情况的通知','qwqeqe', to_date ( '2007-12-20 18:31:34' , 'YYYY-MM-DD HH24:MI:SS' ),100);

insert into teacher_info (teaid,teaname,password) values('123456','李华','123456');
insert into teacher_info (teaid,teaname,password) values('111111','李发','123456');
insert into teacher_info (teaid,teaname,password) values('222222','李啊','123456');
insert into teacher_info (teaid,teaname,password) values('333333','李来','123456');
insert into teacher_info (teaid,teaname,password) values('444444','李有','123456');
insert into teacher_info (teaid,teaname,password) values('555555','李怕','123456');

insert into student (stuid,stuname,password) values('123456','王华','123456');
insert into student (stuid,stuname,password) values('111111','王发','123456');
insert into student (stuid,stuname,password) values('222222','王啊','123456');
insert into student (stuid,stuname,password) values('333333','王来','123456');
insert into student (stuid,stuname,password) values('444444','王有','123456');
insert into student (stuid,stuname,password) values('555555','王怕','123456');

commit;