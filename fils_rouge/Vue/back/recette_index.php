<main class="container">
    <h1  class="mb-3"><i class="bi bi-cake2-fill"></i> Gestion des Recettes</h1>
    <section  class="row">
        <div class="col-3">
            <?php include ("menu-back.php") ?>
        </div>
        <div class="col-9">
            <?php if(isset($_SESSION["flash"])) : ?>
                <div class="alert bg-success text-white"><?php echo flash() ?> </div>
            <?php endif ?>
            <a href="<?php echo URL ?>?page=admin/recettes/new" class="btn btn-primary mb-3">Ajouter une nouvelle recette</a>
            <table class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>titre</th>
                        <th>image</th>
                        <th>catégorie</th>
                        <th>auteur</th>
                        <th>nb commentaire</th>
                        <th>créé le</th>
                        <th>publié</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $recettes as $recette ) : ?>
                        <tr>
                            <td><?php echo $recette["id"] ?></td>
                            <td><?php echo $recette["titre"] ?></td>
                            <td><img src="<?php echo $recette["url_img"] ?>" alt="" style="width:220px" class="img-thumbnail"></td>
                           
                            <td class="text-center"><span class="badge bg-warning"><?php echo $recette["categorie"] ?></span></td>
                            <td><?php echo $recette["email"] ?></td>
                            <td class="text-center"><?php echo $recette["count_commentaires"] ?></td>
                            <td><?php echo $recette["dt_creation"] ?></td>
                            <td  class="text-center"><?php echo $recette["is_publie"] == 1 ? "✅" : "❌" ?></td>
                            <td style="width:155px">
                                <a href="<?php echo URL ?>?page=admin/recettes/update&id=<?php echo $recette["id"] ?>" class="btn btn-secondary me-3  btn-sm">update</a>
                                <a href="<?php echo URL ?>?page=admin/recettes/delete&id=<?php echo $recette["id"] ?>" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</main>