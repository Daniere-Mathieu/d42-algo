<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Classroom</title>
    <link rel="stylesheet" href="/public/style/style.css">
    <link rel="stylesheet" href="/public/style/listCourse.css">
</head>

<body>
    <h1>Liste des Cours</h1>

    <main class="main">
        <?php foreach ($res as $values) { ?>
            <div class="card__container">
                <?php foreach ($values as $value) { ?>
                    <div class="card">
                        <img class='card__image' src="/public/assets/<?= $value->profilePicture ?>" alt="photo de profil du cours <?= $value->courseName ?>">
                        <h2><?= $value->courseName ?></h2>
                        <h3><?= $value->code ?></h3>
                        <p><?= $value->description ?></p>
                        <a href="/course/detail/<?= $value->id ?>" class="card__link">plus d'info >>>
                        </a>
                    </div>
                <?php  }  ?>
            </div>
        <?php  }  ?>

    </main>
</body>

</html>