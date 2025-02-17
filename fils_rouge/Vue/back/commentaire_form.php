<main class="container">
<h1  class="mb-3"><i class="bi bi-chat-left-dots-fill"></i> <?php echo $titre ?></h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?>
        </div>
        <div class="col-9">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $data_form["id"] ?>">
                <div class="mb-3">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $data_form["email"] ?>">
                </div>
                <div class="mb-3">
                    <label for="message">message</label>
                    <textarea name="message" id="message" class="form-control" rows="7"><?php echo $data_form["message"] ?></textarea>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name ="is_active" id="is_active" <?php echo $data_form["is_active"] == 1 ? "checked" : "" ?> >
                        <label class="form-check-label" for="is_active">
                            is active
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-outline-primary">
                    <a href="<?php echo URL ?>?page=admin/commentaires" class="btn btn-outline-info">Retour à l'espace de gestion</a>
                </div>
            </form>
            <?php foreach ($erreurs as $erreur) :?>
                <div class="alert bg-warning mt-2"><?php echo $erreur ?></div>
            <?php endforeach ?>
        </div>
    </section>
</main>