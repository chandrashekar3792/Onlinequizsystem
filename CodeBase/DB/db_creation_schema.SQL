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
insert into que_list values(1,"","","","","","","");
insert into que_list values(2,"","","","","","","");
insert into que_list values(3,"","","","","","","");
insert into que_list values(4,"","","","","","","");
insert into que_list values(5,"","","","","","","");
insert into que_list values(6,"","","","","","","");
insert into que_list values(7,"","","","","","","");
insert into que_list values(8,"","","","","","","");
insert into que_list values(9,"","","","","","","");
insert into que_list values(10,"","","","","","","");
insert into que_list values(11,"","","","","","","");
insert into que_list values(12,"","","","","","","");
insert into que_list values(13,"","","","","","","");
insert into que_list values(14,"","","","","","","");
insert into que_list values(15,"","","","","","","");
insert into que_list values(16,"","","","","","","");
insert into que_list values(17,"","","","","","","");
insert into que_list values(18,"","","","","","","");
insert into que_list values(19,"","","","","","","");
insert into que_list values(20,"","","","","","","");
insert into que_list values(21,"","","","","","","");
insert into que_list values(22,"","","","","","","");
insert into que_list values(23,"","","","","","","");
insert into que_list values(24,"","","","","","","");
insert into que_list values(25,"","","","","","","");
insert into que_list values(26,"","","","","","","");
insert into que_list values(27,"","","","","","","");
insert into que_list values(28,"","","","","","","");
insert into que_list values(29,"","","","","","","");
insert into que_list values(30,"","","","","","","");
insert into que_list values(31,"","","","","","","");
insert into que_list values(32,"","","","","","","");