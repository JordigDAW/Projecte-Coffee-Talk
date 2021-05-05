CREATE SCHEMA IF NOT EXISTS blog DEFAULT CHARACTER SET utf8 ;

USE blog ;

CREATE TABLE usuari
   (codusu 	int		not null AUTO_INCREMENT,
    nomusu 	varchar(15)	not null,
    userusu 	varchar(15)	not null,
    passusu 	varchar(15)	not null,
    emailusu 	varchar(255)	not null,
    primary key(codusu))
ENGINE = InnoDB;

CREATE TABLE categoria
   (codcat 	int		not null,
    nomcat 	varchar(15)	null,
    primary key(codcat))
ENGINE = InnoDB;

CREATE TABLE article
   (codart 	int		not null,
    titart 	varchar(50)	null,
    bodyart 	varchar(150)	null,
    datart 	datetime	null,
    codcat	int		null,
    codusu 	int		null,
    primary key(codart),
    foreign key(codcat) references categoria(codcat),
    foreign key(codusu) references usuari(codusu))
ENGINE = InnoDB;

CREATE TABLE comentari
   (codcom 	int		not null,
    titcom 	varchar(50)	null,
    bodycom 	varchar(150)	null,
    datcom 	datetime	null,
    codart	int		null,
    codusu 	int		null,
    primary key(codcom),
    foreign key(codart) references article(codart),
    foreign key(codusu) references usuari(codusu))
ENGINE = InnoDB;

