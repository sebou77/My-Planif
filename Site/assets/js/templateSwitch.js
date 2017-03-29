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
            }
        }
    });
}

function RegisterClient(){
        var data="nom="+$("#nom").val()+"&prenom="+$("#prenom").val()+"&email="+$("#email").val()+"&mdp="+$("#mdp").val();
        SQLRequest("http://localhost/My-Planif/App/assets/php/RegisterClient.php?"+data, x => {
            x = x.target;
            console.log(x);
            if(x.readyState == 4 && x.status == 200){
                console.log(x.response);
                alert();
            }
        })
};

function RegisterClient2(){
    var data="nom=Provost&prenom=Guillaume&email=g.provost@gmail.com&mdp=gprovost";
    SQLRequest("http://localhost/My-Planif/App/assets/php/RegisterClient.php?"+data, x => {
        x = x.target;
        if(x.readyState == 4 && x.status == 200){
            alert("yolo");
        }
    })
};

function RegisterEntreprise(){
    console.log("aze");
    $.post(
        'http://localhost/My-Planif/App/assets/php/RegisterEntreprise.php', // Un script PHP que l'on va créer juste après
        {
            nom : $("#nom").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            pseudo : $("#pseudo").val(),
            mdp : $("#mdp").val()
        },
        function(data){
            if(data == 'Success'){
                // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                alert("Success");
            }
            else{
                // Le membre n'a pas été connecté. (data vaut ici "failed")
                alert("Failed");
            }
        },
        'text'
    );
};

function SignIn(){
    console.log("aze");
    $.ajax({
        url : "http://localhost/My-Planif/App/assets/php/RegisterEntreprise.php", // on passe l'id le plus récent au fichier de chargement
        data:$("pseudo").val,
        type : GET,
        success : function(html){
            $('#messages').prepend(html);
        }
    });
}


function gettest(){
    console.log("test");
}
