<main class="container">
    <h1>Créer un nouveau profil Utilisateur</h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?> 
        </div>
        <div class="col-9">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $data_form["id"] ?>">
                <div class="mb-3">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $data_form["email"] ?>">
                </div>
                <div class="mb-3">
                    <label for="password">password</label>
                    <input type="text" name="password" id="password" class="form-control" value="<?php echo $data_form["password"] ?>">
                </div>
                <div class="mb-3">
                    <label for="role">role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="">Veuillez sélectionner un role</option>
                        <option value="redacteur" <?php echo $data_form["role"] == "redacteur" ? "selected" : "" ?>>redacteur</option>
                        <option value="admin" <?php echo $data_form["role"] == "admin" ? "selected" : "" ?>>admin</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
            <?php foreach($erreurs as $erreur) : ?>
                <div class="alert bg-warning mt-3"><?php echo $erreur ?></div>
            <?php endforeach ?>
        </div>
    </section>
</main>