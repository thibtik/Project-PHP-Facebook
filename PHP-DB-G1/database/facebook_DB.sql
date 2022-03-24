


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE users(
    user_id int primary key auto_increment,
    first_name varchar(25) not null,
    last_name varchar(25) not null,
    email varchar(255) not null,
    passwords varchar(50) not null,
    dat_of_birth varchar(255) not null,
    gender char(1) not null
);

CREATE TABLE posts(
    post_id int primary key auto_increment,
    title varchar(255) ,
    content_post varchar(255),
    image_name varchar(255),
    user_id int not null,
    foreign key (user_id) references Users(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE comments(
    comment_id int primary key auto_increment,
    content varchar(255),
    user_id int not null,
    post_id int not null,
    foreign key (user_id) references Users(user_id),
    foreign key (post_id) references Posts (post_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

