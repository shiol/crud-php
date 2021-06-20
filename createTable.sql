CREATE database if not exists test;
CREATE TABLE if not exists entidades (
    id char(36) primary key,
    codigo varchar(100) not null,
    descricao varchar(100) not null,
    valor decimal not null
);
