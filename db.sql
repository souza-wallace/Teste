
CREATE TABLE Carros (
    ID int primary key auto_increment,
    chassi varchar(255),
    modelo varchar(255),
    marca varchar(255),
    placa varchar(255),
    ano varchar(255),
    caracteristicas varchar(255)
);


insert into Carros values('003','chassi', 'modelo', 'marca', 'placa', 'ano', 'caracteristica');
insert into Carros values('002','12345ased', 'palio', 'fiat', 'qhy1pgh', '2008', 'economico');
insert into Carros values('004','00345ased', 'nivus', 'volkswagen', 'qhy1pgh', '2021', 'turbo');
insert into Carros values('005','00345ased', 'virtus', 'volkswagen', 'qhy1pgh', '2021', 'estrada');
insert into Carros values('006','00345ased', 'jetta', 'volkswagen', 'qhy1pgh', '2021', 'esportivo');
insert into Carros values('007','00345ased', 'opala', 'chevrolet', 'qhy1pgh', '1980', 'classico');