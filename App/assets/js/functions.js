function GetByStream(HTTP_METHOD, FILE, callback) {
	let xhr = new XMLHttpRequest();
	xhr.open(HTTP_METHOD, FILE, true);
	xhr.onreadystatechange = callback;
	xhr.send(null);
}