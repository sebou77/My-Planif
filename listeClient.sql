create table listeAttente (
	idreservation varchar(18) NOT NULL, 
	dateres date NOT NULL, 
	heure time;
	CONSTRAINT PK_liste PRIMARY KEY (idreservation)
);