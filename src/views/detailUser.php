<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $res->firstname . ' ' . $res->lastname ?></title>
    <link rel="stylesheet" href="/public/style/style.css">
    <link rel="stylesheet" href="/public/style/detailUser.css">

</head>

<body>
    <main class="main">
        <div class="card">
            <img class='card__image' src="/public/assets/<?= $res->profilePicture ?>" alt="photo de profil de <?= $res->firstname . ' ' . $res->lastname ?>">
            <h2><?= $res->firstname . ' ' . $res->lastname ?></h2>
            <a href="tel:<?= $res->phoneNumber ?>"><?= $res->phoneNumber ?></a>
            <p><?= $res->address ?></p>
            <h3><?= $res->trigram ?></h3>
            </a>
        </div>
    </main>

</body>

</html>