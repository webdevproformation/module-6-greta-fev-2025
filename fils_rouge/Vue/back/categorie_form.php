<main class="container">
<h1 class="mb-3"><i class="bi bi-tag-fill"></i> <?php echo $titre ?></h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?>
        </div>
        <div class="col-9">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $data_form["id"] ?>">
                <div class="mb-3">
                    <label for="nom">nom catégorie</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="<?php echo $data_form["nom"] ?>">
                </div>
                <div class="mb-3">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" rows="7"><?php echo $data_form["description"] ?></textarea>
                </div>
                
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-outline-primary">
                    <a href="<?php echo URL ?>?page=admin/categories" class="btn btn-outline-info">Retour à l'espace de gestion</a>
                </div>
            </form>
            <?php foreach ($erreurs as $erreur) :?>
                <div class="alert bg-warning mt-2"><?php echo $erreur ?></div>
            <?php endforeach ?>
        </div>
    </section>
</main>