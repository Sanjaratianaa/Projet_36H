create database exchange;

Use exchange;

 --- TABLES
        create table Person(
            idPerson int AUTO_INCREMENT PRIMARY KEY NOT NULL,
            namePerson VARCHAR(50) NOT NULL,
            email VARCHAR(70) NOT NULL,
            pass VARCHAR(50) NOT NULL,
            statut VARCHAR(20) NOT NULL
        );

Insert into Person Values(
    NULL,
    'Layah',
    'layah@gmail.com',
    '....',
    'Admin'
);

select * 
    from Person
    Where email = '' and pass = '';
    -- refa tsy mamerina de tsy mety 


-- Categories 
create table Categories(
    idCategories int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nameCategories VARCHAR(50) NOT NULL
);

Insert into Categories Values( NULL,'Kiraro');
Insert into Categories Values( NULL,'Akanjo');
Insert into Categories Values( NULL,'Fanaka');

update Categories set idCategories = ;
delete from Categories Where idCategories = ;


-- Images
create table Images(
    idImage int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    photo1 VARCHAR(50),
    photo2 VARCHAR(50),
    photo3 VARCHAR(50)
);
update Images set idProducts = ;

-- Products
create table Products(
    idProducts int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nameProduct VARCHAR(50) NOT NULL,
    idPerson int references Person (idPerson),
    idCategories int references Categories (idCategories),    
    price double precision NOT NULL,
    idImage int references Images (idImage),
    descriptions VARCHAR(500),
    titre VARCHAR(100)
);

Insert into Products Values(NULL,'converse',1,1,1000,1,'','');
Insert into Products Values(NULL,'converse',1,1,1000,1,'','');
Insert into Products Values(NULL,'converse',1,1,1000,1,'','');
Insert into Products Values(NULL,'converse',1,1,1000,1,'','');

update Products set idProducts = ;
delete from Categories Where idProducts = ;

-- Statut
create table Statut(
    idStatut int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    statut int NOT NULL,
    nameStatut VARCHAR(50) NOT NULL
);
Insert into Statut Values(NULL,1,'Dispo');
Insert into Statut Values(NULL,11,'Pas dispo');
Insert into Statut Values(NULL,21,'Refuser');

-- Proposition
    create table Proposition(
        IdProposition int AUTO_INCREMENT PRIMARY KEY NOT NULL,
        idProducts1 int references Products (idProducts),
        idProduct2 int references Products (idProducts),
        idPerson1 int references Person (idPerson),
        idPerson2 int references Person (idPerson),
        idStatut int references Statut (idStatut), 
        dateRequest Date NOT NULL,
        dateResponse Date 
    );

Insert into Proposition Values(NULL,1,2,1,2,1,now(),NULL);
delete from Proposition Where IdProposition = ;

-- Historique
        create table historiqueExchange(
            idHistorique int AUTO_INCREMENT PRIMARY KEY NOT NULL,
            idProduct int references Products (idProducts),
            idProprietaire int references Person(idPerson),
            dateHeureEchange DATETIME
        );











