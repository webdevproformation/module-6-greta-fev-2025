<main class="container">
    <h1>S'inscrire sur le site internet</h1>
    <p>Vous voulez ajouter vos projets dans le site, veuillez créer au préalable un profil utilisateur via la formulaire suivant : </p>

    <form method="POST">
        <div class="mb-3">
            <label for="email">votre email</label>
            <input type="email" class="form-control" id="email" placeholder="votre email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password">votre password</label>
            <input type="password" class="form-control" id="password" placeholder="votre password" name="password" required>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-outline-danger">
        </div>
    </form>
    <?php foreach ($erreurs as $erreur) : ?>
        <div class="alert bg-warning"><?php echo $erreur ?></div>
    <?php endforeach ?> 
    <?php foreach ($success as $succes) : ?>
        <div class="alert bg-success"><?php echo $succes ?></div>
    <?php endforeach ?> 
</main>