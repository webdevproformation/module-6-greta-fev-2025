<main class="container">
    <h1><?php echo $recette["titre"] ?></h1>
    <section class="row">
            <div class="col-4">
                <img src="<?php echo $recette["url_img"] ?>" alt="" class="img-fluid img-thumbnail mb-3">
                <ul>
                    <li>durée : <?php echo $recette["duree"] ?> minutes</li>
                    <li> rédigé par : <span class="badge bg-primary"><?php echo $recette["auteur"] ?></span></li>
                    <li> créé le : <?php echo $recette["dt_creation"] ?></li>
                    <li>catégorie : <span class="badge bg-warning"><?php echo $recette["categorie"] ?></span></li>
                    <?php if( isAdmin() ) : ?>
                        <li><a href="<?php echo URL ?>?page=admin/recettes/update&id=<?php echo $recette["id"] ?>">éditer</a></li>
                    <?php endif ?>
                </ul>
            </div>
            <div class="col-8">
                <?php echo nl2br($recette["description"]) ?>
            </div>
    </section>
    <hr>
    <h2>💬 Laisser un commentaire pour cette recette !</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="email">email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $data_form["email"] ?>" placeholder="votre@email.fr">
        </div>
        <div class="mb-3">
            <label for="message">message</label>
            <textarea name="message" id="message" class="form-control" placeholder="votre message"><?php echo $data_form["message"] ?></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="ajouter un nouveau commentaire">
        </div>
    </form>
    <?php foreach ($erreurs as $erreur) : ?>
        <div class="alert bg-warning"><?php echo $erreur ?></div>
    <?php endforeach ?> 
    <?php if(count($commentaires) > 0) : ?>
        <hr>
        <h2><?php echo count($commentaires) ?> Commentaire(s) existant(s) </h2>
        <section class="row">
            <?php foreach ($commentaires as $commentaire ) : ?>
                <div class="col-12 mb-3">
                    <article class="card h-100" >
                        <div class="card-body">
                            <p class="card-text">💬 <?php echo nl2br($commentaire["message"]) ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between" >
                            <span><?php echo $commentaire["email"] ?></span>
                            <span>publié le <?php echo $commentaire["dt_creation"] ?></span>
                        </div>
                    </article>
                </div>
            <?php endforeach ?>
        </section>
    <?php endif ?>
    
</main>