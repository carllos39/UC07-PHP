CREATE TABLE IF NOT EXISTS usuario(
id int auto_increment primary key,
nome varchar(50) not null,
senha varchar(255) not null,
email varchar(100) unique not null,
token varchar(255) default null
);