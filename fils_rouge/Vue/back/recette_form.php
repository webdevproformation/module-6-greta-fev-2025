<main class="container">
<h1  class="mb-3"><i class="bi bi-cake2-fill"></i> <?php echo $titre ?></h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?>
        </div>
        <div class="col-9">
            <form method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data_form["id"] ?>">
                <div class="mb-3">
                    <label for="titre">titre</label>
                    <input type="text" name="titre" class="form-control" id="titre" value="<?php echo $data_form["titre"] ?>">
                </div>
                <div class="mb-3">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="7"><?php echo $data_form["description"] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="duree">durée</label>
                    <input type="number" name="duree" class="form-control" id="duree" value="<?php echo $data_form["duree"] ?>">
                </div>
                <div class="mb-3">
                    <label for="categorie_id">catégorie</label>
                    <select name="categorie_id" id="categorie_id" class="form-select">
                        <option value="">choisir une valeur</option>
                        <?php foreach($categories as $categorie) : ?>
                        <option value="<?php echo $categorie["id"] ?>" <?php echo $categorie["id"] == $data_form["categorie_id"] ? "selected" : "" ?> >
                            <?php echo $categorie["nom"] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="url_img" class="form-label">image de la recette</label>
                    <input class="form-control" type="file" id="url_img" name="url_img" >
                    <?php if($data_form["url_img"]) : ?>
                        <p>image actuel</p>
                        <img src="<?php echo $data_form["url_img"] ?>" alt="" width="200" class="img-thumbnail">
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name ="is_publie" id="is_publie" <?php echo $data_form["is_publie"] == 1 ? "checked" : "" ?> >
                        <label class="form-check-label" for="is_publie">
                            est publié
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-outline-primary">
                    <a href="<?php echo URL ?>?page=admin/recettes" class="btn btn-outline-info">Retour à l'espace de gestion</a>
                </div>
            </form>
            <?php foreach ($erreurs as $erreur) :?>
                <div class="alert bg-warning mt-2"><?php echo $erreur ?></div>
            <?php endforeach ?>
        </div>
    </section>
</main>