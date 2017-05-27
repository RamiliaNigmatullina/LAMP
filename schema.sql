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
