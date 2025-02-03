<main class="container">
    <h1 class="text-center my-3">page de connexion</h1>
    <form action="http://192.168.33.10/jour06-tp/index.php?page=profil" method="POST">
        <section class="row">
            <div class="col-4 offset-4 mb-3 ">
                <div class="form-floating ">
                    <input type="text" name="email" class="form-control" id="email" placeholder="votre@email.fr">
                    <label for="email">votre email</label>
                </div>
            </div>
            <div class="col-4 offset-4 mb-3 ">
                <div class="form-floating">
                    <input type="text" name="password" class="form-control" id="password" placeholder="votre password">
                    <label for="password" style="left:20%">votre mot de passe</label>
                </div>
            </div>
            <?php if (isset($_SESSION["erreur"])) : ?>
                <div class="alert alert-danger">
                    les identifiants sont invalides ...
                </div>
            <?php endif ?>
            <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-outline-primary">
            </div>
        </section>
    </form>
</main>