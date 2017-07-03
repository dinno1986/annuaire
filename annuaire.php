<?php


//se connecter a mysql
try  
	 {
	     $bdd = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'annuaire', '2rqaf7aZ67yenkQY');
	 }
	// // en cas d'erreur on affiche un message :
	catch (Exception $e)
	 {
	        die('Erreur : ' . $e->getMessage());
	 }

//afficher la base de donnée
$reponse = $bdd->query('SELECT * FROM contact');
 $nom=$_POST['nom'];
 $prenom=$_POST['prenom'];
 $entreprise=$_POST['entreprise'];
 $datenaissance=$_POST['datenaissance'];
 $adresse=$_POST['adresse'];
 $telephone=$_POST['telephone'];
 

//  echo '<p>Nom= ' . $nom.' '.'Prenom'.' '. $prenom.' '.'Entreprise'.' '.$entreprise.' '.'Date de naisance'.' '.$datenaissance.' '.'Adresse'.' '.$adresse;
// // 	}


// enregistre dans la base de donnée
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['entreprise']) && !empty($_POST['datenaissance']) && !empty($_POST[adresse]) &&!empty($_POST['telephone'])) 
	{
			$req = $bdd->prepare('INSERT INTO contact(nom, prenom, entreprise, datenaissance, adresse, telephone ) VALUES(:nom, :prenom, :entreprise, :datenaissance, :adresse, :telephone)');
			$req->execute(array(
			    'nom' => $nom,
			    'prenom' => $prenom,
			    'entreprise' => $entreprise,
			    'datenaissance' => $datenaissance,
			    'adresse' => $adresse,
			    'telephone' =>$telephone,
			    
			    ));
	}

	else{
		echo "erreur!!";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="solid">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Entreprise</th>
			<th>Date de naissance</th>
			<th>Adresse</th>
			<th>Téléphone</th>
		</tr>
	</thead>
	<tbody>
<?php
while ($donnees =$reponse ->fetch()){
	
			echo'<tr><td>'.$donnees['nom'].'</td><td>'.' '.$donnees['prenom'].'</td><td>'.' '.$donnees['entreprise'].'</td><td>'.' '.$donnees['datenaissance'].'</td><td>'.' '.$donnees['adresse'].'</td><td>'.' '.$donnees['telephone'].'</td><td><button>Modifier</button></td>'.'<td><button>Supprimer</button></td></tr>';
			
		}	

?>
</tbody>
</table>
</body>
</html>










