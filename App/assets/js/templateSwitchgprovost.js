content = document.getElementById("template");
const callback = data => {	
		data = data.target;
		if(data.status === 200 && data.readyState === 4)
			content.innerHTML = data.response;
};

function getAccueil() {
	clearDiv(content)
	GetByStream("GET","templates/Accueil.html",callback);
}

function getRegisterClient() {
	clearDiv(content)
	GetByStream("GET","templates/Inscription_Client.html",callback);
}

function getRegisterFirm() {
	clearDiv(content)
	GetByStream("GET","templates/Inscription_Entreprise.html",callback);
}


function getAbscence() {
	clearDiv(content)
	GetByStream("GET","templates/Absence.html",callback);
}

function getConsult() {
	clearDiv(content)
	GetByStream("GET","templates/Consulter_Reservation.html",callback);
}

function retourAccueilInfra() {
	clearDiv(content)
	GetByStream("GET","templates/Accueil_Infrastructure.html",callback);
}

function retourAccueilClient() {
	clearDiv(content)
	GetByStream("GET","templates/Accueil_Client.html",callback);
}

function getReserver() {
	clearDiv(content)
	GetByStream("GET","templates/Reserver_Client.html",callback);
}

function getModifierClient() {
	clearDiv(content)
	GetByStream("GET","templates/Modifier_Client.html",callback);
}

function getSupprimerClient() {
	clearDiv(content)
	GetByStream("GET","templates/Supprimer_Client.html",callback);
}

function retourModification(){
	clearDiv(content)
	GetByStream("GET","templates/Modifier_Client.html",callback);
}

function getReservation(){
	clearDiv(content)
	GetByStream("GET","templates/Reserver.html",callback);
}
