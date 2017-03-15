 <?php
	class ModeleGenerique {
		private static $dns = "mysql:host=localhost;dbname=my-planif";
		private static $user = "root";  
		private static $password = "";  
		static protected $connexion;
		function __construct(){
			self::$connexion = new PDO(self::$dns, self::$user, self::$password);
		}
		function getPDO(){
			return self::$connexion;
		}

	function creerToken($validite){
		$chaine='abcdefghijklmnopqrstuvwxyz';
		$jeton=substr(str_shuffle($chaine), 0, 20);
		$query = self::$connexion->prepare("INSERT INTO jeton (id,creation,expiration) VALUES (?, NOW(), ?);");
		$query->execute(array($jeton, $validite));
		return $jeton;
	}


	function getToken($token){
		$query = self::$connexion->query('SELECT * FROM jeton WHERE id=\''.$token.'\';');
		$string="";

		while($enregistrement = $query->fetch(PDO::FETCH_ASSOC)) {
			$string= $string . $enregistrement['id'] . " " . $enregistrement['creation'] . " " . $enregistrement['expiration'] ." ";
		}
		return $string;
	}


	function deleteToken($token){
		$query = self::$connexion->prepare("DELETE FROM jeton WHERE id='$token' AND NOW() < DATE_ADD(creation, INTERVAL expiration SECOND);");
		$query->execute(array());
	}


	function deleteTokenNonValides(){
		$query = self::$connexion->prepare("DELETE FROM jeton WHERE NOW() > DATE_ADD(creation, INTERVAL expiration second);");
		$query->execute(array());
	}	

}
/*ce commentaire sert de test*/
?>
