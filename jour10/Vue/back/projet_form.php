<main class="container">
<h1>Créer une nouveau projet</h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?>
        </div>
        <div class="col-9">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $data_form["id"] ?>">
                <div class="mb-3">
                    <label for="nom">nom du projet</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="<?php echo $data_form["nom"] ?>">
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="duree">duree</label>
                        <input type="number" name="duree" class="form-control" id="duree" value="<?php echo $data_form["duree"] ?>">
                    </div>
                    <!-- password_hash($_POST["password"] , PASSWORD_BCRYPT) => HASH ALEATOIRE  -->
                    <div class="col-6">
                        <label for="unite">unite</label>
                        <select name="unite" id="unite" class="form-select">
                            <option value="">choisir une valeur</option>
                            <option value="jour" <?php echo $data_form["unite"] == "jour" ? "selected" : "" ?>>jour</option>
                            <option value="semaine" <?php echo $data_form["unite"] == "semaine" ? "selected" : "" ?>>semaine</option>
                            <option value="mois" <?php echo $data_form["unite"] == "mois" ? "selected" : "" ?>>mois</option>
                            <option value="année" <?php echo $data_form["unite"] == "année" ? "selected" : "" ?>>année</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <p class="col-12">Technologies utilisées sur le projet : </p>
                    <?php foreach($technos as $techno) : ?>
                        <div class="form-check col-1">
                            <input type="checkbox" class="form-check-input" id="<?php echo $techno["nom"] ?>" value="<?php echo $techno["id"] ?>" name="technos[]" <?php echo in_array($techno["id"], $data_form["technos"]) ? "checked" : "" ?> >
                            <label for="<?php echo $techno["nom"] ?>" class="form-check-label">
                                <?php echo $techno["nom"] ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-outline-primary">
                </div>
            </form>
            <?php foreach ($erreurs as $erreur) :?>
                <div class="alert bg-warning mt-2"><?php echo $erreur ?></div>
            <?php endforeach ?>
        </div>
    </section>
</main>