<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO, un ami pour la vie.</title>
</head>
<body>
<?php
require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);
echo '<h1>PDO, un ami pour la vie.</h1>';
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<h2>La liste des \'friends\'</h2><ul>';
foreach($friendsArray as $friend) {
    echo '<li> '.$friend['firstname'] . ' ' . $friend['lastname'].' </li>';
}
echo '</ul>';
?>
<h2>Rejoins la liste des 'friends'</h2>
<form  method="post" action="join-friends.php">
<label  for="firstname">Prénom :</label>
<input  type="text"  id="firstname"  name="firstname" require>
</div>
<div>
<label  for="lastname">Nom :</label>
<input  type="text"  id="lastname"  name="lastname" require>
</div>
<div  class="button">
<button  type="submit">Je rejoins les 'friends' !</button>
</div>   
</body>
</html>