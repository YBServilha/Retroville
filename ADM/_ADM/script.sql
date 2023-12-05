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
    'MANUAL - 4 Marchas', 8, 'Esta n├úo ├® apenas uma m├íquina; ├® um peda├ºo da hist├│ria automotiva que foi restaurado e reimaginado para atender aos padr├Áes de hoje. O interior reflete o luxo da d├®cada de 80, combinando conforto e nostalgia de uma forma ├║nica. Cada detalhe foi cuidadosamente mantido para preservar a autenticidade deste cl├íssico.
  Imagine-se dirigindo pelas estradas, as luzes noturnas dan├ºando no exterior preto espelhado, enquanto voc├¬ segura o volante cl├íssico e sente o poder do motor respondendo ao seu toque. Este Opala Diplomata 1989 preto n├úo ├® apenas um carro; ├® uma experi├¬ncia que desperta os sentidos e evoca mem├│rias de uma era dourada.', 'carro1.jpg', 'opala-inicio.png',
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
    'MANUAL', 6, 'O Chevrolet D20 foi uma picape produzida no Brasil de 1985 a 1996. Conhecida por sua robustez e versatilidade, atendia tanto ├ás necessidades de transporte de carga como ao uso pessoal. Oferecida com diversas op├º├Áes de motores, a D20 ganhou destaque e ├® lembrada como um ├¡cone da ind├║stria automobil├¡stica brasileira.', 'carro1.png', 'd20inicio.png',
    'd20historia.png', 'carro2.png', 'carro3.png', 'carro4.png', 'carro5.png',
    'carro6.png', 'carro7.png', 'carro8.png', 'carro9.png', '1'
);

INSERT INTO produtos (
    cod, data, marca, modelo, carroceria, preco, motor, cor, km, ano,
    cambio, finalPlaca, textoCarro, imgCard, imgCapa, imgHistoria, img1,
    img2, img3, img4, img5, img6, img7, img8, status
) VALUES (
    'wlRr23rP', '05-12-2023 20:16:55', 'VolksWagen', 'Gol', 'Hatch',
    105000.00, '1.8', 'vermelho', '198.100', '1991',
    'manual', 7, 'O Volkswagen Gol GTS foi uma vers├úo esportiva do popular Gol, lan├ºado no Brasil em 1987. Ele era o sucessor direto do Gol GT e antecessor do Gol GTI. Com um motor 1.8 a ├ílcool, que mais tarde ganhou uma vers├úo a gasolina, o Gol GTS era conhecido por seu desempenho robusto e design esportivo, que inclu├¡a faixas decorativas, rodas de liga leve e um interior diferenciado com volante esportivo. O Gol GTS tornou-se um dos modelos mais emblem├íticos dos anos 80 e 90, apreciado por entusiastas do automobilismo e colecionadores de carros cl├íssicos brasileiros.', 'c12.webp', 'c11.webp', 'c222.webp',
    'c2.webp', 'c3.webp', 'c4.webp', 'c5.webp', 'c6.webp',
    'c7.webp', 'c8.webp', 'c9.webp', '1'
);

INSERT INTO produtos (
    cod, data, marca, modelo, carroceria, preco, motor, cor, km, ano,
    cambio, finalPlaca, textoCarro, imgCard, imgCapa, imgHistoria, img1,
    img2, img3, img4, img5, img6, img7, img8, status
) VALUES (
    '9z6pC3vm', '05-12-2023 20:35:43', 'VOLKSWAGEN', 'KOMBI', 'SUV',
    82000.00, '1.2 V8', 'VERMELHO', '20.000', '1961',
    'MANUAL', 2, 'A Volkswagen Kombi, ├® um dos ve├¡culos mais ic├┤nicos e longevos da hist├│ria automotiva. Lan├ºada em 1950, originou-se do design simples e funcional de Ben Pon, inspirado nos ve├¡culos utilit├írios da Segunda Guerra Mundial. A Kombi rapidamente se tornou popular devido ├á sua versatilidade, sendo usada para transporte de passageiros, carga e at├® como base para ambul├óncias e campervans. Ao longo das d├®cadas, a Kombi passou por v├írias atualiza├º├Áes, mas manteve o conceito de design e praticidade.', 'carro1.jpg', 'kombiinicio.png', 'kombihistoria.png',
    'carro2.jpg', 'carro3.jpg', 'carro4.jpg', 'carro7.jpg', 'carro9.jpg',
    'carro11.jpg', 'carro12.jpg', 'carro13.jpg', '1'
);