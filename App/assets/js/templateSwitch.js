content = document.getElementById("template");


function getAccueil() {
	clearDiv(content)
	GetByStream("GET","templates/Accueil.html", data => {	
		data = data.target;
		if(data.status === 200 && data.readyState === 4)
			content.innerHTML = data.response;
	});
}

function getRegisterClient() {
	clearDiv(content)
	GetByStream("GET","templates/Inscription_Client.html", data => {	
		data = data.target;
		if(data.status === 200 && data.readyState === 4)
			content.innerHTML = data.response;
	});
}

function getRegisterFirm() {
	clearDiv(content)
	GetByStream("GET","templates/Inscription_Entreprise.html", data => {	
		data = data.target;
		if(data.status === 200 && data.readyState === 4)
			content.innerHTML = data.response;
	});
}
