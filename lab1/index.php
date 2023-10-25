<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список предметів</title>
</head>
<body>
<h1>Список предметів</h1>

<?php
$jsonData = file_get_contents('data.json');
$subjects = json_decode($jsonData, true);

if ($subjects) {
    foreach ($subjects as $subject) {
        echo "<p>Назва: " . $subject["Назва"] . " - Викладач: " . $subject["Викладач"] . " - Кількість балів: " . $subject["Кількість балів"];
        echo " <button onclick=\"deleteSubject(" . $subject["Id"] . ")\">Вилучити</button></p>";
    }
} else {
    echo "Немає предметів.";
}
?>

<script>
    function deleteSubject(id) {
        if (confirm("Ви впевнені, що хочете вилучити цей предмет?")) {
            window.location.href = 'delete_subject.php?id=' + id;
        }
    }
</script>
</body>
</html>
