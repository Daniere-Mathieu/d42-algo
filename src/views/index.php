<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../public/style/style.css">
    <link rel="stylesheet" href="../public/style/index.css">
</head>

<body>
    <main>
        <div class="form__container">
            <form class="form__wrapper" action="/user/register" method="post" enctype="multipart/form-data">
                <h2>Register</h2>
                <input type="text" name="firstname" placeholder="prénom" required>
                <input type="text" name="lastname" placeholder="lastname" required>
                <input type="text" name="address" placeholder="addresse">
                <input type="tel" name="phoneNumber" placeholder="numéro de téléphone">
                <input type="text" name="trigram" placeholder="trigramme">
                <label for="avatar">Choose a profile picture:</label>
                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/jpg, image/webp,image/svg">
                <button type="submit">Envoyez</button>
            </form>

            <form class="form__wrapper" action="/user/login" method="post">
                <h2>Login</h2>
                <input type="number" name="id" placeholder="Identifiant">
                <button type="submit">Envoyez</button>
            </form>
        </div>
    </main>
</body>

</html>