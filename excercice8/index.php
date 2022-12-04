<?php
// i get the the get arg
$courseName = isset($_GET["courseName"]) ? $_GET["courseName"] : "";
$teachername = isset($_GET["teacherName"]) ? $_GET["teacherName"] : "";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>excercice 8</title>
</head>

<body>
    <h1><?= $courseName ?></h1>
    <h2><?= $teachername ?></h2>

    <form action="./index.php" method="get">
        <input type="text" name="courseName" placeholder="nom du cours">
        <input type="text" name="teacherName" placeholder="nom du prof">

        <button type="submit">envoyez</button>
    </form>

</body>

</html>l