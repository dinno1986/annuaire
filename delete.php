<?php
//se connecter à la base de données
$bdd =mysqli_connect("localhost","annuaire","2rqaf7aZ67yenkQY","annuaire");
//recupere l'id
$id = $_POST['id'];
//var_dump($id);
 
//suppression base de données
// $suppr =mysqli_query($base, "DELETE FROM contact WHERE id = $id");
 // $base->exec("DELETE FROM contact WHERE id = $id"); 
$test="DELETE FROM contact WHERE id = $id";
echo $test;
 //renvoi sur la page annuaire.php
header('Location: annuaire.php');
 
 

?>