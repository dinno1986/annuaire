<!-- <?php
//se connecter à la base de données
try  
	 {
	     $bdd = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'annuaire', '2rqaf7aZ67yenkQY');
	 }
	// // en cas d'erreur on affiche un message :
	catch (Exception $e)
	 {
	        die('Erreur : ' . $e->getMessage());
	 }
//recupere l'id
$id = $_POST['id'];
echo($id);
 
//suppression base de données
 $suppr =$bdd->query( "DELETE FROM contact WHERE id = $id");
  $bdd->exec("DELETE FROM contact WHERE id = $id"); 
// $test="DELETE FROM contact WHERE id = $id";
// echo $test;
 //renvoi sur la page annuaire.php
header('Location: /sql/annuaire/annuaire.php');
 
 

?> -->