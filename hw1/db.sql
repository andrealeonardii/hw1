
CREATE TABLE Utente (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    data_nascita DATE
);
CREATE TABLE Viaggio (
    id integer primary key auto_increment,
    nome varchar(255),
    luogo varchar(255),
    descrizione varchar(1000),
    prezzo double,
    data_inizio DATE,
    data_fine DATE
);
CREATE TABLE Aggiungi_viaggio (
    id integer primary key auto_increment,
    user_id integer not null,
    foreign key (user_id) references Utente(id),
    viaggio_id integer not null,
    foreign key (viaggio_id) references Viaggio(id)
);
