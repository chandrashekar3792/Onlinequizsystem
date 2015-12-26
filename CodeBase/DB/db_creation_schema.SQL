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
insert into que_list values(11,"topic11","What are the types of linkages?","Internal and External","External, Internal and None","External and None","Internal","External, Internal and None");
insert into que_list values(12,"topic12","Which of the following special symbol allowed in a variable name?","* (asterisk)","| (pipeline)","- (hyphen)","_ (underscore)","_ (underscore)");
insert into que_list values(13,"topic13","How would you round off a value from 1.66 to 2.0?","ceil(1.66)","floor(1.66)","oroundup(1.66)","roundto(1.66)","ceil(1.66)");
insert into que_list values(14,"topic14","What will happen if in a C program you assign a value to an array element whose subscript exceeds the size of array?","The element will be set to 0.","The compiler would report an error.","The program may crash if some important data gets overwritten.","The array size would appropriately grow.","The program may crash if some important data gets overwritten.");
insert into que_list values(15,"topic15","In C, if you pass an array as an argument to a function, what actually gets passed?","Value of elements in array","First element of the array","Base address of the array","Address of the last element of array","Base address of the array");
insert into que_list values(16,"topic16","Which of the following function sets first n characters of a string to a given character?","strinit()","strnset()","strset()","strcset()","strnset()");
insert into que_list values(17,"topic17","If the two strings are identical, then strcmp() function returns","-1","1","0","yes","0");
insert into que_list values(18,"topic18","How will you print \n on the screen?","printf('\n');","echo '\\n';","printf('\n');","printf('\\n');","printf('\\n');");
insert into que_list values(19,"topic19","The library function used to find the last occurrence of a character in a string is","strnstr()","laststr()","strrchr()","strstr()","strrchr()");
insert into que_list values(20,"topic20","Which of the following function is used to find the first occurrence of a given string in another string?","strchr()","strrchr()","strstr()","strnset()","strstr()");
insert into que_list values(21,"topic21","The keyword used to transfer control from a function back to the calling function is","switch","goto","go back","return","return");
insert into que_list values(22,"topic22","An on-line commercial site such as Amazon.com is an example of a(n) ________ ","single-user database application","multiuser database application","e-commerce database application","data mining database application","e-commerce database application");
insert into que_list values(23,"topic23","The following are components of a database except ________","user data","metadata","reports","indexes","reports");
insert into que_list values(24,"topic24","The DBMS acts as an interface between what two components of an enterprise-class database system?","Database application and the database","Data and the database","The user and the database application","Database application and SQL","Data and the database");
-- insert into que_list values(25,"","","","","","","");
-- insert into que_list values(26,"","","","","","","");
-- insert into que_list values(27,"","","","","","","");
-- insert into que_list values(28,"","","","","","","");
-- insert into que_list values(29,"","","","","","","");
-- insert into que_list values(30,"","","","","","","");
-- insert into que_list values(31,"","","","","","","");
-- insert into que_list values(32,"","","","","","","");