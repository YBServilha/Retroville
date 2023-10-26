create database retroville;

use retroville;

create table adm(
    id int not null auto_increment,
    email varchar(100) not null,
    senha varchar(100) not null,
    primary key(id)
);

insert into ADM(email, senha) values('teste@gmail.com','MTIz');

create table produtos(
    id int not null auto_increment,
    cod varchar(10) not null,
    data varchar(19) not null,
    marca varchar(80) not null,
    modelo varchar(80) not null,
    carroceria varchar(80) not null,        
    preco decimal(10,2) not null,
    motor varchar(120) not null,
    cor varchar(80) not null,
    km varchar(100) not null,
    ano varchar(9) not null,
    cambio varchar(100) not null,
    finalPlaca int(1) not null,
    textoCarro varchar(1200) not null,
    imgCard varchar(80) not null,
    imgCapa varchar(80) not null,               
    imgHistoria varchar(80) not null,
    img1 varchar(80) not null,
    img2 varchar(80) not null,
    img3 varchar(80) not null,
    img4 varchar(80) not null,
    img5 varchar(80) not null,
    img6 varchar(80) not null,
    img7 varchar(80) not null,
    img8 varchar(80) not null,
    primary key(id)
);  

create table usuarios(
    id int not null auto_increment,
    email varchar(100) not null,
    nome varchar(100) not null,
    senha varchar(100) not null,
    cpf varchar(100) not null,
    primary key(id)
);

create table carrinho(
    id int not null auto_increment,
    cod_usuario varchar(50) not null,
    cod_produto varchar(50) not null,
    marca varchar(80) not null,
    modelo varchar(80) not null,
    carroceria varchar(80) not null,        
    preco decimal(10,2) not null,
    motor varchar(120) not null,
    cor varchar(80) not null,
    km varchar(100) not null,
    ano varchar(9) not null,
    primary key(id)
);