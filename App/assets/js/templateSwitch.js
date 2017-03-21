content = document.getElementById("template");

const callback = data => {
    data = data.target;
    if (data.status === 200 && data.readyState === 4)
        content.innerHTML = data.response;
};

function getPage(DOSSIER, PAGE) {
    clearDiv(content);
    GetByStream("GET", "templates/" + DOSSIER + "/" + PAGE + ".html", callback);
}

function getRegister(){
    SQLRequest("http://localhost/My-Planif/App/Include/Test.php", null, x => {
        x = x.target;
        if (x.readyState == 4) {
            let clients = (x.responseXML.childNodes[0].childNodes)
            for(let i=0; i < clients.length; i++) {
                let button = document.createElement('button');
                let client = clients[i];
                let pseudo = client.getElementsByTagName('pseudo')[0].innerHTML;
                let email = client.getElementsByTagName('email')[0].innerHTML;
                let name = client.getElementsByTagName('name')[0].innerHTML;
                let fname = client.getElementsByTagName('fname')[0].innerHTML;
                let t_button = document.createTextNode(fname + " " + name);
                button.appendChild(t_button);
                button.onclick = e => {
                    e.preventDefault();
                    alert("Email = " + email);
                };
                content.appendChild(button);
                console.log(content);
            }
        }
    });
}

function RegisterClient(){
    var myForm = document.getElementById("myForm");
    myForm.addEventListener('submit',function(){
        alert(myForm.elements["nom"].value);
    })

}

function gettest(){
    console.log("test");
}
