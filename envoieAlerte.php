<?php
$mail = 'ADRESSE_EXPEDITEUR';
if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#",$mail)){
	$passage_ligne = "\r\n";
}
else{
	$passage_ligne = "\n";
}

$message_text= "Bonjour, l'horaire du '$date' à '$horraire' vient de se libérer "
$message_html= "<html><head></head><body><b>Bonjour</b>, l'horraire du '$date' à '$horraire' vient de se libérer .</body></html>";

$fichier = fopen("DOCUMENT_A_OUVRIR", "r");
$attachement = fread($ichier, filesize("DOCUMENT_A_OUVRIR"));
$attachement = chunk_split(base64_encode($attachement));
fclose($fichier);

$boundary = "-----=".md5(rand());
$boundary_alt = "-----".md5(rand());

$sujet =" Alerte: Un horraire vient de se libérer";

$header. = "from: \"EXPEDITEUR\"<ADRESSE_EXPEDITEUR>".$passage_ligne;
$header. = "Reply-to: \"RETOUR\" <ADRESSE_RETOUR>".$passage_ligne;
$header. = "MIME-Version: 1.0".$passage_ligne;
$header. = "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$message = $passage_ligne."--".$boundary_alt.$passage_ligne;
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;

$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary.$passage_ligne;

$message.= "Content-Type: DOCUMENT/TERMINAISON; name=\"DOCUMENT.TERMINAISON\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachement; filename=\"DOCUMENT.TERMINAISON\"".$passage_ligne;
$message.= $passage_ligne.$attachemnt.$passage_ligne.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

mail($mail,$sujet,$message,$header);

?php>