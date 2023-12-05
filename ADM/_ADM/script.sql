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
    status varchar(1) not null,
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
    imgCard varchar(80) not null,
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

create table pedidos(
    id int not null auto_increment,
    cpf varchar(100) not null,
    nome varchar(100) not null,
    nome_produto varchar(100) not null,
    preco varchar(100) not null,
    cod varchar(100) not null,
    imgCard varchar(100) not null,
    primary key(id)
);


INSERT INTO produtos (
    cod, data, marca, modelo, carroceria, preco, motor, cor, km, ano,
    cambio, finalPlaca, textoCarro, imgCard, imgCapa, imgHistoria, img1,
    img2, img3, img4, img5, img6, img7, img8, status
) VALUES (
    '76oDXv22', '05-12-2023 19:26:36', 'CHEVROLET', 'OPALA', 'Sedan',
    70000.00, '12V', 'Preto', '150.000', '1989',
    'MANUAL - 4 Marchas', 8, 'Esta não é apenas uma máquina; é um pedaço da história automotiva que foi restaurado e reimaginado para atender aos padrões de hoje. O interior reflete o luxo da década de 80, combinando conforto e nostalgia de uma forma única. Cada detalhe foi cuidadosamente mantido para preservar a autenticidade deste clássico. 
  Imagine-se dirigindo pelas estradas, as luzes noturnas dançando no exterior preto espelhado, enquanto você segura o volante clássico e sente o poder do motor respondendo ao seu toque. Este Opala Diplomata 1989 preto não é apenas um carro; é uma experiência que desperta os sentidos e evoca memórias de uma era dourada.', 'carro1.jpg', 'opala-inicio.png',
    'opala-historia.png', 'carro2.jpg', 'carro3.jpg', 'carro4.jpg', 'carro5.jpg',
    'carro6.jpg', 'carro7.jpg', 'carro8.jpg', 'carro9.jpg', '1'
);

INSERT INTO produtos (
    cod, data, marca, modelo, carroceria, preco, motor, cor, km, ano,
    cambio, finalPlaca, textoCarro, imgCard, imgCapa, imgHistoria, img1,
    img2, img3, img4, img5, img6, img7, img8, status
) VALUES (
    'xWMq7RQQ', '05-12-2023 19:49:55', 'CHEVROLET', 'D20', 'Caminhonete',
    1650000.00, '4.0', 'Vermelho', '12.000', '1993',
    'MANUAL', 6, 'O Chevrolet D20 foi uma picape produzida no Brasil de 1985 a 1996. Conhecida por sua robustez e versatilidade, atendia tanto às necessidades de transporte de carga como ao uso pessoal. Oferecida com diversas opções de motores, a D20 ganhou destaque e é lembrada como um ícone da indústria automobilística brasileira.', 'carro1.png', 'd20inicio.png',
    'd20historia.png', 'carro2.png', 'carro3.png', 'carro4.png', 'carro5.png',
    'carro6.png', 'carro7.png', 'carro8.png', 'carro9.png', '1'
);