content = document.getElementById("template");


function getAccueil() {
	GetByStream("GET","templates/Accueil.html", data => {	
		data = data.target;
		if(data.status === 200 && data.readyState === 4)
			content.innerHTML = data.response;
	});
}
