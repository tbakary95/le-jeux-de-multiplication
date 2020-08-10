create database if not exists localhost1;

use localhost1;

create table if not exists multiplication(
(
id     int unsigned auto_increment not null,
ville  nvarchar(255),
constraint pk_multiplication prima

);



create table if not exists users(

id int auto_increment not null ,
prenom varchar(50) not null ,
password varchar(50) ,
email  nvarchar(255) unique not null ,
constraint uq_prenom_users UNIQUE (prenom),
constraint uq_email_users UNIQUE (email),
constraint pk_users primary key (id)
);
drop table if exists Multiplication;