<?php
require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$data = array_map('trim', $_POST);
$errors = [];
$firstname = $data['firstname'];
$lastname = $data['lastname'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($firstname) || empty($firstname))
        $errors[] = 'Le prénom est obligatoire.';

    if (strlen($firstname) > 45)
        $errors[] = 'Le prénom doît faire moins de 45 caractères.';

    if (!isset($lastname) || empty($lastname))
        $errors[] = 'Le nom est obligatoire.';

    if (strlen($lastname) > 45)
        $errors[] = 'Le nom doît faire moins de 45 caractères.';

    if (empty($errors)) {
        $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        $statement->execute();
        header('Location:index.php');
    }

    if (!empty($errors)) {
        echo  "Remplis bien tous les champs !";
        // header('Location:index.php');
    }
}
