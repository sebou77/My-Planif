<!DOCTYPE html>
<html>
	<head>
		<title> My-Planif </title>
		<meta charset="UTF-8"/>	
		<script src='.\assets\js\functions.js'></script>
        <script src='.\assets\js\jquery.js'></script>
	</head>
	<body>
		<button onclick="getPage('Infrastructure','Accueil_Infrastructure')">aller a infrastructure</button>
		<button onclick="getPage('Entreprise','Accueil_Entreprise')">aller a entreprise</button>
		<button onclick="getPage('Client','Accueil_Client')">aller a client</button>
		<button onclick="getRegister()">voir les inscrits</button>
		<button onclick="gettest()">test</button>
		<div id="template">
		</div>
		<script type="text/javascript" src=".\assets\js\templateSwitch.js" ></script>
		<script>getPage('Accueil','Accueil_App')</script>
	</body>

</html>
