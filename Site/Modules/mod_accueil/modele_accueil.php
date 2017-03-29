<?php
	class ModeleAccueil extends ModeleGenerique{
		
		function getMessage(){
			$sql = self::$connexion->prepare("SELECT message FROM accueil");
			$sql -> execute ();
			$result = $sql->fetch(PDO::FETCH_ASSOC);
			return $result["message"];
		}
	}
?>