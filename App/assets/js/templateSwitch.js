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


/*$("#sub").click(function(){
    $.post( $("#myForm").attr("action"), $("#myForm:input").serializeArray(),function(info){$("#result").html(info);})
})

$("#myForm").submit(function(){
    return false;
})*/



function RegisterClient(){
        console.log("aze");
        $.post(
            'http://localhost/My-Planif/App/assets/php/RegisterClient.php', // Un script PHP que l'on va créer juste après
            {
                nom : $("#nom").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                prenom : $("#prenom").val(),
                email : $("#email").val(),
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


function gettest(){
    console.log("test");
}
