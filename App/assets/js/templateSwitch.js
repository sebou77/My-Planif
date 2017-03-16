content = document.getElementById("template");

const callback =  data => {	
		data = data.target;
		if(data.status === 200 && data.readyState === 4)
			content.innerHTML = data.response;
	};

function getPage(DOSSIER,PAGE) {
	clearDiv(content)
	GetByStream("GET","templates/"+DOSSIER+"/"+PAGE+".html",callback);
}
