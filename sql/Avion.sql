CREATE TABLE AVION(
	id_avion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nom_type VARCHAR(255),
	nb_place INT,
	loc_avion VARCHAR(255)
);

CREATE TABLE PILOTE(
	id_pilote INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nom_pilote VARCHAR(255),
	nom_ville VARCHAR(255)
);

CREATE TABLE VOL(
	id_vol INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_pilote INT NOT NULL,
	id_avion INT NOT NULL,
	loc_dep VARCHAR(255),
	loc_arr VARCHAR(255),
	heure_dep VARCHAR(255),
	heure_arr VARCHAR(255),
	FOREIGN KEY (id_avion) REFERENCES AVION(id_avion),
	FOREIGN KEY (id_pilote) REFERENCES PILOTE(id_pilote)
);

/*------------------------------------------------------*/

SELECT * FROM VOL WHERE loc_dep='Paris Orly';

SELECT nom_type, loc_avion FROM AVION WHERE loc_avion!='Paris Orly' AND nb_place>200 ORDER BY nom_type DESC;

SELECT nom_pilote FROM VOL NATURAL JOIN AVION NATURAL JOIN PILOTE WHERE nom_type LIKE 'ATR%';

SELECT nom_pilote FROM AVION NATURAL JOIN PILOTE WHERE nom_type='B747' AND INSTR(loc_avion, nom_ville)!=0;



/*------------------------------------------------------*/

CREATE TABLE AEROPORT(
	id_aeroport INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nom_aeroport VARCHAR(255),
	nom_ville VARCHAR(255)
);

CREATE TABLE TYPE(
	id_type INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nom_type VARCHAR(255),
	nb_place VARCHAR(255)
);

CREATE TABLE LICENCETYPE(
	nom_licence VARCHAR(255),
	id_type INT NOT NULL,
	FOREIGN KEY (id_type) REFERENCES TYPE(id_type),
	PRIMARY KEY(nom_licence, id_type)
);

CREATE TABLE LICENCEPILOTE(
	id_pilote INT NOT NULL,
	nom_licence VARCHAR(255),
	FOREIGN KEY (id_pilote) REFERENCES PILOTE(id_pilote),
	FOREIGN KEY (nom_licence) REFERENCES LICENCETYPE(id_licence),
	PRIMARY KEY(id_pilote, nom_licence)
);


ALTER TABLE AVION(
	ADD id_aeroport INT NOT NULL,
	ADD id_type INT NOT NULL,
	FOREIGN KEY (id_aeroport) REFERENCES AEROPORT(id_aeroport),
	FOREIGN KEY (id_type) REFERENCES LICENCETYPE(id_type)
);

ALTER TABLE VOL(
	ADD id_ae_dep INT NOT NULL,
	ADD id_ae_arr INT NOL NULL,
	FOREIGN KEY (id_ae_dep) REFERENCES AEROPORT(id_aeroport),
	FOREIGN KEY (id_ae_arr) REFERENCES AEROPORT(id_aeroport),
);

/*------------------------------------------------------*/

INSERT INTO TYPE (nom_type, nb_place) SELECT nom_type, nb_place FROM AVION UPDATE AVION SET id_type=id_type;


/*------------------------------------------------------*/

ALTER TABLE AVION(
	DROP nom_type,
	DROP nb_place,
	DROP loc_avion
);

ALTER TABLE VOL(
	DROP loc_dep,
	DROP loc_arr,
);