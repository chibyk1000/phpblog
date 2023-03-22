CREATE TABLE IF NOT EXISTS users(
    id int AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(200) not null,
    lastname VARCHAR(200) not null,
    username VARCHAR(200) NOT NULL,
    password VARCHAR(200) NOT NULL,
    image VARCHAR(100) null,
    gender VARCHAR(20) not null,
    dob date null,
    email VARCHAR(200) NOT NULL
    )


CREATE TABLE posts(
 
    content varchar(1000) NOT NULL,
    user_id int,
    image varchar(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)