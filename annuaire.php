<?php
//se connecter a mysql
try  
	 {
	     $bdd = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'annuaire', '2rqaf7aZ67yenkQY');
	 }
	// // en cas d'erreur on affiche un message :
	catch (Exception $e)
	 {
	        die('Erreur : ' . $e->getMessage());
	 }



// Enregistrer dans la base de données
 $nom=$_POST['nom'];
 $prenom=$_POST['prenom'];
 $entreprise=$_POST['entreprise'];
 $datenaissance=$_POST['datenaissance'];
 $adresse=$_POST['adresse'];
 $telephone=$_POST['telephone'];
 $groupe=$_POST['groupe'];
 
//  echo '<p>Nom= ' . $nom.' '.'Prenom'.' '. $prenom.' '.'Entreprise'.' '.$entreprise.' '.'Date de naisance'.' '.$datenaissance.' '.'Adresse'.' '.$adresse;
// // 	}
// enregistre dans la base de donnée
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['entreprise']) && !empty($_POST['datenaissance']) && !empty($_POST['adresse']) &&!empty($_POST['telephone'] &&!empty($_POST['groupe'])))
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

			$grpe= $bdd ->prepare('INSERT INTO groupe(groupe)
				VALUES(:groupe)');
			$grpe->execute(array(
				'groupe' => $groupe
				));
	}
	else{
		echo "erreur!!";
	}





//afficher la base de donnée
$reponse = $bdd->query('SELECT *  FROM contact;');


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
			<th>Groupe</th>
		</tr>
	</thead>
	<tbody>
<?php


	while ($donnees = $reponse->fetch()){


		echo'<tr><td>'.$donnees['nom'].'</td><td>'.' '.$donnees['prenom'].'</td><td>'.' '.$donnees['entreprise'].'</td><td>'.' '.$donnees['datenaissance'].'</td><td>'.' '.$donnees['adresse'].'</td><td>'.' '.$donnees['telephone'].'</td><td>';


		$sql = '
			SELECT *
			FROM groupe
				JOIN appartenir ON groupe.id = appartenir.fk_groupe
			WHERE appartenir.fk_user = ' . $donnees['id'];
	
		$grpe = $bdd->query($sql);

		while ($user = $grpe->fetch()){
			echo $user['groupe'] . '<br/>';
		}


		
		
		// echo '</td><td><button>Modifier</button></td>'.'<td><button>Supprimer</button></td></tr>';

		echo '</td><td>
		<form action="" method="post">
   	    <input type="HIDDEN" name="id" value="'.$donnees['id'].'"/>
   	    <input type="submit" value="Supprimer">   	   
		</form>
		</td></tr>';

	}	
		$id=$_POST["id"];
		$test="DELETE FROM contact WHERE id = $id";
	 	$bdd->exec($test)

		 	// echo "yop";
		 	// }else{
		 	// 	echo "nop";
		 	// } 

?>
</tbody>
</table>
</body>
</html>










