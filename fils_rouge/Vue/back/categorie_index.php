<main class="container">
    <h1  class="mb-3"><i class="bi bi-tag-fill"></i> Gestion des catégories</h1>
    <section  class="row">
        <div class="col-3">
            <?php include ("menu-back.php") ?>
        </div>
        <div class="col-9">
            <?php if(isset($_SESSION["flash"])) : ?>
                <div class="alert bg-success text-white"><?php echo flash() ?> </div>
            <?php endif ?>
            <a href="<?php echo URL ?>?page=admin/categories/new" class="btn btn-primary mb-3">Ajouter une nouvelle catégorie</a>
            <table class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>nom</th>
                        <th>description</th>
                        <th>nb recette(s) associé(s)</th>
                        <th>créé le</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $categories as $categorie ) : ?>
                        <tr>
                            <td><?php echo $categorie["id"] ?></td>
                            <td><?php echo $categorie["nom"] ?></td>
                            <td><?php echo more($categorie["description"], 10) ?></td>
                            <td class="text-center"><?php echo $categorie["count_recette"] ?></td>
                            <td><?php echo $categorie["dt_creation"] ?></td>
                            <td style="width:155px">
                                <a href="<?php echo URL ?>?page=admin/categories/update&id=<?php echo $categorie["id"] ?>" class="btn btn-secondary me-3  btn-sm">update</a>
                                <a href="<?php echo URL ?>?page=admin/categories/delete&id=<?php echo $categorie["id"] ?>" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                        <!-- google => 3w validator -->
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</main>