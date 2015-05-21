CREATE DATABASE online_quiz;

USE online_quiz;

CREATE TABLE USERS(id int(10) NOT NULL AUTO_INCREMENT,
					name VARCHAR(20)  UNIQUE NOT NULL,
					password VARCHAR(20) NOT NULL,
					usertype ENUM('A', 'S') NOT NULL,
					phone VARCHAR(12) NOT NULL,
					email varchar(25) NOT NULL,
					PRIMARY KEY (id));

/*<Ph>Do not remove or modify the below query..*/ 
INSERT INTO USERS VALUES('1','admin','admin','A','9999999999','admin@admin.COM');

/* Here form_title should be same as the table name of the corresponding form*/
create table que_list(que_id int(10) not null auto_increment,
						que_topic varchar(30) not null,
						que_desc varchar(100) not null,
						op1 varchar(40) not null,
						op2 varchar(40) not null,
						op3 varchar(40) not null,
						op4 varchar(40) not null,
						ans varchar(40) not null,
						primary key(que_id));
						
						
-- Create table user_test_status(
			-- userid int(20) not null,
			 -- varchar(40) not null,
			-- primary key(userid),
			-- foreign key(userid) references users(id) on delete cascade on update cascade);
insert into que_list values(1,"topic","Question Desc11","op1","op2","op3","op4","ans");
insert into que_list values(2,"topic2","Question Desc22","op1","op2","op3","op4","ans");
insert into que_list values(3,"topic3","Question Desc33","op1","op2","op3","op4","ans");
insert into que_list values(4,"topic4","Question Desc44","op1","op2","op3","op4","ans");
insert into que_list values(5,"topic5","Question Desc55","op1","op2","op3","op4","ans");
insert into que_list values(6,"topic6","Question Desc66","op1","op2","op3","op4","ans");
insert into que_list values(7,"topic7","Question Desc77","op1","op2","op3","op4","ans");
insert into que_list values(8,"topic8","Question Desc88","op1","op2","op3","op4","ans");
insert into que_list values(9,"topic9","Question Desc99","op1","op2","op3","op4","ans");
insert into que_list values(10,"topic10","Question Desc56","op1","op2","op3","op4","ans");
insert into que_list values(11,"topic11","Question Desc20","op1","op2","op3","op4","ans");
insert into que_list values(12,"topic12","Question Desc22","op1","op2","op3","op4","ans");
insert into que_list values(13,"topic13","Question Desc54","op1","op2","op3","op4","ans");
insert into que_list values(14,"topic14","Question Desc84","op1","op2","op3","op4","ans");
insert into que_list values(15,"topic15","Question Desc47","op1","op2","op3","op4","ans");
insert into que_list values(16,"topic16","Question Desc64","op1","op2","op3","op4","ans");
insert into que_list values(17,"topic17","Question Desc65","op1","op2","op3","op4","ans");
insert into que_list values(18,"topic18","Question Desc56","op1","op2","op3","op4","ans");
insert into que_list values(19,"topic19","Question Desc34","op1","op2","op3","op4","ans");
insert into que_list values(20,"topic20","Question Desc43","op1","op2","op3","op4","ans");
insert into que_list values(21,"topic21","Question Desc32","op1","op2","op3","op4","ans");
insert into que_list values(22,"topic22","Question Desc33","op1","op2","op3","op4","ans");
insert into que_list values(23,"topic23","Question Desc23","op1","op2","op3","op4","ans");
insert into que_list values(24,"topic24","Question Desc24","op1","op2","op3","op4","ans");
-- insert into que_list values(25,"","","","","","","");
-- insert into que_list values(26,"","","","","","","");
-- insert into que_list values(27,"","","","","","","");
-- insert into que_list values(28,"","","","","","","");
-- insert into que_list values(29,"","","","","","","");
-- insert into que_list values(30,"","","","","","","");
-- insert into que_list values(31,"","","","","","","");
-- insert into que_list values(32,"","","","","","","");