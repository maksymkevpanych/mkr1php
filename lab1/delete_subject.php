<?php
$idToDelete = $_GET['id'];
$jsonData = file_get_contents('data.json');
$subjects = json_decode($jsonData, true);

$newSubjects = array_filter($subjects, function ($subject) use ($idToDelete) {
    return $subject['Id'] != $idToDelete;
});

file_put_contents('data.json', json_encode(array_values($newSubjects)));

header('Location: index.php');
?>
