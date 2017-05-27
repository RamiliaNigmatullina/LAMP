create table "users" (
  "id" serial primary key,
  "email" varchar(50) not null,
  "password" varchar(50) not null,
  "name" varchar(50) not null,
  "birthday" varchar(50) not null,
  "city" varchar(50) not null,
  "avatar" varchar(120) not null
);

-- ["email", "password", "name", "birthday", "city", "avatar"];
