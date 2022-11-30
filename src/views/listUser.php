<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Classroom</title>
    <link rel="stylesheet" href="../public/style/style.css">
    <link rel="stylesheet" href="../public/style/listUser.css">
</head>

<body>
    <h1>Liste des utilisateur</h1>

    <main class="main">
        <?php foreach ($res as $values) { ?>
            <div class="card__container">
                <?php foreach ($values as $value) { ?>
                    <div class="card">
                        <img class='card__image' src="../public/assets/<?= $value->id ?>.jpg" alt="photo de profil de <?= $value->firstname . ' ' . $value->lastname ?>">
                        <h2><?= $value->firstname . ' ' . $value->lastname ?></h2>
                        <a href="tel:<?= $value->phoneNumber ?>"><?= $value->phoneNumber ?></a>
                        <p><?= $value->address ?></p>
                        <h3><?= $value->trigram ?></h3>
                        <a href="user/detail/<?= $value->id ?>" class="card__link">plus d'info >>>
                        </a>
                    </div>
                <?php  }  ?>
            </div>
        <?php  }  ?>

    </main>
</body>

</html>