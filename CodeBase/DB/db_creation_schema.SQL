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
insert into que_list values(1,"topic","Which of the following components of the .NET framework provide an extensible set of classes that can be used by any .NET compliant programming language?","Common Language Runtime","Common Language Infrastructure","Component Object Model","Common Type System","Common Language Runtime");
insert into que_list values(2,"topic2","Which of the following jobs are NOT performed by Garbage Collector?","Freeing memory on the stack.","Avoiding memory leaks","Freeing memory occupied by unreferenced objects.","Closing unclosed files.","Closing unclosed files.");
insert into que_list values(3,"topic3","Which of the following .NET components can be used to remove unused references from the managed heap?","Common Language Infrastructure","CLR","Garbage Collector","Class Loader","Garbage Collector");
insert into que_list values(4,"topic4","How many hosts are attached to each of the local area networks at your site?","128","254","256","64","256");
insert into que_list values(5,"topic5","When we mention the prototype of a function?","Defining","Declaring","Prototyping","Calling","Declaring");
insert into que_list values(6,"topic6","Which one is a valid declaration of a boolean?","boolean b3 = false;","boolean b4 = Boolean.false();","boolean b2 = 'false';","boolean b5 = no;","boolean b3 = false;");
insert into que_list values(7,"topic7","Which three are valid declarations of a float?","float f6 = 2.81F;","float f4 = 42e7;","float f2 = 3.14;","float f3 = 0x12345;","float f6 = 2.81F;");
insert into que_list values(8,"topic8","Which is a valid declarations of a String?","String s1 = null;","String s2 = 'null';","String s3 = (String) 'abc';","String s4 = (String) '\ufeed';","String s1 = null;");
insert into que_list values(9,"topic9","What is the numerical range of a char?","-128 to 127","-(215) to (215) - 1","-(215) to (215) - 1","0 to 32767","-128 to 127");
insert into que_list values(10,"topic10","How many 3-digit numbers are completely divisible 6 ?","149","150","151","156","151");
-- insert into que_list values(11,"topic11","Question Desc20","op1","op2","op3","op4","ans");
-- insert into que_list values(12,"topic12","Question Desc22","op1","op2","op3","op4","ans");
-- insert into que_list values(13,"topic13","Question Desc54","op1","op2","op3","op4","ans");
-- insert into que_list values(14,"topic14","Question Desc84","op1","op2","op3","op4","ans");
-- insert into que_list values(15,"topic15","Question Desc47","op1","op2","op3","op4","ans");
-- insert into que_list values(16,"topic16","Question Desc64","op1","op2","op3","op4","ans");
-- insert into que_list values(17,"topic17","Question Desc65","op1","op2","op3","op4","ans");
-- insert into que_list values(18,"topic18","Question Desc56","op1","op2","op3","op4","ans");
-- insert into que_list values(19,"topic19","Question Desc34","op1","op2","op3","op4","ans");
-- insert into que_list values(20,"topic20","Question Desc43","op1","op2","op3","op4","ans");
-- insert into que_list values(21,"topic21","Question Desc32","op1","op2","op3","op4","ans");
-- insert into que_list values(22,"topic22","Question Desc33","op1","op2","op3","op4","ans");
-- insert into que_list values(23,"topic23","Question Desc23","op1","op2","op3","op4","ans");
-- insert into que_list values(24,"topic24","Question Desc24","op1","op2","op3","op4","ans");
-- insert into que_list values(25,"","","","","","","");
-- insert into que_list values(26,"","","","","","","");
-- insert into que_list values(27,"","","","","","","");
-- insert into que_list values(28,"","","","","","","");
-- insert into que_list values(29,"","","","","","","");
-- insert into que_list values(30,"","","","","","","");
-- insert into que_list values(31,"","","","","","","");
-- insert into que_list values(32,"","","","","","","");