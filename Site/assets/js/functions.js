function GetByStream(HTTP_METHOD, FILE, callback) {
	let xhr = new XMLHttpRequest();
	xhr.open(HTTP_METHOD, FILE, true);
	xhr.onreadystatechange = callback;
	xhr.send(null);
}

function clearDiv(ELEMENT) {
	while (ELEMENT.firstChild) {
		ELEMENT.removeChild(ELEMENT.firstChild);
	}
}

function SQLRequest(QUERY, args,cb){
    let xhr = new XMLHttpRequest();
	let formData = new FormData();
	xhr.open("GET",QUERY,true);
	xhr.onreadystatechange = cb;
    xhr.send(null);
}