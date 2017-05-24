create table actionneur
(
	Id_Actionneur int auto_increment
		primary key,
	Etat_Actionneur tinyint(1) not null,
	id_user int null
)
;

create index actionneur_user_id_fk
	on actionneur (id_user)
;

create table capteurs
(
	ID_Capteurs int auto_increment
		primary key,
	Type text not null,
	Valeur float not null,
	Date_Installation datetime not null,
	Etat_Batterie int not null,
	ID_piece int null,
	unite text null
)
;

create index capteurs_pieces_ID_pièces_fk
	on capteurs (ID_piece)
;

create table client_secondaire
(
	ID_Secondaire int auto_increment
		primary key,
	mail text not null,
	Pass varchar(255) not null,
	ID_USER int not null
)
;

create index client_secondaire_user_id_fk
	on client_secondaire (ID_USER)
;

create table historique_capteurs
(
	Id_mesure int auto_increment
		primary key,
	Date_Mesure date not null,
	Valeur float not null,
	unite varchar(3) not null,
	ID_capteur int not null,
	constraint historique_capteurs_capteurs_ID_Capteurs_fk
		foreign key (ID_capteur) references dohome.capteurs (ID_Capteurs)
)
;

create index historique_capteurs_capteurs_ID_Capteurs_fk
	on historique_capteurs (ID_capteur)
;

create table maison
(
	Id int auto_increment
		primary key,
	nbpieces int not null,
	ID_user int null,
	Nom varchar(25) null
)
;

create index maison_user_id_fk
	on maison (ID_user)
;

create table messagerie
(
	ID_Message int auto_increment
		primary key,
	Titre text not null,
	Contenu text not null,
	ID_Expediteur int not null,
	ID_Destinataire int not null,
	Time_Stamp text not null
)
;

create index messagerie_dest___fk
	on messagerie (ID_Destinataire)
;

create index messagerie_exp_user_id_fk
	on messagerie (ID_Expediteur)
;

create table ownership_actio_scen
(
	Id_Actionneur int auto_increment,
	ID_Scenarios int not null,
	primary key (Id_Actionneur, ID_Scenarios)
)
;

create table ownership_capt_scen
(
	ID_Capteurs int not null,
	ID_Scenarios int not null,
	primary key (ID_Capteurs, ID_Scenarios)
)
;

create table ownership_pièces_scen
(
	ID_pieces int not null,
	ID_Scenarios int not null,
	primary key (ID_pieces, ID_Scenarios)
)
;

create table pieces
(
	ID_pieces int auto_increment
		primary key,
	ID_Maison int not null,
	Nom text not null,
	constraint pieces_maison_Id_fk
		foreign key (ID_Maison) references dohome.maison (Id)
)
;

create index pieces_maison_Id_fk
	on pieces (ID_Maison)
;

alter table capteurs
	add constraint capteurs_pieces_ID_pièces_fk
		foreign key (ID_piece) references dohome.pieces (ID_pieces)
;

create table scenarios
(
	ID_Scénarios int auto_increment
		primary key,
	ID_User int not null,
	Nom_Scénarios text not null
)
;

create index scénarios_user_id_fk
	on scenarios (ID_User)
;

create table user
(
	id int auto_increment
		primary key,
	Mail varchar(255) not null,
	Prenom varchar(50) not null,
	Nom varchar(50) not null,
	telephone varchar(10) not null,
	mot_de_passe varchar(255) not null,
	Adresse text not null,
	Is_admin tinyint(1) default '0' not null,
	date_inscription datetime not null,
	date_naissance datetime not null,
	sexe tinyint(1) null,
	recup varchar(255),
	constraint user_Mail_uindex
		unique (Mail)
)
;

alter table actionneur
	add constraint actionneur_user_id_fk
		foreign key (id_user) references dohome.user (id)
;

alter table client_secondaire
	add constraint client_secondaire_user_id_fk
		foreign key (ID_USER) references dohome.user (id)
;

alter table maison
	add constraint maison_user_id_fk
		foreign key (ID_user) references dohome.user (id)
;

alter table messagerie
	add constraint messagerie_exp_user_id_fk
		foreign key (ID_Expediteur) references dohome.user (id)
;

alter table messagerie
	add constraint messagerie_dest___fk
		foreign key (ID_Destinataire) references dohome.user (id)
;

alter table scenarios
	add constraint scénarios_user_id_fk
		foreign key (ID_User) references dohome.user (id)
;



INSERT INTO dohome.capteurs (Type, Valeur, Date_Installation, Etat_Batterie, ID_piece, unite) VALUES ('temp', 20, '2017-05-19 00:00:00', 100, 1, 'Celsius');
INSERT INTO dohome.capteurs (Type, Valeur, Date_Installation, Etat_Batterie, ID_piece, unite) VALUES ('temp', 25, '2017-05-10 00:00:00', 100, 2, 'Celsius');
INSERT INTO dohome.capteurs (Type, Valeur, Date_Installation, Etat_Batterie, ID_piece, unite) VALUES ('temp', 25, '2017-05-10 00:00:00', 100, 2, 'Celsius');
INSERT INTO dohome.capteurs (Type, Valeur, Date_Installation, Etat_Batterie, ID_piece, unite) VALUES ('illum', 4300, '2017-05-01 00:00:00', 100, 3, 'Lux');
INSERT INTO dohome.maison (nbpieces, ID_user, Nom) VALUES (1, 1, 'Appart');
INSERT INTO dohome.pieces (ID_Maison, Nom) VALUES (1, 'Salon');
INSERT INTO dohome.pieces (ID_Maison, Nom) VALUES (1, 'Cuisine');
INSERT INTO dohome.pieces (ID_Maison, Nom) VALUES (1, 'Cuisine 2');
INSERT INTO dohome.user (Mail, Prenom, Nom, telephone, mot_de_passe, Adresse, Is_admin, date_inscription, date_naissance, sexe) VALUES ('test@gmail.xxx', 'Nicolas', 'Kiris', '064206969', 'azerty', 'no', 0, '2017-05-07 17:43:44', null, null);
INSERT INTO dohome.user (Mail, Prenom, Nom, telephone, mot_de_passe, Adresse, Is_admin, date_inscription, date_naissance, sexe) VALUES ('test@test.Com', 'Nicolas', 'lelelelel', '064206969', 'azerty', 'no', 0, '2017-05-05 17:43:55', null, null);
INSERT INTO dohome.user (Mail, Prenom, Nom, telephone, mot_de_passe, Adresse, Is_admin, date_inscription, date_naissance, sexe) VALUES ('admin', 'admin', 'admin', '', 'admin', 'no', 1, '2017-05-21 17:43:13', '1995-05-21 17:43:20', 0);