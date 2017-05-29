create table "users" (
  "id" serial primary key,
  "email" varchar(50) not null,
  "password" varchar(50) not null,
  "name" varchar(50) not null,
  "birthday" varchar(50) not null,
  "city" varchar(50) not null,
  "avatar" varchar(120) not null
);

create table "comments" (
  "id" serial primary key,
  "text" varchar(100) not null,
  "user_id" varchar(100) not null,
  "comment_id" varchar(100)
);

create table "posts" (
  "id" serial primary key,
  "text" varchar(1000) not null,
  "tags" varchar(100) not null
);

create table "tags" (
  "id" serial primary key,
  "name" varchar(1000) not null
);

create table "post_tags" (
  "id" serial primary key,
  "post_id" varchar(10) not null,
  "tag_id" varchar(10) not null
);


insert into tags values(1, 'one');
insert into tags values(2, 'two');
insert into tags values(3, 'three');
insert into tags values(4, 'three');
insert into tags values(5, 'four');
insert into tags values(6, 'five');
insert into tags values(7, 'sex');
